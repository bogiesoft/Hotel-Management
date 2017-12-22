<?php
  //DB接続用
$Day = date('Y/m/d',strtotime($_POST['day']));
$Stayday = intval($_POST['stayday']);
$Code = $_POST['code'];
$Name = $_POST['name'];
$Num = intval($_POST['num']);
$Room = $_POST['room_no'];
$Inputter = $_POST['inputter'];
$Remarks = $_POST['remarks'];
$No = rand(0,9999);
$todate =date('Y-m-d');;
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

  $sql = ("INSERT INTO tbl_reservation(RESERVATION_CODE,RESERVATION_DAY,RESERVATION_STAYDAY,CLIENT_CODE,NEWCLIENT_NAME,RESERVATION_NUMBER,ROOM_CODE,EMPLOYEE_CODE,RECEIP_DAY,RESERVATION_REMARKS)value(:RESERVATION_CODE,:RESERVATION_DAY,:RESERVATION_STAYDAY,:CLIENT_CODE,:NEWCLIENT_NAME,:RESERVATION_NUMBER,:ROOM_CODE,:EMPLOYEE_CODE,:RECEIP_DAY,:RESERVATION_REMARKS)");
  $stmt = $pdo->prepare($sql);
  $params = array(':RESERVATION_CODE' => $No,
                  ':RESERVATION_DAY' => $Day,
                  ':RESERVATION_STAYDAY' => $Stayday,
                  ':CLIENT_CODE' => $Code,
                  ':NEWCLIENT_NAME' => $Name,
                  ':RESERVATION_NUMBER' => $Num,
                  ':ROOM_CODE' => $Room,
                  ':EMPLOYEE_CODE' => $Inputter,
                  ':RECEIP_DAY' => $todate,
                  ':RESERVATION_REMARKS' => $Remarks);

  $check=$stmt->execute($params);
  if($check){
  echo "登録に成功しました。　3秒後に予約一覧画面へ移動します。";
  echo "<script type='text/javascript'>
      setTimeout(function(){
       location.replace('/reservation/reservation-list.php');
     }, 3000);
  </script>";
  }else{
  echo "登録に失敗しました！　3秒後に予約登録画面へ移動します。";
  echo "<script type='text/javascript'>
      setTimeout(function(){
       location.replace('/reservation/reservation-registration.php');
     }, 3000);
  </script>";
  }

}
catch(PDOException $e){
   echo 'user error';
 echo $e->getMessage();
 exit;
}
?>
