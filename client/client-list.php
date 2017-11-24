<!DOCTYPE html>
<html lang="ja">

<head>
    <title>顧客一覧</title>
    <?php
    include "../header_css.php"
    ?>
    <link rel="stylesheet" type="text/css" href="css/client-list.css">
    <link rel="shortcut icon" href="assets/ico/img.png">
    <meta name=viewport content="width=device-width, initial-scale=1">
</head>

<body>

<?php
include "../header.php"
?>

<div class="midasi">
    <p>顧客一覧</p>
</div>

<div class="title-list">
    <table class="table table-striped">
        <col style="width: 5%;" />
        <col style="width: 5%;" />
        <col style="width: 10%;" />
        <col style="width: 10%;" />
        <col style="width: 5%;" />
        <col style="width: 5%;" />
        <col style="width: 11%;" />
        <col style="width: 11%;" />
        <col style="width: 17%;" />
        <col style="width: 25%;" />

        <tr><th>顧客番号</th><th>入会日</th><th>名前</th><th>フリガナ</th><th>性別</th><th>生年月日</th><th>連絡先</th><th>郵便番号</th><th>住所</th><th>備考</th></tr>
    </table>
</div>
<div class="scroll_box">
    <div class="elist">
        <table class="table table-striped">
            <col style="width: 5%;" />  <!--顧客番号-->
            <col style="width: 5%;" />  <!--入会日-->
            <col style="width: 10%;" /> <!--名前-->
            <col style="width: 10%;" /> <!--フリガナ-->
            <col style="width: 5%;" />  <!--性別-->
            <col style="width: 5%;" />  <!--年齢-->
            <col style="width: 11%;" /> <!--電話番号-->
            <col style="width: 11%;" /> <!--郵便番号-->
            <col style="width: 17%;" /> <!--住所-->
            <col style="width: 25%;" /> <!--備考-->
            <!--<tr><td>名前</td><td>ふりがな</td><td>性別</td><td>登録日</td><td>住所</td></tr>-->
            <?php
            include "client-list-db.php"
            ?>
        </table>
    </div>
</div>


<div class="copyright">
    <div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
