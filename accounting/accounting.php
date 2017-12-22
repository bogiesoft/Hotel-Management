<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json_parse.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json_parse_state.js"></script>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>会計｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="../css/accounting.css">
  <link rel="shortcut icon" href="../assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">
</head>

<body>
<?php
include "../header.php"
?>
<?php
include "../dbconnect.php"
?>


<div class="box">
  <div class="container">
  <div class="form-horizontal">
      <form action="receipt.php" method="post" name="asd">
            <div class="form-group">
                <label class="col-xs-2 label-control">部屋番号：</label>
                <div class="col-xs-2">
                    <select name="rsv_id"  id="code">
                        <option>部屋を選んでください</option>
                    <?php
                    $db->exec('SET FOREIGN_KEY_CHECKS=0;');
                    $stmt = $db->query("SELECT RESERVATION_CODE, CLIENT_KANA, ROOM_NAME, RESERVATION_DAY FROM tbl_reservation left outer join tbl_room on tbl_reservation.ROOM_CODE = tbl_room.ROOM_CODE left outer join tbl_client on tbl_reservation.CLIENT_CODE = tbl_client.CLIENT_CODE where RESERVATION_DAY < date(sysdate())");
                    $reservation = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($reservation as $row):
                        ?>{
                        <option value="<?=$row['RESERVATION_CODE']?>"><?=$row['ROOM_NAME']?>　<span style="font-size: 12px"><?=$row['CLIENT_KANA']?></span></option>
                        }
                    <?php endforeach?>
                    </select>
                    <script>
                        <?php $stmt = $db->query('select RESERVATION_CODE, CLIENT_NAME, ROOM_NAME, RESERVATION_DAY
                                                   from tbl_reservation left outer join tbl_room on tbl_reservation.ROOM_CODE = tbl_room.ROOM_CODE
                                                   left outer join tbl_client on tbl_reservation.CLIENT_CODE = tbl_client.CLIENT_CODE;
                                                   '); ?>
                        <?php $rsv = $stmt -> fetchAll(PDO::FETCH_ASSOC); ?>
                        <?php $val_rsv = json_encode($rsv);?>

                        $( function() {
                            $('#code').change( function() {
                                var array_rsv = JSON.parse('<?php echo $val_rsv;?>');
                                console.log(array_rsv);
                                var setCode = $('#code').val();
                                var count = array_rsv.length;
                                var i;
                                var room;
                                var name;
                                var c_in;
                                var ci;

                                var hiduke=new Date();
                                var year = hiduke.getFullYear();
                                var month = hiduke.getMonth()+1;
                                var day = hiduke.getDate();
                                var c_out =  year + "-" + month + "-" + day;
                                var co =Date.parse(c_out);
                                console.log(c_out);
                                $('#out').val(c_out);

                                console.log(setCode);

                                for (i=0; count > i;i++) {
                                    console.log(i);
                                    if(setCode == array_rsv[i]['RESERVATION_CODE']) {
                                        console.log(array_rsv[i]['CLIENT_NAME']);
                                        name = array_rsv[i]['CLIENT_NAME'];
                                        $('#name').val(name);

                                        console.log(array_rsv[i]['ROOM_NAME']);
                                        room = array_rsv[i]['ROOM_NAME'];
                                        $('#r_num').val(room);

                                        console.log(array_rsv[i]['RESERVATION_DAY']);
                                        c_in = array_rsv[i]['RESERVATION_DAY'];
                                        ci = Date.parse(c_in);
                                        $('#in').val(c_in);
                                        break;
                                    }
                                }

                                var stay = Math.ceil((co - ci) / 86400000);
                                console.log(typeof c_in);
                                console.log(typeof c_out);
                                console.log(stay);
                                $('#r_stay').val(stay);

                            });
                        });
                    </script>
                    <script>
                        <?php
                        $stmt = $db->query("SELECT RESERVATION_CODE, tbl_reservation.ROOM_CODE, RESERVATION_NUMBER, RESERVATION_DAY, ROOM_PRICE
                                    FROM tbl_reservation LEFT OUTER JOIN tbl_room ON tbl_reservation.ROOM_CODE = tbl_room.ROOM_CODE");
                        $bill = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                        $val_bill = json_encode($bill);
                        ?>
                        $(function () {
                            $('#code').change( function () {
                                var array_bill = JSON.parse('<?php echo $val_bill;?>');
                                console.log(array_bill);

                                var hiduke=new Date();
                                    var year = hiduke.getFullYear();
                                    var month = hiduke.getMonth()+1;
                                    var day = hiduke.getDate();
                                    var co =  Date.parse(year + "-" + month + "-" + day);
                                console.log(co);

                                var j;
                                var count = array_bill.length;
                                var setCode = $('#code').val();
                                console.log(setCode);
                                for(j=0; count>j;j++) {
                                    console.log(j);
                                    console.log(array_bill[j]['RESERVATION_CODE']);
                                    if (setCode == array_bill[j]['RESERVATION_CODE']) {
                                        var number = array_bill[j]['RESERVATION_NUMBER'];
                                        console.log(number);
                                        var ci = Date.parse(array_bill[j]['RESERVATION_DAY']);
                                        console.log(ci);
                                        var price = array_bill[j]['ROOM_PRICE'];
                                        console.log(price);
                                        var bill = number * (stay = Math.ceil((co - ci) / 86400000)) * price;
                                        console.log(bill);
                                        $('#bill').val(bill);
                                        break;
                                    }
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 label-control">顧客名：</label>
                <div class="col-xs-2">
                    <input type="text" name="client" id="name" class="form-control" size="10">
                </div>
                <label class="col-xs-2 label-control">従業員名：</label>
                <div class="col-xs-2">
                    <select name="e_id" id="emp_id">
                        <option></option>
                        <?php
                        $db->exec('SET FOREIGN_KEY_CHECKS=0;');
                        $stmt = $db->query("SELECT EMPLOYEE_CODE, EMPLOYEE_NAME FROM tbl_employee");
                        $employee = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($employee as $row):
                            ?>{
                            <option value="<?=$row['EMPLOYEE_CODE']?>"><?=$row['EMPLOYEE_NAME']?></option>
                            }
                        <?php endforeach?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 label-control">CheckIn：</label>
                <div class="col-xs-2">
                    <input type="date" name="checkin" id="in" class="form-control" size="12" readonly="readonly">
                </div>
                <label class="col-xs-2 label-control">泊数：</label>
                <div class="col-xs-2">
                    <input type="text" name="stayday" id="r_stay" class="form-control" size="12">
                </div>
            </div>
            <div class="form-group">
            <label class="col-xs-2 label-control">CheckOut：</label>
                <div class="col-xs-2">
                    <input type="date" name="checkout" id="out" class="form-control" size="12" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 label-control">お支払：</label>
                <div class="col-xs-2">
                    <input type="text" name="pay" id="bill" class="form-control" size="12" readonly="readonly">
                </div>
                <div class="col-xs-2">
                    <input type="hidden" name="room_id" id="r_num">
                </div>
                <div class="col-xs-2">
                <button type="submit" class="btn btn-default btn-lg bill">領収書発行</button>
                </div>
            </div>
          </form>


</div>
</div>
</div>

<br>
<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
