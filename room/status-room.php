<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
<?php
require"../dbconnect.php";//DB接続用ファイルの読み込み

    //テーブルのレコードを抽出
    $stmt = $db->query('select * from tbl_room');
    //fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
    $rooms = $stmt -> fetchAll(PDO::FETCH_ASSOC);


    $count = 0;

    foreach ($rooms as $row) {
        //var_dump($count);
        //var_dump($row ['ROOM_TYPE']);
        //if($row['ROOM_SMOKING'] === '1'){
        //  echo  '<tr>'.'<td>'."喫煙".'<br>'.$row['ROOM_NAME'].'号室'.'</td>'.'</tr>';
        //}
        //echo  '<td>'."喫煙".'<br>'.$row['ROOM_NAME'].'号室'.'</td>';

        //echo '<td>'."禁煙喫煙".'<br>'.$row['ROOM_NAME'].'号室'.'</td>';
        if($count == 0)
          echo
          '<tr><th><a href="#" class="open">'.
          $row['ROOM_TYPE'].
          '</a><a href="#" class="close">'.
          $row['ROOM_TYPE'].
          '</a></th><td><a href="index.php">'.
          $row['ROOM_NAME'].'号室<br>顧客名</td>';
        else {
          if($row['ROOM_TYPE'] === $roomif)
            echo
            '<td><a href="#" class="open">'.
            $row['ROOM_NAME'].
            '号室<br>顧客名</td></a>';
          else
            echo
            '</tr><tr><th>'.
            $row['ROOM_TYPE'].
            '</th><td><a href="index.php">'.
            $row['ROOM_NAME'].
            '号室<br>顧客名</td>';
            }
        $roomif = $row['ROOM_TYPE'];
        $count++;
}
?>


<script>
$(function() {
  $(".open").on("click", function() {
    $(this).parent('th').nextAll('td').find('.course').toggle();
    $(this).hide();
    $(this).next().show();
  });
  $(".close").on("click", function() {
    $(this).parent('th').nextAll('td').find('.course').toggle();
    $(this).hide();
    $(this).prev().show();
  });
});
</script>
