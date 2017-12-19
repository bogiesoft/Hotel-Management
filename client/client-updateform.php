<?php
  //DB接続用
$Id = $_POST['id'];
$Entry = $_POST['entry'];
$Name = $_POST['name'];
$Kana = $_POST['kana'];
$Birth = $_POST['birth'];
$Sex = $_POST['sex'];
$Tel = $_POST['tel'];
$Mobile = $_POST['mobile'];
$Zip = $_POST['zip'];
$Add = $_POST['add'];
$Remark = $_POST['remark'];
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
  $sql = ("UPDATE tbl_client SET CLIENT_ENTRY = :CLIENT_ENTRY,CLIENT_NAME = :CLIENT_NAME,CLIENT_KANA = :CLIENT_KANA,CLIENT_SEX = :CLIENT_SEX,CLIENT_TEL = :CLIENT_TEL,CLIENT_MOBILE = :CLIENT_MOBILE,
    CLIENT_BIRTH = :CLIENT_BIRTH,CLIENT_POSTCODE = :CLIENT_POSTCODE,CLIENT_ADDRESS = :CLIENT_ADDRESS,CLIENT_REMARKS = :CLIENT_REMARKS,CLIENT_EMPLOYEE_CODE = :CLIENT_EMPLOYEE_CODE WHERE CLIENT_CODE = :CLIENT_CODE");
  $stmt = $pdo->prepare($sql);
  $params = array(':CLIENT_CODE' => $Id,
                  ':CLIENT_ENTRY' => $Entry,
                  ':CLIENT_NAME' => $Name,
                  ':CLIENT_KANA' => $Kana,
                  ':CLIENT_SEX' => $Sex,
                  ':CLIENT_TEL' => $Tel,
                  ':CLIENT_MOBILE' => $Mobile,
                  ':CLIENT_BIRTH' => $Birth,
                  ':CLIENT_POSTCODE' => $Zip,
                  ':CLIENT_ADDRESS' => $Add,
                  ':CLIENT_REMARKS' => $Remark,
                  ':CLIENT_EMPLOYEE_CODE' => $Emp);

    if (!$stmt) {
   echo "\nPDO::errorInfo():\n";
   print_r($pdo->errorInfo());
 }
  $stmt->execute($params);

  echo"登録完了 5秒後に顧客登録画面に移動します。";

}

catch(PDOException $e){
   echo 'user error';
 echo $e->getMessage();
 exit;
}
?>

 <script>
 setTimeout("redirect()", 5000);
   function redirect(){
     location.href='/client/client-registration.php';
   }
</script>
