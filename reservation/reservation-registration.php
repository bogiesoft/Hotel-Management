<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!DOCTYPE html>

<html lang="ja">
<head>
<title>予約登録画面</title>
<?php
include "../header_css.php"
?>
<link rel="stylesheet" type="text/css" href="css/reservation-registration.css">
<link rel="shortcut icon" href="assets/ico/img.png">
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

    var getSmoke = $("input[name='smoke']:checked").val();
    $('#Smoke_out').text(getSmoke);

    var getInputter = $("#inputter").val();
    $('#Inputter_out').text(getInputter);

      var getRoomP = $("#room_p").val();
      $('#RoomP_out').text(getRoomP);
  });
});
</script>


</head>
<body>

<?php
include "../header.php"
?>

<div class="boxA">
<div class="box1">
    <div class="container">
        <div class="form-horizontal">
            <form action="*" method="post" class="rsv">
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

                <div class="form-group">
                  <label class="col-xs-2 label-control">顧客名：</label>
                  <div class="col-xs-9">
                      <input type="text" name="r_name" class="form-control" size="21" id="name">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">人数：</label>
                    <div class="col-xs-2">
                        <input type="text" name="num" class="form-control" size="2" id="num">
                    </div>
                    <label class="col-xs-2 label-control">客室名称：</label>
                    <div class="col-xs-2">
                        <select name="room" id="room">
                            <option value="未選択">--客室名称を選択--</option>
                            <option value="エコノミーシングル">エコノミーシングル</option>
                            <option value="標準シングル">標準シングル</option>
                            <option value="デラックスシングル">デラックスシングル</option>
                            <option value="エコノミーシングル">エコノミーダブル</option>
                            <option value="標準ダブル">標準ダブル</option>
                            <option value="キングダブル">キングダブル</option>
                            <option value="エコノミーツイン">エコノミーツイン</option>
                            <option value="標準ツイン">標準ツイン</option>
                            <option value="デラックスツイン">デラックスツイン</option>
                            <option value="ファミリー和室">ファミリー和室</option>
                            <option value="シングル">シングル</option>
                            <option value="ダブル">ダブル</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">部屋番号：</label>
                    <div class="col-xs-2">
                        <input type="text" name="room_no" class="form-control" size="5" id="room_p">
                    </div>
                    <label class="col-xs-2 label-control">煙草：</label>
                    <div class="col-xs-4" id="smoke">
                        <input type="radio" name="smoke" value="禁煙"><label for="no_smoke">禁煙</label>
                        <input type="radio" name="smoke" value="喫煙"><label for="ok_smoke">喫煙</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">入力者：</label>
                    <div class="col-xs-2">
                        <select name="inputter" id="inputter">
                            <option value="未選択">--入力者を選択--</option>
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
      <form action="*" method="post">
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
      </div>
      </div>
			<div class="modal-footer">

  				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
  				<button type="submit" class="btn btn-default">登録</button>
			</div>
    </form>
		</div>
	</div>
</div>

<!--2枚目-->
<div class="box2">
    <div class="container">
        <div class="form-horizontal">
            <form action="*" method="post">
                <div class="form-group">
                    <label class="col-xs-2 label-control">顧客名：</label>
                    <div class="col-xs-9">
                        <input type="text" name="f-name" class="form-control" size="21">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">カナ：</label>
                    <div class="col-xs-9">
                        <input type="text" name="f-kana" class="form-control" size="21">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-xs-2 label-control">性別：</label>
                    <div class="col-xs-2">
                        <input type="text" name="f-sex" class="form-control" size="1">
                    </div>
                    <label class="col-xs-2 label-control">生年月日：</label>
                    <div class="col-xs-4">
                        <input type="text" name="f-birthday" class="form-control" size="11">
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-xs-2 label-control">年齢：</label>
                    <div class="col-xs-4">
                        <?php echo floor ((date('Ymd') - 19411129)/10000);?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">備考：</label>
                    <div class="col-xs-9">
                        <textarea rows="2" cols="50" name="c-remarks" class="form-control"></textarea>
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
  <tr><th>標準シングル</th><td>201号</td><td>202号</td><td>203号</td></tr>
  <tr><th>デラックスシングル</th><td>301号</td><td>302号</td><td></td></tr>
  <tr><th>エコノミーシングル</th><td>401号</td><td>402号</td><td></td></tr>
  <tr><th>標準ダブル</th><td>501号</td><td>502号</td><td>503号</td></tr>
  <tr><th>キングダブル</th><td>601号</td><td>602号</td><td></td></tr>
  <tr><th>エコノミーツイン</th><td>701号</td><td>702号</td><td></td></tr>
  <tr><th>標準ツイン</th><td>801号</td><td>802号</td><td>803号</td></tr>
  <tr><th>デラックスツイン</th><td>901号</td><td>902号</td><td></td></tr>
  <tr><th>ファミリー和室</th><td>1001号</td><td></td><td></td></tr>
 </table>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>
