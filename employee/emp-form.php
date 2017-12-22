<?php
  //DB接続用
$Id = $_POST['id'];
$Name = $_POST['name'];
$Kana = $_POST['kana'];
$Sex = $_POST['sex'];
$Mgr = $_POST['mgr'];


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
  $sql = ("INSERT INTO tbl_employee(EMPLOYEE_CODE,EMPLOYEE_NAME,EMPLOYEE_KANA,EMPLOYEE_SEX,EMPLOYEE_ENTRY,EMPLOYEE_ADMIN)VALUE(:EMPLOYEE_CODE,:EMPLOYEE_NAME,:EMPLOYEE_KANA,:EMPLOYEE_SEX,:EMPLOYEE_ENTRY,:EMPLOYEE_ADMIN)");
  $stmt = $pdo->prepare($sql);
  $params = array(':EMPLOYEE_CODE' => $Id,
                  ':EMPLOYEE_ENTRY' => date('Y/m/d'),
                  ':EMPLOYEE_NAME' => $Name,
                  ':EMPLOYEE_KANA' => $Kana,
                  ':EMPLOYEE_SEX' => $Sex,
                  ':EMPLOYEE_ADMIN' => $Mgr);
    if (!$stmt) {
        echo "\nPDO::errorInfo():\n";
        print_r($pdo->errorInfo());
    }
    $stmt->execute($params);
    echo"登録完了 5秒後に従業員登録画面に移動します";
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
    setTimeout("redirect()", 5000);
    function redirect(){
        location.href='/employee/emp-registration.php';
    }
</script>
