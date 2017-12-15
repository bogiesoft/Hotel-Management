<?php
require"../dbconnect.php";//DB接続用ファイルの読み込み

    //テーブルのレコードを抽出
    $stmt = $db->query('select * from tbl_room');
    //fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
    $rooms = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    foreach ($rooms as $row) {
    echo $row['ROOM_TYPE'];
      echo "<br>";
    }




?>
