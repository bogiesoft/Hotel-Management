<?php

require_once __DIR__ . '/functions.php';
require_unlogined_session();

foreach (['username','password','token','submit'] as $key) {
    $$key = (string)filter_input(INPUT_POST, $key);
}

// エラーを格納する配列を初期化
$errors = [];

// POSTのときのみ実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ( $username === "" || $password ==="" ) {
        $errors[] = 'ユーザ名またはパスワードが入力されていません。';
    } else {

        $username = h($username);
        $password = h($password);

        $dbtype  = 'mysql';
        $host    = 'localhost';
        $db      = 'tbl_sales';
        $charset = 'utf8';

        $dsn = "$dbtype:host=$host; dbname=$db; charset=$charset";
        $db = new PDO ( $dsn, 'user', 'pass' );
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM user_kaiin WHERE email = ?';
        $prepare = $db->prepare($sql);
        $prepare->bindValue(1, $username, PDO::PARAM_INT);
        $prepare->execute();

        $result = $prepare->fetch(PDO::FETCH_ASSOC);

        if (validate_token(filter_input(INPUT_POST, 'token')) && password_verify( $password, $result["password"] )) {
            // 認証が成功
            // セッションIDの追跡を防ぐ
            session_regenerate_id(true);
            //ユーザ名をセット
            $_SESSION['username'] = $username;
            // ログイン後に/に遷移
            header ('Location: /login/sales-info.php');
            exit;
            }
        // 認証が失敗
        $errors[] = "ユーザ名またはパスワードが違います";
    }
}
header ('Content-Type: text/html; charset=UTF-8');
?>

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

<div align="center"><h1>ログインしてください</h1></div>

<div class="boxA">
<form name="loginform" id="loginform" action="/login/sales-info.php" method="admin">
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
		<input type="submit" name="admin" id="submit" class="button button-primary button-large" value="ログイン" />
</form>
</div>
		<br>
<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
