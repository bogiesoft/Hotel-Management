<?php
  //DB接続用
$R_Code = $_POST['room_code'];
$R_Type = $_POST['room_type'];
$R_Name = $_POST['room_name'];
$R_Capa = $_POST['room_capa'];
$R_Bed = $_POST['room_bed'];
$R_Smokin = $_POST['room_smoking'];
$R_Price = $_POST['room_price'];
$R_Desc = $_POST['room_desc'];
$R_Reno = $_POST['room_reno'];
$R_S_Reno = $_POST['r_start_reno'];
$R_E_Reno = $_POST['r_end_reno'];
$R_Clean = $_POST['room_clean'];


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
  $sql = ("INSERT INTO tbl_employee(ROOM_CODE,ROOM_TYPE,ROOM_NAME,ROOM_SMOKING,ROOM_CAPACITY,ROOM_BETS,ROOM_PRICE,ROOM_DESCRIPTION,ROOM_RENOVATION,START_RENOVATION,END_RENOVATION,ROOM_CLEAN)value(:ROOM_CODE,ROOM_TYPE,ROOM_NAME,ROOM_SMOKING,ROOM_CAPACITY,ROOM_BETS,ROOM_PRICE,ROOM_DESCRIPTION,ROOM_RENOVATION,START_RENOVATION,END_RENOVATION,ROOM_CLEAN)");
  $stmt = $pdo->prepare($sql);
  $params = array(':ROOM_CODE' => $R_Code,
                  ':ROOM_TYPE' => $R_Type,
                  ':ROOM_NAME' => $R_Name,
                  ':ROOM_SMOKING' => $R_Smokin,
                  ':ROOM_CAPACITY' => $R_Capa,
                  ':ROOM_BED' => $R_Bed,
                  ':ROOM_PRICE' => $R_Price,
                  ':ROOM_DESCRIPTION' => $R_Desc,
                  ':ROOM_RENOVATION' => $R_Reno,
                  ':START_RENOVATION' => $R_S_Reno,
                  ':END_RENOVATION' => $R_E_Reno,
                  ':ROOM_CLEAN' => $R_Clean);
  $stmt->execute($params);

  echo"登録完了";
}
catch(PDOException $e){
   echo 'user error';
 echo $e->getMessage();
 exit;
}


/*
<script>
 header('Location:http://localhost/employee/emp-registration.php');
</script>
*/
 ?>
