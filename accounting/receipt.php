<?php
    $rsv = $_POST['rsv_id'];
    $room = $_POST['room_id'];
    $emp = $_POST['e_id'];
    $c_id = $_POST['c_id'];
    $c_name = $_POST['c_name'];
    $in = $_POST['checkin'];
    $out = $_POST['checkout'];
    $stay = $_POST['stayday'];
    $sales = $_POST['pay'];

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
    $sql = ("INSERT INTO tbl_sales(SALES_CODE,SALES_PRICE,RESERVATION_CODE,EMPLOYEE_CODE,RECEIPT_DAY)
  VALUE(:SALES_CODE,:SALES_PRICE,:RESERVATION_CODE,:EMPLOYEE_CODE,:RECEIPT_DAY)");
    $stmt = $pdo->prepare($sql);
    $params = array(':SALES_CODE' => 'NULL',
        ':SALES_PRICE' => $sales,
        ':RESERVATION_CODE' => $rsv,
        ':EMPLOYEE_CODE' => $emp,
        ':RECEIPT_DAY' => date('Y/m/d'));

    if (!$stmt) {
        echo "\nPDO::errorInfo():\n";
        print_r($pdo->errorInfo());
    }
    $stmt->execute($params);

    echo"OK";

}
catch(PDOException $e){
    echo 'user error';
    echo $e->getMessage();
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="content-type" charset="utf-8">
    <title>会計｜ホテル宿泊管理システム</title>
    <link rel="stylesheet" type="text/css" href="../css/receipt.css">
    <link rel="shortcut icon" href="../assets/ico/img.png">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <script>
        var hiduke=new Date();
        var year = hiduke.getFullYear();
        var month = hiduke.getMonth()+1;
        var week = hiduke.getDay();
        var day = hiduke.getDate();
    </script>
</head>
    <body>
    <div class="boxbill">
    <p style="text-align: center">登録完了しました</p>
    <div class="bill">
        <p style="text-align: center; font-size: 26px;">領収証</p>

        <script>document.write(s);</script>
    </div>
    <a href="accounting.php"><p style="text-align: center">会計画面に戻る</p></a>
    </div>
    </body>
</html>
