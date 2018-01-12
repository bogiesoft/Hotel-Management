<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json_parse.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json_parse_state.js"></script>

<!DOCTYPE html>

<html lang="ja">
<head>
<title>予約登録画面</title>
<?php
include "../header_css.php"
?>
<link rel="stylesheet" type="text/css" href="../css/reservation-registration.css">
<link rel="shortcut icon" href="../assets/ico/img.png">
<meta name=viewport content="width=device-width, initial-scale=1">


<script>
$( function() {
  $('#reg_conf').click( function () {
    $('#reg_pop').modal();

    var getDay = $("#day").val();
    $('#Day_out').text(getDay);

    var getStayDay = $("#stayday").val();
    $('#Stayday_out').text(getStayDay);

    var getCode = $("#code").val();
    $('#Code_out').text(getCode);

    var getName = $("#name").val();
    $('#Name_out').text(getName);

    var getNum = $("#num").val();
    $('#Num_out').text(getNum);

    var getRoom = $("#room").val();
    $('#Room_out').text(getRoom);
    console.log(getRoom);

    var getSmoke = $("#smoke option:selected").text();
    $('#Smoke_out').text(getSmoke);

    var getInputter = $("#inputter").val();
    $('#Inputter_out').text(getInputter);

      var getRoomP = $("#room_p").val();
      $('#RoomP_out').text(getRoomP);

    var getRemarks = $('#remarks').val();
    $('#Remarks_out').text(getRemarks);

      var q_day = document.asw.r_day.value;
      console.log(q_day);
      document.getElementById('w_day').value = q_day;
      var q_stayday = document.asw.stayday.value;
      console.log(q_stayday);
      document.getElementById('w_stayday').value = q_stayday;
      var q_code = document.asw.r_code.value;
      document.getElementById('w_code').value = q_code;
      var q_name = document.asw.r_name.value;
      document.getElementById('w_name').value = q_name;
      var q_num = document.asw.num.value;
      document.getElementById('w_num').value = q_num;
      var q_room = document.asw.room_no.value;
      document.getElementById('w_room_no').value = q_room;
      var q_inputter = document.asw.inputter.value;
      document.getElementById('w_inputter').value = q_inputter;
      var q_remarks = document.asw.c_remarks.value;
      document.getElementById('w_remarks').value = q_remarks;

  });
});
</script>

</head>
<body>

<?php
include "../header.php"
?>
<?php
include "../dbconnect.php"
?>


