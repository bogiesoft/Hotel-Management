<!DOCTYPE html>

<html lang="ja">
<head>
<title>顧客登録確認画面</title>
  <link rel="stylesheet" type="text/css" href="../css/confirm.css">
<?php
include "../../header_css.php"
?>
  <link rel="shortcut icon" href="../assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">
</head>
<body>

<?php
include "../../header.php"
?>

<p class ="confirm">この内容で登録します。入力内容を確認してください。</p>

        <table border=1 cellspacing="0" cellpadding="2" class="tableC">
            <tr><th>顧客番号</th>  <td> </td>
            <tr><th>入会日</th>    <td> </td>
            <tr><th>名前</th>      <td>田吾作</td>
            <tr><th>ﾌﾘｶﾞﾅ</th>     <td> </td>
            <tr><th>性別</th>      <td> </td>
            <tr><th>生年月日</th>  <td> </td>
            <tr><th>電話番号</th>  <td> </td>
            <tr><th>携帯番号</th>  <td> </td>
            <tr><th>郵便番号</th>  <td> </td>
            <tr><th>住所</th>      <td> </td>
            <tr><th>備考</th>      <td> </td>
        </table>

<div class ="conf_btn">
  <!-- 顧客画面に戻る -->
  <a href="#" class="square_btn">完了</a>
  <!-- 登録画面に戻る -->
  <a href="#" class="square_btn">修正</a>
</div>
  <br>
  <div class="copyright">
      <div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p></div>
  </div>
</body>
</html>
