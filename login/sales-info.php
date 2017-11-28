<?php

require_once __DIR__ . '/functions.php';
require_logined_session();

header ('Content-Type: text/html; charset=UTF-8');

?>

<!DOCTYPE html>
<html>
<head>
<title>売上管理｜ホテル宿泊システム</title>
</head>
<body>
<h1><?=h($_SESSION["username"])?>としてログインしています</h1>
<p><a href="/login/sales-logout.php?token=<?=h(generate_token())?>">ログアウト</a></p>

<h2>Nextculture Japan</h2>
</body>
</html>