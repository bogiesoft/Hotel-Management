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
    $check=$stmt;
    if($check){
    echo "登録に成功しました。　3秒後に従業員一覧画面へ移動します。";
    }else{
    echo "登録に失敗しました！　3秒後に従業員一覧画面へ移動します。";
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
     location.replace('/employee/emp-list.php');
   }, 3000);
</script>
