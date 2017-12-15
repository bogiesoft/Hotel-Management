<!DOCTYPE html>

<html lang="ja">
<head>
<title>予約登録画面</title>
<link rel="stylesheet" type="text/css" href="../css/employee-registration.css">
<?php
include "../header_css.php"
?>
  <link rel="shortcut icon" href="../assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>
<?php
include "../header.php"
?>

  <div class="header_div">

  <h2>ホテル宿泊管理システム</h2>
    </div>
<div class="boxA">
<div class="box1">
  <form action="*" method="post">
    <p>宿泊日：<input type="text" name="day" size="10">
       泊数：<input type="text" name="stayday" size="2"></p>
    <p>顧客番号：<input type="text" name="c_code" size="8"></p>
    <p>顧客名：<input type="text" name="name" size="21">
       人数：<input type="text" name="num" size="2"></p>
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
          <option value="0">--入力者を選択--</option>
        </select>
    </p>

    <a href="#" class="square_btn">登録</a>
    <a href="#" class="square_btn">キャンセル</a>
  </form>

</div>

<div class="box2">
  <form action="*" method="post">
    <p>顧客名　：<input type="text" name="f-name" size="21"></p>
    <p>カナ　　：<input type="text" name="f-kana" size="21"> 性別：<input type="text" name="f-sex" size="1"></p>
    <p>生年月日：<input type="text" name="f-birthday" size="11"> 年齢：<?php echo floor ((date('Ymd') - 19411129)/10000);?></p>
    <p>備考　　：<textarea name="f-remarks" cols="40" rows="3"></textarea></p>
</div>
</div>

<div class="box3">
  <table border=1 class="table1">
  <tr><th>エコノミーシングル</th><td>101号</td><td>102号</td><td>103号</td></tr>
  <tr><th>標準シングル</th><td>201号</td><td>202号</td><td>203号</td></tr>
  <tr><th>デラックスシングル</th><td>301号</td><td>302号</td><td></td></tr>
  <tr><th>エコノミーシングル</th><td>401号</td><td>402号</td><td></td></tr>
  <tr><th>標準ダブル</th><td>501号</td><td>502号</td><td>503号</td></tr>
  <tr><th>キングダブル</th><td>601号</td><td>602号</td><td></td></tr>
  <tr><th>エコノミーツイン</th><td>701号</td><td>702号</td><td></td></tr>
  <tr><th>標準ツイン</th><td>801号</td><td>802号</td><td>803号</td></tr>
  <tr><th>デラックスツイン</th><td>901号</td><td>902号</td><td></td></tr>
  <tr><th>ファミリー和室</th><td>1001号</td><td></td><td></td></tr>
 </table>
</div>
</body>

</html>
