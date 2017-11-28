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
        $db      = 'dbname';
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

<?php if ($errors): ?>
<ul>
    <?php foreach ($errors as $err): ?>
    <li><?=h($err)?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<div class="boxA">
<form name="loginform" id="loginform" action="/login/sales-info.php" method="admin">
 	<p>ユーザ名<br />
 	<input type="text" name="username" value="<?php echo $username = isset($_POST['username']) ? $_POST['username']: ''; ?>"></p>
 	
    <p>パスワード<br />
    <input type="password" name="password" value=""></p>
	<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> ログイン状態を保存する</label></p>
	
	<!-- トークン -->
    <input type="hidden" name="token" value="<?=h(generate_token())?>">    <!--<input type="hidden" name="token" value="<?php echo password_hash('1111', PASSWORD_DEFAULT, array('cost', 10)) ?>">-->
	
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
