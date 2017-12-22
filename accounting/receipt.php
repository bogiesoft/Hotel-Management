<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="content-type" charset="utf-8">
    <title>会計｜ホテル宿泊管理システム</title>
    <link rel="stylesheet" type="text/css" href="../css/receipt.css">
    <link rel="shortcut icon" href="assets/ico/img.png">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <script>
        var hiduke=new Date();
        var year = hiduke.getFullYear();
        var month = hiduke.getMonth()+1;
        var day = hiduke.getDate();
        var date = year+"/"+ month +"/"+ day;
    </script>
</head>
    <body>
    <div class="boxbill">
        <section class="sheet">
        <p style="text-align: center; font-size: 26px;">領収証</p>
        <script>document.write(date);</script>
        </section>
    </div>
    <a href="accounting.php"><p style="text-align: center">会計画面に戻る</p></a>
    </div>
    </body>
</html>