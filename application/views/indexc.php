<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AZZURA Media | Admin</title>
</head>
<body>
<?php echo form_open("auth/cek_login"); ?>
		<p>Username : <br>
		<input type="text" name="username">
		</p>
		<p>Password : <br>
		<input type="password" name="password"></p>
		<p><button type="submit">Submit</button></p>
		<?php echo form_close(); ?>
</body>
</html>