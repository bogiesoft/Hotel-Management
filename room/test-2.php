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


    $stmt = $db->query('select * from tbl_room');
    //fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
    //$users = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    



  }
 catch(PDOException $e){
    echo 'user error';
  echo $e->getMessage();
  exit;
}
?>
