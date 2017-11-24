<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8"/>
  <title>売上管理ログイン｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="css/top.css">
  <link rel="shortcut icon" href="assets/ico/img.png">


</head>
<body>
<?php
include "../header.php"
?>


<div class="boxA">
<form name="loginform" id="loginform" action="http://www.kentoazumi.sakura.ne.jp/oic/login/login.php" method="admin">
	<p>
		<label for="user_login">ユーザー名<br />
		<input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
	</p>
	<p>
		<label for="user_pass">パスワード<br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
	</p>
	<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> ログイン状態を保存する</label></p>
	<p class="submit">
		<input type="submit" name="admin" id="wp-submit" class="button button-primary button-large" value="ログイン" />
</form>
</div>
		<br>
<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
