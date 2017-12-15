<!DOCTYPE html>

<html lang="ja">
<head>
<title>予約登録画面｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="../css/employee-registration.css">
  <link rel="shortcut icon" href="../assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>

<?php
include "../header.php"
?>

<div class="box">
  <form action="*" method="post">
    <p>宿泊日：<input type="text" name="day" size="10">
       泊数：<input type="text" name="stay" size="2"></p>
       <p>顧客番号：<input type="text" name="c_code" size="8"></p>
    <p>顧客名：<input type="text" name="name" size="21">
       人数：<input type="text" name="num" size="2">
    </p>
    <p>客室名称：<select name="room">
                      <option value="0">--客室名称を選択--</option>
                      <option value="1">エコノミーシングル</option>
                      <option value="2">標準シングル</option>
                      <option value="3">デラックスシングル</option>
                      <option value="4">エコノミーダブル</option>
                      <option value="5">標準ダブル</option>
                      <option value="6">キングダブル</option>
                      <option value="7">エコノミーツイン</option>
                      <option value="8">標準ツイン</option>
                      <option value="9">デラックスツイン</option>
                      <option value="10">ファミリー和室</option>
                </select>
        タバコ：
      <input type="radio" name="smoke" value="0" id="no_smoke"><label for="no_smoke">禁煙</label>
      <input type="radio" name="smoke" value="1" id="ok_smoke"><label for="ok_smoke">喫煙</label>
    </p>

    <p>部屋番号：<input type="text" name="room_no" size="5">
       入力者：<select name="inputter">
      <<option value="0">--入力者を選択--</option>>
    </p>
  </form>
</div>
</body>

</html>
