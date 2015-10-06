<form method="post" action="" class="normal-form" enctype="multipart/form-data">
	<?= Form::csrf(); ?>
	<fieldset>
		<label for="email">メールアドレス:</label>
		<input type="email" required="" name="email" id="email" value="<?php if(isset($email)) echo $email; ?>">
	</fieldset>
	<fieldset>
		<label for="password">パスワード:</label>
		<input type="password" name="password" id="password" value="">
	</fieldset>
	<fieldset>
	<label for="group_id">権限:</label>
		<select name="group_id" id="group_id">
			<option value="1" <?php if(isset($group_id) && $group_id == 1) echo " selected"; ?>>ユーザ</option>
			<option value="100" <?php if(isset($group_id) && $group_id == 100) echo " selected"; ?>>管理者</option>
		</select>
	</fieldset>
	<fieldset>
		<label for="file">ロゴ:</label>
		<input type="file" name="file" id="file">
		<?php if($logo != ""): ?>
			<img src="/files/<?= $logo; ?>" width="200">
		<?php endif; ?>
	</fieldset>
	<fieldset>
		<label for="name">名前:</label>
		<input type="text" name="name" id="name" value="<?php if(isset($name)) echo $name; ?>">
	</fieldset>
	<fieldset>
		<label for="kana">カナ:</label>
		<input type="text" name="kana" id="kana" value="<?php if(isset($kana)) echo $kana; ?>">
	</fieldset>
	<fieldset>
		<label for="zip_code">郵便番号:</label>
		<input type="text" name="zip_code" id="zip_code" value="<?php if(isset($zip_code)) echo $zip_code; ?>">
	</fieldset>
	<fieldset>
		<label for="prefecture_id">都道府県:</label>
		<select name="prefecture_id" id="prefecture_id">
			<?php $i = 0; foreach($prefectures as $prefecture): ?>
				<option value="<?= $i; ?>" <?php if(isset($prefecture_id) && $prefecture_id == $i) echo " selected"; ?>><?= $prefecture;$i++; ?></option>
			<?php endforeach; ?>
		</select>
	</fieldset>
	<fieldset>
		<label for="address">住所:</label>
		<input type="text" name="address" id="address" value="<?php if(isset($address)) echo $address; ?>">
	</fieldset>
	<fieldset>
		<label for="tel">TEL:</label>
		<input type="text" name="tel" id="tel" value="<?php if(isset($tel)) echo $tel; ?>">
	</fieldset>
	<button type="submit" class="normal-button center">確定</button>
</form>