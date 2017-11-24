
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>TOP｜ホテル宿泊管理システム</title>
<?php
include "./header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="css/top.css">
  <link rel="shortcut icon" href="assets/ico/img.png">
  <meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
</head>
<meta property="og:title" content="ホテル宿泊管理システム" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.kentoazumi.sakura.ne.jp/oic/index.php" />
<body>
<?php
include "./header.php"
?>

<div class="boxA">
  <div class="box">
    <a href="/reservation/reservation-select.php" style="#00bcd4"><p>予約</p></a>
  </div>
  <div class="box">
    <a href="/client/client-select.php" style="#00bcd4"><p>顧客</p></a>
  </div>
  <div class="box">
    <a href="/employee/employee-select.php" style="#00bcd4"><p>従業員</p></a>
  </div>
  <div class="box">
  	<a href="/room/room-registration-change.php" style="#00bcd4"><p>部屋登録変更</p></a>
  </div>
  <div class="box">
    <a href="/room/status.php" style="#00bcd4"><p>部屋状況</p></a>
  </div>
  <div class="box">
    <a href="/accounting/accounting.php" style="#00bcd4"><p>会計</p></a>
  </div>
  <div class="box">
    <a href="/login/sales-login.php" style="#00bcd4"><p>売上管理</p></a>
  </div>
</div>

<br>
<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div>

</body>
</html>