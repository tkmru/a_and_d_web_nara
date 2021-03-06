<form method="post" action="" class="normal-form" enctype="multipart/form-data">
	<?= Form::csrf(); ?>
	<fieldset>
		<label for="email"><?= __("email"); ?>:</label>
		<input type="email" required="" name="email" id="email" value="<?php if(isset($email)) echo $email; ?>">
	</fieldset>
	<fieldset>
		<label for="password"><?= __("password"); ?>:</label>
		<input type="password" name="password" id="password" value="">
	</fieldset>
	<fieldset>
		<label for="file"><?= __("logo"); ?>:</label>
		<input type="file" name="file" id="file">
		<?php if($logo != ""): ?>
			<img src="/files/<?= $logo; ?>" width="200">
		<?php endif; ?>
	</fieldset>
	<fieldset>
		<label for="name"><?= __("name"); ?>:</label>
		<input type="text" name="name" id="name" value="<?php if(isset($name)) echo $name; ?>">
	</fieldset>
	<fieldset>
		<label for="kana"><?= __("kana"); ?>:</label>
		<input type="text" name="kana" id="kana" value="<?php if(isset($kana)) echo $kana; ?>">
	</fieldset>
	<fieldset>
		<label for="zip_code"><?= __("zip_code"); ?>:</label>
		<input type="text" name="zip_code" id="zip_code" value="<?php if(isset($zip_code)) echo $zip_code; ?>">
	</fieldset>
	<fieldset>
		<label for="prefecture_id"><?= __("prefecture"); ?>:</label>
		<select name="prefecture_id" id="prefecture_id">
			<?php $i = 0; foreach($prefectures as $prefecture): ?>
				<option value="<?= $i; ?>" <?php if(isset($prefecture_id) && $prefecture_id == $i++) echo " selected"; ?>><?= $prefecture; ?></option>
			<?php endforeach; ?>
		</select>
	</fieldset>
	<fieldset>
		<label for="address"><?= __("address"); ?>:</label>
		<input type="text" name="address" id="address" value="<?php if(isset($address)) echo $address; ?>">
	</fieldset>
	<fieldset>
		<label for="tel">TEL:</label>
		<input type="text" name="tel" id="tel" value="<?php if(isset($tel)) echo $tel; ?>">
	</fieldset>
	<button type="submit" class="normal-button center"><?= __("send"); ?></button>
</form>