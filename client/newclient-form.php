<?php
  //DB接続用
$Id = $_POST['id'];
$Entry = date('Y-m-d');
$Kana = $_POST['kana'];
$Tel = $_POST['tel'];
$Mobile = $_POST['mobile'];
$Emp    = $_POST['emp'];

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
  $sql = ("INSERT INTO tbl_client(CLIENT_CODE,CLIENT_ENTRY,CLIENT_KANA,CLIENT_TEL,CLIENT_MOBILE,CLIENT_EMPLOYEE_CODE)
  VALUE(:CLIENT_CODE,:CLIENT_ENTRY,:CLIENT_KANA,:CLIENT_TEL,:CLIENT_MOBILE,:CLIENT_EMPLOYEE_CODE)");
  $stmt = $pdo->prepare($sql);
  $params = array(':CLIENT_CODE' => $Id,
                  ':CLIENT_ENTRY' => $Entry,
                  ':CLIENT_KANA' => $Kana,
                  ':CLIENT_TEL' => $Tel,
                  ':CLIENT_MOBILE' => $Mobile,
                  ':CLIENT_EMPLOYEE_CODE' => $Emp);

    if (!$stmt) {
   echo "\nPDO::errorInfo():\n";
   print_r($pdo->errorInfo());
 }
  $stmt->execute($params);

  echo"登録完了 3秒後に予約登録画面に移動します。";

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

 <script>
 setTimeout("redirect()", 3000);
   function redirect(){
     location.href='http://localhost/reservation/reservation-registration.php';
   }
</script>
