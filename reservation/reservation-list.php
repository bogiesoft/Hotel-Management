<!DOCTYPE html>
<html lang="ja">

<head>
    <title>予約一覧</title>
<?php
include "../header_css.php"
?>
    <link rel="stylesheet" type="text/css" href="../css/reservation-list.css">
    <link rel="shortcut icon" href="../assets/ico/img.png">
    <meta name=viewport content="width=device-width, initial-scale=1">
</head>

<body>

<?php
include "../header.php"
?>

<div class="midasi">
    <p>予約一覧</p>
</div>

<div class="title-list">
    <table class="table table-striped">
            <col style="width: 6%;" /><!--予約番号-->
            <col style="width: 10%;" /><!--宿泊日-->
            <col style="width: 5%;" /><!--泊数-->
            <col style="width: 5%;" /><!--人数-->
            <col style="width: 10%;" /><!--名前-->
            <col style="width: 10%;" /><!--フリガナ-->
            <col style="width: 3%;" /><!--性別-->
            <col style="width: 6%;" /><!--連絡先-->
            <col style="width: 6%;" /><!--部屋番号-->
            <col style="width: 6%;" /><!--部屋タイプ-->
            <col style="width: 10%;" /><!--従業員番号-->
            <col style="width: 10%;" /><!--受付日-->
            <col style="width: 27%;" /><!--備考-->

        <tr><th>予約番号</th><th>宿泊日</th><th>泊数</th><th>人数</th><th>名前</th><th>フリガナ</th><th>性別</th><th>連絡先</th><th>部屋番号</th><th>部屋タイプ</th><th>従業員番号</th><th>受付日</th><th>備考</th></tr>
    </table>
</div>
<div class="scroll_box">
    <div class="elist">
        <table class="table table-striped">
            <col style="width: 6%;" /><!--予約番号-->
            <col style="width: 10%;" /><!--宿泊日-->
            <col style="width: 5%;" /><!--泊数-->
            <col style="width: 5%;" /><!--人数-->
            <col style="width: 10%;" /><!--名前-->
            <col style="width: 10%;" /><!--フリガナ-->
            <col style="width: 3%;" /><!--性別-->
            <col style="width: 6%;" /><!--連絡先-->
            <col style="width: 6%;" /><!--部屋番号-->
            <col style="width: 6%;" /><!--部屋タイプ-->
            <col style="width: 10%;" /><!--従業員番号-->
            <col style="width: 10%;" /><!--受付日-->
            <col style="width: 27%;" /><!--備考-->

            <!--<tr><td>名前</td><td>ふりがな</td><td>性別</td><td>登録日</td><td>住所</td></tr>-->
            <?php
            include "reservation-list-Extraction.php"
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
