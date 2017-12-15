<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!DOCTYPE html>

<html lang="ja">
<head>
<title>部屋登録変更</title>
<?php
include "../header_css.php"
?>
<link rel="stylesheet" type="text/css" href="../css/room-registration-change.css">
<link rel="shortcut icon" href="../assets/ico/img.png">
<meta name=viewport content="width=device-width, initial-scale=1">

<?php
$todate =date('Y-m-d');
?>

</head>
<body>

<?php
include "../header.php"
?>
<div class="row">
<div class="midasi col-sm-2">
  <h4>部屋登録変更</h4>
</div>

</div>
<div class="box">
    <table  border=1 class="table">
      <col style="width: 5%;">  <!--部屋no-->
      <col style="width: 20%;"> <!--タイプ-->
      <col style="width: 5%;"> <!--定員数-->
      <col style="width: 5%;"> <!--ベット数-->
      <col style="width: 5%;"> <!--金額-->
      <col style="width: 5%;"> <!--煙草-->
      <col style="width: 7%;"> <!--改装状況-->
      <col style="width: 10%;"> <!--改装開始-->
      <col style="width: 10%;"> <!--改装終了-->
      <col style="width: 10%;"> <!--清掃状況-->
      <tr class="success"><th>部屋No.</th><th>タイプ</th><th>定員数</th><th>ベッド数</th><th>金額</th><th>煙草</th><th>改装状況</th><th>改装開始日</th><th>改装終了日</th><th>清掃状況</th></tr>
    </table>
  </div>
  <div class="scroll_box">
    <table class="table table-hover">
      <col style="width: 5%;">  <!--部屋no-->
      <col style="width: 20%;"> <!--タイプ-->
      <col style="width: 5%;"> <!--定員数-->
      <col style="width: 5%;"> <!--ベット数-->
      <col style="width: 5%;"> <!--金額-->
      <col style="width: 5%;"> <!--煙草-->
      <col style="width: 7%;"> <!--改装状況-->
      <col style="width: 10%;"> <!--改装開始-->
      <col style="width: 10%;"> <!--改装終了-->
      <col style="width: 10%;"> <!--清掃状況-->
      <?php
      require"../dbconnect.php";//DB接続用ファイルの読み込み


      //テーブルのレコードを抽出
      $stmt = $db->query('select * from tbl_room');
      //fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
      $users = $stmt -> fetchAll(PDO::FETCH_ASSOC);

      // foreach文で配列の中身を一行ずつ出力
      foreach ($users as $row) {
         //<tr><td></td><td></td><td>2017/10/10</td><td>男</td><td>false</td></tr>
$START_RENOVATIONphp=$row['START_RENOVATION'];
$END_RENOVATIONphp=$row['END_RENOVATION'];

         echo '<tr>'.
             '<td>'.$row['ROOM_NAME'].'</td>'.
             '<td>'.$row['ROOM_TYPE'].'</td>'.
             '<td>'.$row['ROOM_CAPACITY'].'</td>'.
             '<td>'.$row['ROOM_BETS'].'</td>'.
             '<td>'.$row['ROOM_PRICE'].'円</td>'.
             '<td><select name="SMOKING">
<option value="0" ';
if($row['ROOM_SMOKING'] === '0'){
                 echo 'selected';
             };
             echo '>禁煙
<option value="1" ';
if($row['ROOM_SMOKING'] === '1'){
                 echo 'selected';
             };
             echo '>喫煙
</select></td>';
             if($row['ROOM_RENOVATION'] === '1'||$todate>=$START_RENOVATIONphp&&$todate<=$END_RENOVATIONphp){
                 echo '<td>'."改装中".'</td>';
             }else if($START_RENOVATIONphp==null){
                 echo '<td>'."改装予定なし".'</td>';
             }else{
                 echo '<td>'."改装予定あり".'</td>';
             };
             echo'<td><input type="date" value='.$row['START_RENOVATION'].'></td>'.
             '<td><input type="date" value='.$row['END_RENOVATION'].'></td>'.
             '<td><select name="CLEAN">
<option value="0" ';
if($row['ROOM_CLEAN'] === '0'){
                 echo 'selected';
             }; echo '>使用可
<option value="1" ';
                if($row['ROOM_CLEAN'] === '1'){
                 echo 'selected';
               };
             echo '>清掃中
</select></td>';

      }
      ?>
   </table>

 </div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
