<!DOCTYPE html>
<html lang="ja">

<head>
    <title>予約一覧</title>
<?php
include "../header_css.php"
?>
    <link rel="stylesheet" type="text/css" href="css/reservation-list.css">
    <link rel="shortcut icon" href="assets/ico/img.png">
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
        <col style="width: 6%;" />
        <col style="width: 10%;" />
        <col style="width: 7%;" />
        <col style="width: 10%;" />
        <col style="width: 10%;" />
        <col style="width: 6%;" />
        <col style="width: 6%;" />
        <col style="width: 10%;" />
        <col style="width: 10%;" />
        <col style="width: 27%;" />

        <tr><th>予約番号</th><th>宿泊日</th><th>泊数</th><th>名前</th><th>ふりがな</th><th>性別</th><th>部屋番号</th><th>部屋タイプ</th><th>連絡先</th><th>備考</th></tr>
    </table>
</div>
<div class="scroll_box">
    <div class="elist">
        <table class="table table-striped">
            <col style="width: 6%;" />
            <col style="width: 10%;" />
            <col style="width: 7%;" />
            <col style="width: 10%;" />
            <col style="width: 10%;" />
            <col style="width: 6%;" />
            <col style="width: 6%;" />
            <col style="width: 10%;" />
            <col style="width: 10%;" />
            <col style="width: 27%;" />

            <!--<tr><td>名前</td><td>ふりがな</td><td>性別</td><td>登録日</td><td>住所</td></tr>-->
            <tr><td>0162</td><td>2017/12/31</td><td>5泊</td><td>久田 成彦</td><td>くだ なるひこ</td><td>男</td><td>101</td><td>エコノミーシングル</td><td>090-1679-3241</td><td>バスタオル2枚用意</td></tr>
        </table>
    </div>
</div>


<div class="copyright">
    <div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
