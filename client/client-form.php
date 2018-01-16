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
  $sql = ("INSERT INTO tbl_client(CLIENT_CODE,CLIENT_ENTRY,CLIENT_NAME,CLIENT_KANA,CLIENT_SEX,CLIENT_TEL,CLIENT_MOBILE,CLIENT_BIRTH,CLIENT_POSTCODE,CLIENT_ADDRESS,CLIENT_REMARKS,CLIENT_EMPLOYEE_CODE)
  VALUE(:CLIENT_CODE,:CLIENT_ENTRY,:CLIENT_NAME,:CLIENT_KANA,:CLIENT_SEX,:CLIENT_TEL,:CLIENT_MOBILE,:CLIENT_BIRTH,:CLIENT_POSTCODE,:CLIENT_ADDRESS,:CLIENT_REMARKS,:CLIENT_EMPLOYEE_CODE)");
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
  $check=$stmt;
  if($check){
  echo "登録に成功しました。　3秒後に顧客一覧画面へ移動します。";
  }else{
  echo "登録に失敗しました！　3秒後に顧客登録画面へ移動します。";
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
      if(<?php echo json_encode($check);?>) {
          location.href='/client/client-list.php';
      }else {
          location.href='/client/client-registration.php';
      }

   }, 3000);
</script>
