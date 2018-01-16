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
        var date = year+"年"+ month +"月"+ day +"日";
    </script>

</head>
    <body>
    <?php
    include "../dbconnect.php"
    ?>
    <script>
        <?php
            $room = $_POST['room_id'];
            $code = $_POST['rsv_id'];
            $name = $_POST['client'];
            $bill = $_POST['pay'];
        ?>
        var room = <?php print $room;?>;
        var code = <?php print $code;?>;
        var name = '<?php print $name;?>';
        var bill = <?php print $bill;?>;
        console.log(room);
        console.log(code);
        console.log(name);
        console.log(bill);
    </script>
    <section style="page-break-after: always;">
        <div class="sheet" style="position: relative; border-bottom: dashed 1px #000">
        <p class="title">領収証</p>
            <div>　
                <span style="font-size: 1.5em">No.<script>document.write(code);</script>　　</span>
                　　　　　　　　　　　　　　　　　　　　　
                <span style="font-size: 1.5em;">発行日:<script>document.write(date);</script></span>
            </div>
            <div>　
                <span style="border-bottom: solid 1px #000">　　　　　<span style="font-size: 2.25em;"><script>document.write(room);</script></span><span style="font-size: 1.5em;">　号室　</span></span>
            </div>
            <div style="margin:0;">　
                <span style="border-bottom: solid 1px #000"><p style="width: 185mm; margin: 0; height:3em; display: inline-block">　　<span style="font-size: 2.25em;"><script>document.write(name);</script></span></p><p style="font-size: 1.5em; display: inline-block; text-align: right">様　</p></span>
            </div>

        <p class="bill">￥<script>document.write(bill);</script></p>
        <div style="border-bottom: solid 1px #000;width: 24em; margin: 0 auto "><p style="text-align: left; margin: 0">但し</p></div><p style="text-align: center; margin: 0.5em">上記の金額正に領収致しました</p>

        <div class="add"><table>
                <tr>
                    <td rowspan="2" style="font-size: 3em">ホテルOIC</td>
                    <td valign="bottom">〒543-0001　大阪府大阪市天王寺区 6丁目8番地4号</td>
                </tr>
                <tr>
                    <td valign="top">TEL.06-6772-2233　FAX.06-6772-1272</td>
                </tr>
            </table></div>
        </div>

        <div class="sheet" style="position: relative;">
            <p style="font-size: 5px; margin: 0">　</p>
            <p class="title">領収証</p>
            <div>　
                <span style="font-size: 1.5em">No.<script>document.write(code);</script>　　</span>
                　　　　　　　　　　　　　　　　　　　　　
                <span style="font-size: 1.5em;">発行日:<script>document.write(date);</script></span>
            </div>
            <div>　
                <span style="border-bottom: solid 1px #000">　　　　　<span style="font-size: 2.25em;"><script>document.write(room);</script></span><span style="font-size: 1.5em;">　号室　</span></span>
            </div>
            <div style="margin:0;">　
                <span style="border-bottom: solid 1px #000"><p style="width: 185mm; margin: 0; height:3em; display: inline-block">　　<span style="font-size: 2.25em;"><script>document.write(name);</script></span></p><p style="font-size: 1.5em; display: inline-block; text-align: right">様　</p></span>
            </div>

            <p class="bill">￥<script>document.write(bill);</script></p>
            <div style="border-bottom: solid 1px #000;width: 24em; margin: 0 auto "><p style="text-align: left; margin: 0">但し</p></div><p style="text-align: center; margin: 0.5em">上記の金額正に領収致しました</p>

            <div class="add"><table>
                    <tr>
                        <td rowspan="2" style="font-size: 3em">ホテルOIC</td>
                        <td valign="bottom">〒543-0001　大阪府大阪市天王寺区 6丁目8番地4号</td>
                    </tr>
                    <tr>
                        <td valign="top">TEL.06-6772-2233　FAX.06-6772-1272</td>
                    </tr>
                </table></div>
        </div>
    </section>
    </body>
</html>