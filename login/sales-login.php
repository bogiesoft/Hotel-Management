<?php
// セッション開始
session_start();
// 既にログインしている場合にはメインページに遷移
if (isset($_SESSION["USERID"])) {
session_destroy();
header("Location: sales-login.php");
exit;
}
$db['host'] = 'localhost';
$db['user'] = 'root';
$db['pass'] = '';
$db['dbname'] = 'oic_hotel';
$error = '';
// ログインボタンが押されたら
if (isset($_POST['login'])) {
if (empty($_POST['username'])) {
$error = 'ユーザーIDが未入力です。';
} else if (empty($_POST['password'])) {
$error = 'パスワードが未入力です。';
}
if (!empty($_POST['username']) && !empty($_POST['password'])) {
$username = $_POST['username'];
$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);
try {
$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$stmt = $pdo->prepare('SELECT * FROM tbl_employee WHERE EMPLOYEE_CODE = ?');
$stmt->execute(array($username));
$password = $_POST['password'];
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if (password_verify($password, $result['password'])) {
$_SESSION['USERID'] = $username;
header('Location: sales-info.php');
exit();
} else {
$error = 'ユーザーIDあるいはパスワードに誤りがあります。';
}
} catch (PDOException $e) {
echo $e->getMessage();
}
}
}
?>


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

<div align="center"><h1>ログインしてください</h1></div>

<div class="boxA">
<form name="loginform" id="loginform" action="/login/sales-info.php" method="POST">
 	<p>ユーザ名<br />
 	<input type="text" name="username" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>"> </p>
 	
    <p>パスワード<br />
    <input type="password" name="password" value=""></p>
	<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> ログイン状態を保存する</label></p>
	
	<p class="submit">
		<input type="submit" name="login" id="login" class="button button-primary button-large" value="ログイン" />
</form>
</div>
		<br>
<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
