<?php
  //DB接続用

  //DB接続設定
  define('DB_DATABASE','oic_hotel');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  define('PDO_DSN','mysql:dbhost=localhost;dbname=' . DB_DATABASE);

  try{
    //接続
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  }
 catch(PDOException $e){
    echo 'user error';
  echo $e->getMessage();
  exit;
}
?>
