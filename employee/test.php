<?php
  //DB接続用
$Id = $_POST['id'];
$Entry = $_POST['entry'];
$Name = $_POST['name'];
$Kana = $_POST['kana'];
$Sex = $_POST['sex'];
$Mgr = $_POST['mgr'];
$Pass = $_POST['pass'];


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
  $sql = ("INSERT INTO tbl_employee(EMPLOYEE_CODE,EMPLOYEE_NAME,EMPLOYEE_KANA,EMPLOYEE_SEX,EMPLOYEE_ENTRY,EMPLOYEE_ADMIN,ADMIN_PASSWORD)value(:EMPLOYEE_CODE,:EMPLOYEE_NAME,:EMPLOYEE_KANA,:EMPLOYEE_SEX,:EMPLOYEE_ENTRY,:EMPLOYEE_ADMIN,:ADMIN_PASSWORD)");
  $stmt = $pdo->prepare($sql);
  $params = array(':EMPLOYEE_CODE' => $Id,
                  ':EMPLOYEE_ENTRY' => $Entry,
                  ':EMPLOYEE_NAME' => $Name,
                  ':EMPLOYEE_KANA' => $Kana,
                  ':EMPLOYEE_SEX' => $Sex,
                  ':EMPLOYEE_ADMIN' => $Mgr,
                  ':ADMIN_PASSWORD' => $Pass);
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
