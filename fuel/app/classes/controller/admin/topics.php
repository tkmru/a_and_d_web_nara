<?php

class Controller_Admin_Topics extends Controller_Admin
{

	public function action_index()
	{
		$count = Model_Topic::count([
			"where" => [
				["deleted_at", 0]
			]
		]);

		$config= [
			'pagination_url'=>"",
			'uri_segment'=>"p",
			'num_links'=>9,
			'per_page'=>20,
			'total_items'=>$count,
		];

		$this->data["pager"] = Pagination::forge('mypagination', $config);

		$this->data["topics"] = Model_Topic::find("all", [
			"where" => [
				["deleted_at", 0]
			],
			"order_by" => [
				["id", "desc"]
			],
			"limit" => $this->data["pager"]->per_page,
			"offset" => $this->data["pager"]->offset

		]);

		$this->template->title = __("topics");
		$this->template->content = View::forge('admin/topics/index', $this->data);
	}

	public function action_edit($id = 0)
	{
		$topic = Model_Topic::find($id, [
			"where" => [
				["deleted_at", 0]
			]
		]);

		if($topic == null)
		{
			$this->template->title = __("create");
			$topic = Model_Topic::forge();
		}
		else
		{
			$this->template->title = __("edit");
		}

		if(Input::post("title", null) !== null && Security::check_token())
		{
			$val = Model_Topic::validate();
			if($val->run())
			{
				$input = $val->input();
				$topic->title = $input["title"];
				$topic->body = $input["body"];
				$topic->save();
			}

			Response::redirect("admin/topics");

		}

		$this->data["title"] = $topic["title"];
		$this->data["body"] = $topic["body"];

		$this->template->content = View::forge('admin/topics/form', $this->data);
	}
}
