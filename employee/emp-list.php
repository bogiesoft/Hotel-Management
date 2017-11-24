<!DOCTYPE html>
<html lang="ja">
<head>
<title>従業員一覧</title>

<?php
include "../header_css.php"
?>

<link rel="stylesheet" type="text/css" href="css/emp-list.css">
<link rel="shortcut icon" href="assets/ico/img.png">
<meta name=viewport content="width=device-width, initial-scale=1">
</head>

<body>

<?php
include "../header.php"
?>


<div class="midasi">
  <p>従業員一覧</p>
</div>

 <div class="title-list">
   <table class="table table-striped">
     <col style="width: 19%;" />
     <col style="width: 19%;" />
     <col style="width: 19%;" />
     <col style="width: 19%;" />
     <col style="width: 19%;" />
     <col style="width: 1.4%;" />
     <tr><th>名前</th><th>ふりがな</th><th>登録日</th><th>性別</th><th>責任者</th><th></th></tr>
   </table>
 </div>
 <div class="scroll_box">
  <div class="elist">
    <table class="table table-striped">
      <col style="width: 20%;" />
      <col style="width: 20%;" />
      <col style="width: 20%;" />
      <col style="width: 20%;" />
      <col style="width: 20%;" />
      <!--<tr><td></td><td></td><td>2017/10/10</td><td>男</td><td>false</td></tr>-->
      <?php
      include "emp-list-Extraction.php"
      ?>
    </table>
  </div>
</div>


  <div class="copyright">
  <div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
  </div>
</body>



</html>
