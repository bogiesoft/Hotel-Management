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
      var getId = $("#client_id").val();
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

        var getEmp = $("#emp_id").val();
        $('#Emp_out').text(getEmp);

  	});
  });
</script>
    <script type="text/javascript">
    $(function () {
      $('#reg_conf').click( function() {
        var i_id = document.zxc.c_id.value;
        console.log(i_id);
        document.getElementById('m_id').value=i_id;

                var i_entry = document.zxc.n_entry.value;
                document.getElementById('m_entry').value=i_entry;

                var i_name = document.zxc.c_name.value;
                document.getElementById('m_name').value=i_name;

                var i_kana = document.zxc.c_kana.value;
                document.getElementById('m_kana').value=i_kana;

                var i_birthday = document.zxc.c_birthday.value;
                document.getElementById('m_birthday').value=i_birthday;

                var i_sex = document.zxc.sex.value;
                document.getElementById('m_sex').value=i_sex;

                var i_tel = document.zxc.c_tel.value;
                document.getElementById('m_tel').value=i_tel;

                var i_phone = document.zxc.c_phone.value;
                document.getElementById('m_phone').value=i_phone;

                var i_zip = document.zxc.zip11.value;
                document.getElementById('m_zip').value=i_zip;

                var i_add = document.zxc.addr11.value;
                document.getElementById('m_add').value=i_add;

                var i_remark = document.zxc.c_remarks.value;
                document.getElementById('m_remark').value=i_remark;

                var i_emp = document.zxc.e_id.value;
                document.getElementById('m_emp').value=i_emp;

            });
        });

    </script>
</head>

<?php
include "../header.php"
?>
<?php
include "../dbconnect.php"
?>

<div class="box">
<div class="container">
<div class="form-horizontal">
    <form action="client-form.php" method="post" name="zxc">
          <div class="form-group">
            <label class="col-xs-2 label-control">顧客番号：</label>
              <div class="col-xs-2">
                <input type="text" name="c_id" class="form-control" size="10" id="client_id">
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
            <input type="text" name="c_kana" class="form-control" size="21" id="client_kana">
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
           <form action="client-form.php" method="post">
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
                          <label class="col-xs-2 label-control">従業員番号：</label><p id="Emp_out" class="col-xs-3"></p>
                        </div>
                        <div class="form-group">
                          <label class="col-xs-2 label-control">住所：</label><p id="Add_out" class="col-xs-9"></p>
                        </div>
                        <div class="form-group">
                          <label class="col-xs-2 label-control">備考：</label><p id="Remarks_out" class="col-xs-9"></p>
                        </div>
                     </div>
              </div>

      </div>
			<div class="modal-footer">
  				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <input type="hidden" name="id" id="m_id">
                <input type="hidden" name="entry" id="m_entry">
                <input type="hidden" name="name" id="m_name">
                <input type="hidden" name="kana" id="m_kana">
                <input type="hidden" name="birth" id="m_birthday">
                <input type="hidden" name="sex" id="m_sex">
                <input type="hidden" name="tel" id="m_tel">
                <input type="hidden" name="mobile" id="m_phone">
                <input type="hidden" name="zip" id="m_zip">
                <input type="hidden" name="add" id="m_add">
                <input type="hidden" name="remark" id="m_remark">
                <input type="hidden" name="emp" id="m_emp">
                <button type="submit" class="btn btn-default">登録</button>
			</div>
    </form>
		</div>
	</div>
</div>


<br>
<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div></div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
