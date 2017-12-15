<?php
  //DB接続用


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
  $sql = ("INSERT INTO tbl_employee(EMPLOYEE_CODE,EMPLOYEE_NAME,EMPLOYEE_KANA,EMPLOYEE_SEX,EMPLOYEE_ENTRY,EMPLOYEE_ADMIN,ADMIN_PASSWORD)value(:EMPLOYEE_CODE,:EMPLOYEE_NAME,:EMPLOYEE_KANA,:EMPLOYEE_SEX,now(),:EMPLOYEE_ADMIN,:ADMIN_PASSWORD)");
  $stmt = $pdo->prepare($sql);
  $params = array(':EMPLOYEE_CODE' => '6784923874123',
                  ':EMPLOYEE_NAME' => '森園　立夏',
                  ':EMPLOYEE_KANA' => 'モリゾノ　リッカ',
                  ':EMPLOYEE_SEX' => '女性',
                  ':EMPLOYEE_ADMIN' => 1,
                  ':ADMIN_PASSWORD' => '123');
$check=$stmt->execute($params);
if($check){
  echo "成功！";
}else{
  echo "失敗！";
}

  echo"登録完了";
}
catch(PDOException $e){
   echo 'user error';
 echo $e->getMessage();
 exit;
}

?>
