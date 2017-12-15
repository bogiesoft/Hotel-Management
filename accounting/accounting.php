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
                <label class="col-xs-2 label-control">予約番号：</label>
                <div class="col-xs-2">
                    <input type="text" name="rsv_id"  id="code" list="yoyaku" placeholder="テキスト入力もしくはダブルクリック" autocomplete="off" style="height: 26px">
                    <datalist id="yoyaku">
                    <?php
                    $db->exec('SET FOREIGN_KEY_CHECKS=0;');
                    $stmt = $db->query("SELECT RESERVATION_CODE FROM tbl_reservation");
                    $reservation = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($reservation as $row):
                        ?>{
                        <option value="<?=$row['RESERVATION_CODE']?>"><?=$row['RESERVATION_CODE']?></option>
                        }
                    <?php endforeach?>
                    </datalist>
                    <script>
                        <?php $stmt = $db->query('select RESERVATION_CODE, ROOM_CODE, EMPLOYEE_CODE, tbl_reservation.CLIENT_CODE, CLIENT_NAME, RESERVATION_STAYDAY
                                                   from tbl_reservation left outer join tbl_client on tbl_reservation.CLIENT_CODE = tbl_client.CLIENT_CODE'); ?>
                        <?php $rsv = $stmt -> fetchAll(PDO::FETCH_ASSOC); ?>
                        <?php $val_rsv = json_encode($rsv);?>

                        $( function() {
                            $('#code').change( function() {
                                var array_rsv = JSON.parse('<?php echo $val_rsv;?>');
                                console.log(array_rsv);
                                var setCode = $('#code').val();
                                var i;
                                var room;
                                var emp;
                                var id;
                                var name;
                                var stay;

                                console.log(setCode);

                                for (i=0; 2 > i;i++) {
                                    console.log(i);
                                    if(setCode == array_rsv[i]['RESERVATION_CODE']) {
                                        console.log(array_rsv[i]['ROOM_CODE']);
                                        room = array_rsv[i]['ROOM_CODE'];
                                        $('#r_code').val(room);

                                        console.log(array_rsv[i]['EMPLOYEE_CODE']);
                                        emp = array_rsv[i]['EMPLOYEE_CODE'];
                                        $('#emp_id').val(emp);

                                        console.log(array_rsv[i]['CLIENT_CODE']);
                                        id = array_rsv[i]['CLIENT_CODE'];
                                        $('#cli_id').val(id);

                                        console.log(array_rsv[i]['CLIENT_NAME']);
                                        name = array_rsv[i]['CLIENT_NAME'];
                                        $('#cli_name').val(name);

                                        console.log(array_rsv[i]['RESERVATION_STAYDAY']);
                                        stay = array_rsv[i]['RESERVATION_STAYDAY'];
                                        $('#r_stay').val(stay);

                                        break;
                                    }
                                }

                            });
                        });
                    </script>
                    <script>
                        <?php
                        $stmt = $db->query("SELECT tbl_reservation.ROOM_CODE, RESERVATION_NUMBER, RESERVATION_STAYDAY, ROOM_PRICE
                                    FROM tbl_reservation LEFT OUTER JOIN tbl_room ON tbl_reservation.ROOM_CODE = tbl_room.ROOM_CODE");
                        $bill = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                        $val_bill = json_encode($bill);
                        ?>
                        $(function () {
                            $('#code').change( function () {
                                var array_bill = JSON.parse('<?php echo $val_bill;?>');
                                console.log(array_bill);
                                var count = array_bill.length;

                                for(i=0; count>i;i++) {
                                    var number = array_bill[i]['RESERVATION_NUMBER'];
                                    console.log(number);
                                    var stay = array_bill[i]['RESERVATION_STAYDAY'];
                                    console.log(stay);
                                    var price = array_bill[i]['ROOM_PRICE'];
                                    console.log(price);
                                    var bill = number * stay * price;
                                    console.log(bill);
                                    $('#bill').val(bill);
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 label-control">部屋番号：</label>
                <div class="col-xs-2">
                    <input type="text" name="room_id" id="r_code" class="form-control" size="10">
                </div>
                <label class="col-xs-2 label-control">従業員番号：</label>
                <div class="col-xs-2">
                    <select name="e_id" id="emp_id">
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
                <label class="col-xs-2 label-control">顧客番号：</label>
                <div class="col-xs-2">
                    <input type="text" name="c_id" id="cli_id" class="form-control" size="12">
                </div>
                <label class="col-xs-2 label-control">顧客名：</label>
                <div class="col-xs-2">
                    <input type="text" name="c_name" id="cli_name" class="form-control" size="10">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 label-control">CheckIn：</label>
                <div class="col-xs-2">
                    <input type="date" name="checkin" class="form-control" size="12">
                </div>
                <label class="col-xs-2 label-control">泊数：</label>
                <div class="col-xs-2">
                    <input type="text" name="stayday" id="r_stay" class="form-control" size="12">
                </div>
            </div>
          <script>
              <?php
              $stmt = $db->query("SELECT tbl_reservation.ROOM_CODE, RESERVATION_NUMBER, RESERVATION_STAYDAY, ROOM_PRICE
                                    FROM tbl_reservation LEFT OUTER JOIN tbl_room ON tbl_reservation.ROOM_CODE = tbl_room.ROOM_CODE");
              $bill = $stmt -> fetchAll(PDO::FETCH_ASSOC);
              $val_bill = json_encode($bill);
              ?>
              $(function () {
                  $('#r_stay').change( function () {

                      var array_bill = JSON.parse('<?php echo $val_bill;?>');
                      console.log(array_bill.length);

                      for(i=0; array_bill.length> i;i++){
                          var number  = array_bill[i]['RESERVATION_NUMBER'];
                          console.log(number);
                          var stay    = ['RESERVATION_STAYDAY'];
                          console.log(stay);
                          var price   = ['ROOM_PRICE'];
                          console.log(price);
                          var bill = number * stay * price;
                          console.log(bill);
                          $('#bill').val(bill);
                      }
                  });
              });
          </script>
            <div class="form-group">
            <label class="col-xs-2 label-control">CheckOut：</label>
                <div class="col-xs-2">
                   <input type="date" name="checkout" class="form-control" size="12">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 label-control">お支払：</label>
                <div class="col-xs-2">
                    <input type="text" name="pay" id="bill" class="form-control" size="12" readonly="readonly">
                </div>
                <div class="col-xs-2"></div>
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
