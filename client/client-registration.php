<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>顧客｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="css/client-registration.css">
  <link rel="shortcut icon" href="assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">

<script>
  $( function() {
  	$('#reg_conf').click( function () {
  		$('#reg_pop').modal();
      var getId = $("#c_id").val();
      $('#Id_out').text(getId);
      var getEntry = $("#entry").val();
      $('#Entry_out').text(getEntry);
      var getName = $("#client_name").val();
      $('#Name_out').text(getName);
      var getKana = $("#client_kana").val();
      $('#Kana_out').text(getKana);
      var getBirthday = $("#birthday").val();
      $('#Birthday_out').text(getBirthday);
      var getSex = $("#sex").val();
      $('#Sex_out').text(getSex);
      var getTel = $("#tel").val();
      $('#Tel_out').text(getTel);
      var getPhone = $("#phone").val();
      $('#Phone_out').text(getPhone);
      var getZip = $("#zip11").val();
      $('#Zip_out').text(getZip);
      var getAdd = $("#add").val();
      $('#Add_out').text(getAdd);
      var getRemarks = $("#remarks").val();
      $('#Remarks_out').text(getRemarks);

  	});
  });
</script>
</head>

<?php
include "../header.php"
?>

<div class="box">
<div class="container">
<div class="form-horizontal">
    <form action="*" method="post" id="form1">
          <div class="form-group">
            <label class="col-xs-2 label-control">顧客番号：</label>
              <div class="col-xs-2">
                <input type="text" name="c_id" class="form-control" size="10" id="c_id">
              </div>
            <label class="col-xs-2 label-control">入会日：</label>
            <div class="col-xs-2">
              <input type="date" name="n_entry" class="form-control" size="12" tabindex="-1" id="entry">
            </div>
          </div>

        <div class="form-group">
          <label class="col-xs-2 label-control">顧客名：</label>
          <div class="col-xs-2">
            <input type="text" name="c_name" class="form-control" size="21" id="client_name">
          </div>
          <label class="col-xs-2 label-control">ﾌﾘｶﾞﾅ ：</label>
          <div class="col-xs-2">
            <input type="text" name="c-kana" class="form-control" size="21" id="client_kana">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-2 label-control">生年月日：</label>
          <div class="col-xs-2">
            <input type="text" name="c_birthday" class="form-control" size="12" id="birthday">
          </div>
          <label class="col-xs-2 label-control">性別：</label>
          <div class="col-xs-2">
            <select name="sex" id="sex">
              <option value="男性">男性</option>
              <option value="女性">女性</option>
              <option value="その他">その他</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-2 label-control">電話番号：</label>
          <div class="col-xs-2">
            <input type="tel" placeholder="ハイフンなし" maxlength="10" name="c_tel" class="form-control" size="13" id="tel">
          </div>
          <label class="col-xs-2 label-control">携帯番号：</label>
          <div class="col-xs-2">
            <input type="tel" placeholder="ハイフンなし" maxlength="11" name="c_phone" class="form-control" size="13" id="phone">
          </div>
        </div>

        <div class="form-group">
            <!-- ▼郵便番号入力フィールド(7桁) -->
          <label class="col-xs-2 label-control">郵便番号：</label>
          <div class="col-xs-2">
            <input type="tel" placeholder="ハイフンなし" name="zip11" class="form-control" size="10" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11'); " id="zip11">
          </div>
        </div>

        <div class="form-group">
                <!-- ▼住所入力フィールド(都道府県+以降の住所) -->
          <label class="col-xs-2 label-control">住所：</label>
          <div class="col-xs-5">
            <input type="text" name="addr11" class="form-control" size="60" id="add">
          </div>
        </div>

        <div class="form-group">
          <label class="col-xs-2 label-control">備考：</label>
          <div class="col-xs-5">
            <textarea rows="2" cols="50" name="c_remarks" class="form-control" id="remarks"></textarea>
          </div>
        </div>
        <button type="button" class="btn btn-default btn-lg" id="reg_conf">登録確認</button>
        <input type="button" class="btn btn-default btn-lg" onclick="history.back();" value="キャンセル">
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
          <label class="col-xs-2 label-control">顧客番号：</label><p id="Id_out" class="col-xs-3"></p>
          <label class="col-xs-2 label-control">入会日：</label><p id="Entry_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">名前：</label><p id="Name_out" class="col-xs-9"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">ﾌﾘｶﾞﾅ：</label><p id="Kana_out" class="col-xs-9"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">誕生日：</label><p id="Birthday_out" class="col-xs-3"></p>
          <label class="col-xs-2 label-control">性別：</label><p id="Sex_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">電話番号：</label><p id="Tel_out" class="col-xs-3"></p>
          <label class="col-xs-2 label-control">携帯番号：</label><p id="Phone_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">郵便番号：</label><p id="Zip_out" class="col-xs-3"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">住所：</label><p id="Add_out" class="col-xs-9"></p>
        </div>
        <div class="form-group">
          <label class="col-xs-2 label-control">備考：</label><p id="Remarks_out" class="col-xs-9"></p>
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


<br>

<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