<div class="boxA">
<div class="box1">
    <div class="container">
        <div class="form-horizontal">
            <form action="reservation-comit.php" method="post" class="rsv" name="asw">
                <div class="form-group">
                    <label class="col-xs-2 label-control ">宿泊日：</label>
                    <div class="col-xs-4">
                        <input type="date" name="r_day" class="form-control" size="12" id="day">
                    </div>
                    <label class="col-xs-2 label-control ">泊数：</label>
                    <div class="col-xs-2">
                        <input type="text" name="stayday" class="form-control" size="2" id="stayday">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">顧客番号：</label>
                    <div class="col-xs-3">

                        <input type="text" name="r_code" class="form-control" size="8" id="code">
                    </div>
                </div>
                <script>
                <?php $stmt = $db->query('select CLIENT_CODE,CLIENT_NAME,CLIENT_KANA,CLIENT_SEX,CLIENT_BIRTH,CLIENT_REMARKS from tbl_client'); ?>
                <?php $cli = $stmt -> fetchAll(PDO::FETCH_ASSOC); ?>
                <?php $val_cli = json_encode($cli);?>
                <?php $count = json_encode(count($cli));?>


                $( function() {
                  $('#code').change( function() {
                    var array_cli = JSON.parse('<?php echo $val_cli;?>');
                    var array_count = JSON.parse('<?php echo $count?>');


                    var setCode = $('#code').val();
                    var i;
                    var cli_name;

                    for (i=0; array_count > i;i++) {

                      if(setCode == array_cli[i]['CLIENT_CODE']) {

                        cli_name = array_cli[i]['CLIENT_NAME'];
                        cli_kana = array_cli[i]['CLIENT_KANA'];
                        cli_sex = array_cli[i]['CLIENT_SEX'];
                        cli_birth = array_cli[i]['CLIENT_BIRTH'];
                        cli_remarks = array_cli[i]['CLIENT_REMARKS'];

                          if(cli_name != null) {
                            $('#name').val(cli_name);
                            $('#f-name').val(cli_name);
                            $('#f-kana').val(cli_kana);
                            $('#f-sex').val(cli_sex);
                            $('#f-birthday').val(cli_birth);
                            $('#f-remarks').val(cli_remarks);
                          }else {
                            $('#name').val(cli_kana);
                            $('#f-name').val(cli_name);
                            $('#f-kana').val(cli_kana);
                            $('#f-sex').val(cli_sex);
                            $('#f-birthday').val(cli_birth);
                            $('#f-remarks').val(cli_remarks);
                          }


                        break;
                      }
                    }

                  });
                });
                </script>
                <div class="form-group">
                  <label class="col-xs-2 label-control">顧客名：</label>
                  <div class="col-xs-9">
                    <input type="text" name="r_name" class="form-control" size="21" id="name" >
                  </div>
                </div>

                <script type="text/javascript" src="ConnectedSelect.js"></script>
                <div class="form-group">
                    <label class="col-xs-2 label-control">人数：</label>
                    <div class="col-xs-2">
                        <select name="num" id="num">
                          <option value="">---</option>
                          <option value="1">1人</option>
                          <option value="2">2人</option>
                          <option value="3">3人</option>
                          <option value="4">4人</option>
                        </select>
                    </div>
                    <label class="col-xs-2 label-control">客室名称：</label>
                    <div class="col-xs-2">
                        <select name="room" id="room">
                            <option value="">--客室名称を選択--</option>
                          <optgroup label="1">
                            <option value="エコノミーシングル">エコノミーシングル</option>
                            <option value="標準シングル">標準シングル</option>
                            <option value="デラックスシングル">デラックスシングル</option>
                            <option value="エコノミーダブル">エコノミーダブル</option>
                            <option value="標準ダブル">標準ダブル</option>
                            <option value="キングダブル">キングダブル</option>
                            <option value="エコノミーツイン">エコノミーツイン</option>
                            <option value="標準ツイン">標準ツイン</option>
                            <option value="デラックスツイン">デラックスツイン</option>
                            <option value="ファミリー和室">ファミリー和室</option>
                            <option value="シングル">シングル</option>
                            <option value="ダブル">ダブル</option>
                            <option value="ツイン">ツイン</option>
                          </optgroup>
                          <optgroup label="2">
                            <option value="エコノミーダブル">エコノミーダブル</option>
                            <option value="標準ダブル">標準ダブル</option>
                            <option value="キングダブル">キングダブル</option>
                            <option value="エコノミーツイン">エコノミーツイン</option>
                            <option value="標準ツイン">標準ツイン</option>
                            <option value="デラックスツイン">デラックスツイン</option>
                            <option value="ファミリー和室">ファミリー和室</option>
                            <option value="ダブル">ダブル</option>
                            <option value="ツイン"></option>
                          </optgroup>
                          <optgroup label="3">
                            <option value="ファミリー和室">ファミリー和室</option>
                          </optgroup>
                          <optgroup label="4">
                            <option value="ファミリー和室">ファミリー和室</option>
                          </optgroup>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">煙草：</label>
                    <div class="col-xs-4">
                      <select name="smoke" id="smoke">
                          <option value="">----</option>
                        <optgroup label="エコノミーシングル">
                          <option value="エコノミーシングル：禁煙">禁煙</option>
                          <option value="エコノミーシングル：喫煙">喫煙</option>
                          <option value="エコノミーシングル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="標準シングル">
                          <option value="標準シングル：禁煙">禁煙</option>
                          <option value="標準シングル：喫煙">喫煙</option>
                          <option value="標準シングル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="デラックスシングル">
                          <option value="デラックスシングル：禁煙">禁煙</option>
                          <option value="デラックスシングル：喫煙">喫煙</option>
                          <option value="デラックスシングル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="エコノミーダブル">
                          <option value="エコノミーダブル：禁煙">禁煙</option>
                          <option value="エコノミーダブル：喫煙">喫煙</option>
                          <option value="エコノミーダブル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="標準ダブル">
                          <option value="標準ダブル：禁煙">禁煙</option>
                          <option value="標準ダブル：喫煙">喫煙</option>
                          <option value="標準ダブル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="キングダブル">
                          <option value="キングダブル：禁煙">禁煙</option>
                          <option value="キングダブル：喫煙">喫煙</option>
                          <option value="キングダブル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="エコノミーツイン">
                          <option value="エコノミーツイン：禁煙">禁煙</option>
                          <option value="エコノミーツイン：喫煙">喫煙</option>
                          <option value="エコノミーツイン：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="標準ツイン">
                          <option value="標準ツイン：禁煙">禁煙</option>
                          <option value="標準ツイン：喫煙">喫煙</option>
                          <option value="標準ツイン：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="デラックスツイン">
                          <option value="デラックスツイン：禁煙">禁煙</option>
                          <option value="デラックスツイン：喫煙">喫煙</option>
                          <option value="デラックスツイン：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="ファミリー和室">
                          <option value="ファミリー和室：禁煙">禁煙</option>
                        </optgroup>
                        <optgroup label="シングル">
                          <option value="シングル：禁煙">禁煙</option>
                          <option value="シングル：喫煙">喫煙</option>
                          <option value="シングル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="ダブル">
                          <option value="ダブル：禁煙">禁煙</option>
                          <option value="ダブル：喫煙">喫煙</option>
                          <option value="ダブル：どちらでも">どちらでも</option>
                        </optgroup>
                        <optgroup label="ツイン">
                          <option value="ツイン：禁煙">禁煙</option>
                          <option value="ツイン：喫煙">喫煙</option>
                          <option value="ツイン：どちらでも">どちらでも</option>
                        </optgroup>
                      </select>
                    </div>
                    <label class="col-xs-2 label-control">部屋番号：</label>
                    <div class="col-xs-2">
                        <select name="room_no" id="room_p">
                            <option value="">----</option>
                          <optgroup label="エコノミーシングル：禁煙">
                            <option value="01">101号</option>
                            <option value="02">102号</option>
                          </optgroup>
                          <optgroup label="エコノミーシングル：喫煙">
                            <option value="03">103号</option>
                          </optgroup>
                          <optgroup label="エコノミーシングル：どちらでも">
                            <option value="01">101号</option>
                            <option value="02">102号</option>
                            <option value="03">103号</option>
                          </optgroup>
                          <optgroup label="標準シングル：禁煙">
                            <option value="04">105号</option>
                            <option value="05">106号</option>
                          </optgroup>
                          <optgroup label="標準シングル：喫煙">
                            <option value="06">107号</option>
                          </optgroup>
                          <optgroup label="標準シングル：どちらでも">
                            <option value="04">105号</option>
                            <option value="05">106号</option>
                            <option value="06">107号</option>
                          </optgroup>
                          <optgroup label="デラックスシングル：禁煙">
                            <option value="07">109号</option>
                          </optgroup>
                          <optgroup label="デラックスシングル：喫煙">
                            <option value="08">110号</option>
                          </optgroup>
                          <optgroup label="デラックスシングル：どちらでも">
                            <option value="07">109号</option>
                            <option value="08">110号</option>
                          </optgroup>
                          <optgroup label="エコノミーダブル：禁煙">
                            <option value="09">201号</option>
                          </optgroup>
                          <optgroup label="エコノミーダブル：喫煙">
                            <option value="10">202号</option>
                          </optgroup>
                          <optgroup label="エコノミーダブル：どちらでも">
                            <option value="09">201号</option>
                            <option value="10">202号</option>
                          </optgroup>
                          <optgroup label="標準ダブル：禁煙">
                            <option value="11">204号</option>
                            <option value="12">205号</option>
                          </optgroup>
                          <optgroup label="標準ダブル：喫煙">
                            <option value="13">206号</option>
                          </optgroup>
                          <optgroup label="標準ダブル：どちらでも">
                            <option value="11">204号</option>
                            <option value="12">205号</option>
                            <option value="13">206号</option>
                          </optgroup>
                          <optgroup label="キングダブル：禁煙">
                            <option value="14">208号</option>
                          </optgroup>
                          <optgroup label="キングダブル：喫煙">
                            <option value="15">209号</option>
                          </optgroup>
                          <optgroup label="キングダブル：どちらでも">
                            <option value="14">208号</option>
                            <option value="15">209号</option>
                          </optgroup>
                          <optgroup label="エコノミーツイン：禁煙">
                            <option value="16">301号</option>
                          </optgroup>
                          <optgroup label="エコノミーツイン：喫煙">
                            <option value="17">302号</option>
                          </optgroup>
                          <optgroup label="エコノミーツイン：どちらでも">
                            <option value="16">301号</option>
                            <option value="17">302号</option>
                          </optgroup>
                          <optgroup label="標準ツイン：禁煙">
                            <option value="18">304号</option>
                            <option value="19">305号</option>
                          </optgroup>
                          <optgroup label="標準ツイン：喫煙">
                            <option value="20">306号</option>
                          </optgroup>
                          <optgroup label="標準ツイン：どちらでも">
                            <option value="18">304号</option>
                            <option value="19">305号</option>
                            <option value="20">306号</option>
                          </optgroup>
                          <optgroup label="デラックスツイン：禁煙">
                            <option value="21">308号</option>
                          </optgroup>
                          <optgroup label="デラックスツイン：喫煙">
                            <option value="22">309号</option>
                          </optgroup>
                          <optgroup label="デラックスツイン：どちらでも">
                            <option value="21">308号</option>
                            <option value="22">309号</option>
                          </optgroup>
                          <optgroup label="ファミリー和室：禁煙">
                            <option value="23">401号</option>
                          </optgroup>
                          <optgroup label="シングル：禁煙">
                            <option value="01">101号</option>
                            <option value="02">102号</option>
                            <option value="04">105号</option>
                            <option value="05">106号</option>
                            <option value="07">109号</option>
                          </optgroup>
                          <optgroup label="シングル：喫煙">
                            <option value="03">103号</option>
                            <option value="06">107号</option>
                            <option value="08">110号</option>
                          </optgroup>
                          <optgroup label="シングル：どちらでも">
                            <option value="01">101号</option>
                            <option value="02">102号</option>
                            <option value="03">103号</option>
                            <option value="04">105号</option>
                            <option value="05">106号</option>
                            <option value="06">107号</option>
                            <option value="07">109号</option>
                            <option value="08">110号</option>
                          </optgroup>
                          <optgroup label="ダブル：禁煙">
                            <option value="09">201号</option>
                            <option value="11">204号</option>
                            <option value="12">205号</option>
                            <option value="14">208号</option>
                          </optgroup>
                          <optgroup label="ダブル：喫煙">
                            <option value="10">202号</option>
                            <option value="13">206号</option>
                            <option value="15">209号</option>
                          </optgroup>
                          <optgroup label="ダブル：どちらでも">
                            <option value="09">201号</option>
                            <option value="10">202号</option>
                            <option value="11">204号</option>
                            <option value="12">205号</option>
                            <option value="13">206号</option>
                            <option value="14">208号</option>
                            <option value="15">209号</option>
                          </optgroup>
                          <optgroup label="ツイン：禁煙">
                            <option value="16">301号</option>
                            <option value="18">304号</option>
                            <option value="19">305号</option>
                            <option value="21">308号</option>
                          </optgroup>
                          <optgroup label="ツイン：喫煙">
                            <option value="17">302号</option>
                            <option value="20">306号</option>
                            <option value="22">309号</option>
                          </optgroup>
                          <optgroup label="ツイン：どちらでも">
                            <option value="16">301号</option>
                            <option value="17">302号</option>
                            <option value="18">304号</option>
                            <option value="19">305号</option>
                            <option value="20">306号</option>
                            <option value="21">308号</option>
                            <option value="22">309号</option>
                          </optgroup>
                        </select>

                        <script type="text/javascript">
                          ConnectedSelect(['num','room','smoke','room_p']);
                        </script>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 label-control">備考：</label>
                    <div class="col-xs-9">
                        <input type="text" name="c_remarks" class="form-control" id="remarks">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 label-control">入力者：</label>
                    <div class="col-xs-2">
                        <select name="inputter" id="inputter">
                            <option value="未選択">--入力者を選択--</option>
                            <?php  $stmt = $db->query('select EMPLOYEE_CODE,EMPLOYEE_NAME from tbl_employee'); ?>
                            <?php  $employee = $stmt -> fetchAll(PDO::FETCH_ASSOC); ?>
                            <?php  foreach ($employee as $row): ?> {
                                      <option value="<?= $row['EMPLOYEE_CODE']?>"><?= $row['EMPLOYEE_NAME']?></option>
                                    }
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-default btn-lg" id="reg_conf">登録確認</button>
                <input type="button" class="btn btn-default btn-lg" value="キャンセル" onclick="history.back();">
            </form>

        </div>
    </div>
