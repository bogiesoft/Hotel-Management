<?php
  //DB接続用
$Id = $_POST['h_id'];
$Type = $_POST['h_type'];
$Name = $_POST['h_name'];
$Capa = intval($_POST['h_capa']);
$Bed = intval($_POST['h_bed']);
$Smoke = $_POST['h_smoke'];
$Price = intval($_POST['h_price']);
$Reno = $_POST['h_reno'];
$Start_reno = date('Y/m/d',strtotime($_POST['h_start_reno']));

if($Start_reno == '1970/01/01') {
  $Start_reno = null;
}

$Clean = $_POST['h_clean'];
$End_reno = date('Y/m/d',strtotime($_POST['h_end_reno']));
if($End_reno == '1970/01/01') {
  $End_reno = null;
}

$Desc = $_POST['h_desc'];

try {
  $pdo = new PDO('mysql:host=localhost;dbname=oic_hotel;charset=utf8','root','',array(PDO::ATTR_EMULATE_PREPARES => false));
      //接続
}
  catch(PDOException $e){
     echo 'user error';
   echo $e->getMessage();
   exit;
 }

try {

  $sql = ("UPDATE tbl_room SET ROOM_TYPE = :ROOM_TYPE, ROOM_NAME = :ROOM_NAME, ROOM_SMOKING = :ROOM_SMOKING, ROOM_CAPACITY = :ROOM_CAPACITY, ROOM_BED = :ROOM_BED, ROOM_PRICE = :ROOM_PRICE, ROOM_DESCRIPTION = :ROOM_DESCRIPTION, ROOM_RENOVATION = :ROOM_RENOVATION, START_RENOVATION = :START_RENOVATION, END_RENOVATION = :END_RENOVATION, ROOM_CLEAN = :ROOM_CLEAN WHERE ROOM_CODE = :ROOM_CODE");
  $stmt = $pdo->prepare($sql);

  $params = array(':ROOM_CODE' => $Id,
                  ':ROOM_TYPE' => $Type,
                  ':ROOM_NAME' => $Name,
                  ':ROOM_SMOKING' => $Smoke,
                  ':ROOM_CAPACITY' => $Capa,
                  ':ROOM_BED' => $Bed,
                  ':ROOM_PRICE' => $Price,
                  ':ROOM_DESCRIPTION' => $Desc,
                  ':ROOM_RENOVATION' => $Reno,
                  ':START_RENOVATION' => $Start_reno,
                  ':END_RENOVATION' => $End_reno,
                  ':ROOM_CLEAN' => $Clean);

  $check=$stmt->execute($params);

  if($check){
  echo "登録に成功しました。5秒後に部屋登録状況画面に移動します。";
}else{
  echo "登録に失敗しました！　5秒後に部屋登録状況画面に移動します。";
  }

}
catch(PDOException $e){
   echo 'user error';
 echo $e->getMessage();
 exit;
}
?>

<script type="text/javascript">
    setTimeout(function(){
     location.replace('http://localhost/room/room-registration-status.php');
   }, 5000);
</script>
