<?php

class Controller_Inquiry extends Controller_Base
{

	public function action_index()
	{
		$this->template->title = __("inquiry");

		if(Input::post("name") != null)
		{
			if(Input::post("kakunin", 0) == 1)
			{
				$time = time();
				$name = DB::quote($_POST["name"]);
				$email = DB::quote($_POST["email"]);
				$title = DB::quote($_POST["title"]);
				$body = DB::quote($_POST["body"]);
				$sql = "INSERT INTO inquiries (`name`, `email`, `title`, `body`, `created_at`) VALUES ('{$name}','{$email}','{$title}','{$body}',{$time})";
				$query = DB::query($sql)->execute();

				$this->template->content = View::forge('inquiries/sent', $this->data);
			}
			else
			{
				$this->template->content = View::forge('inquiries/confirm', $this->data);
			}
		}
		else
		{
			$this->template->content = View::forge('inquiries/form', $this->data);
		}
	}
}