</div>

<!-- モーダル・ダイアログ -->
<div class="modal fade" id="reg_pop" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
      <form action="reservation-comit.php" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				<h4 class="modal-title">以下で登録しますか？</h4>
			</div>
      <div class="form-horizontal">
  		<div class="modal-body">
        <div class="form-group">
          <label class="col-xs-2 label-control">宿泊日：</label><p id="Day_out" class="col-xs-3"></p>
          <label class="col-xs-2 label-control">泊数：</label><p id="Stayday_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">顧客番号：</label><p id="Code_out" class="col-xs-9"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">顧客名：</label><p id="Name_out" class="col-xs-9"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">人数：</label><p id="Num_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">客室名称：</label><p id="Room_out" class="col-xs-4"></p>
        </div>
        <div class="form-group">
            <label class="col-xs-2 label-control">部屋番号：</label><p id="RoomP_out" class="col-xs-3"></p>
          <label class="col-xs-2 label-control">煙草：</label><p id="Smoke_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">入力者：</label><p id="Inputter_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
            <label class="col-xs-2 label-control">備考：</label><p id="Remarks_out" class="col-xs-3"></p>
        </div>
        </div>
      </div>

			<div class="modal-footer">

  				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>

          <input type="hidden" name="day" id="w_day">
          <input type="hidden" name="stayday" id="w_stayday">
          <input type="hidden" name="code" id="w_code">
          <input type="hidden" name="name" id="w_name">
          <input type="hidden" name="num" id="w_num">
          <input type="hidden" name="room_no" id="w_room_no">
          <input type="hidden" name="inputter" id="w_inputter">
          <input type="hidden" name="remarks" id="w_remarks">
  				<button type="submit" class="btn btn-default">登録</button>
      </div>
			</div>
    </form>
		</div>
	</div>

