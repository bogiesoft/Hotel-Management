<?php
require"../dbconnect.php";
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
      if($id!="*"){
          $sql = "delete * from tbl_room where ROOM_CODE=:id";
          $stmt = $dbh->prepare($sql);
          $params = array(‘:id’=>$id);
          $stmt->execute($params);
        }
  }else{
    echo'削除失敗';
  }
 ?>