<!--2枚目-->
<div class="box2">
    <div class="container">
        <div class="form-horizontal">
            <form action="reservation-comit.php" method="post">
                <div class="form-group">
                    <label class="col-xs-2 label-control">顧客名：</label>
                    <div class="col-xs-9">
                        <input type="text" name="f-name" class="form-control" size="21" id="f-name" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">カナ：</label>
                    <div class="col-xs-9">
                        <input type="text" name="f-kana" class="form-control" size="21" id="f-kana" readonly>
                    </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-2 label-control">性別：</label>
                  <div class="col-xs-2">
                      <input type="text" name="f-sex" class="form-control" size="1" id="f-sex" readonly>
                  </div>
                  <label class="col-xs-2 label-control">生年月日：</label>
                  <div class="col-xs-4">
                      <input type="text" name="f-birthday" class="form-control" size="11" id="f-birthday" readonly>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2 label-control">備考：</label>
                    <div class="col-xs-9">
                        <input name="f-remarks" class="form-control" id="f-remarks" readonly>
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>

<div class="box3">
  <table border=1 class="table1">
  <tr><th></th><th>喫煙</th><th>禁煙</th><th>禁煙</th></tr>
  <tr><th>エコノミーシングル</th><td>101号</td><td>102号</td><td>103号</td></tr>
  <tr><th>標準シングル</th><td>105号</td><td>106号</td><td>107号</td></tr>
  <tr><th>デラックスシングル</th><td>109号</td><td>110号</td><td></td></tr>
  <tr><th>エコノミーシングル</th><td>201号</td><td>202号</td><td></td></tr>
  <tr><th>標準ダブル</th><td>204号</td><td>205号</td><td>206号</td></tr>
  <tr><th>キングダブル</th><td>208号</td><td>209号</td><td></td></tr>
  <tr><th>エコノミーツイン</th><td>301号</td><td>302号</td><td></td></tr>
  <tr><th>標準ツイン</th><td>304号</td><td>305号</td><td>306号</td></tr>
  <tr><th>デラックスツイン</th><td>308号</td><td>309号</td><td></td></tr>
  <tr><th>ファミリー和室</th><td>401号</td><td></td><td></td></tr>
 </table>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
