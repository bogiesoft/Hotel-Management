<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>



<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>新規顧客登録｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="../css/client-registration.css">
  <link rel="shortcut icon" href="../assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">
<script>
$( function() {
  $('#client_kana').click( function() {
    var setId = Math.round( Math.random()*1000000);
    $('#client_id').val(setId);
    console.log(setId);
  });
});
</script>
<script>
  $( function() {
  	$('#reg_conf').click( function () {
  		$('#reg_pop').modal();
      var getId = $('#client_id').val();
      $('#Id_out').text(getId);
      var getKana = $("#client_kana").val();
      $('#Kana_out').text(getKana);
      var getTel = $("#tel").val();
      $('#Tel_out').text(getTel);
      var getPhone = $("#phone").val();
      $('#Phone_out').text(getPhone);
      var getEmp = $("#emp_id").val();
      $('#Emp_out').text(getEmp);
  	});
  });
</script>
    <script type="text/javascript">
    $(function () {
      $('#reg_conf').click( function() {
        var i_id = document.zxc.c_id.value;
        document.getElementById('m_id').value=i_id;

        var i_kana = document.zxc.c_kana.value;
        document.getElementById('m_kana').value=i_kana;

        var i_tel = document.zxc.c_tel.value;
        document.getElementById('m_tel').value=i_tel;

        var i_phone = document.zxc.c_phone.value;
        document.getElementById('m_phone').value=i_phone;

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
    <form action="newclient-form.php" method="post" name="zxc">
        <div class="form-group">
          <label class="col-xs-2 label-control">顧客番号：</label>
            <div class="col-xs-2">
              <input type="text" name="c_id" class="form-control" size="10" id="client_id" readonly>
            </div>
          <label class="col-xs-2 label-control">カナ ：</label>
          <div class="col-xs-2">
            <input type="text" name="c_kana" class="form-control" size="21" id="client_kana">
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
          <label class="col-xs-2 label-control">従業員名：</label>
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
           <form action="newclient-form.php" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
				<h4 class="modal-title">以下で登録しますか？</h4>
			</div>
              <div class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group">
                          <label class="col-xs-2 label-control">顧客番号：</label><p id="Id_out" class="col-xs-3"></p>
                        </div>
                        <div class="form-group">
                          <label class="col-xs-2 label-control">ﾌﾘｶﾞﾅ：</label><p id="Kana_out" class="col-xs-9"></p>
                        </div>
                        <div class="form-group">
                          <label class="col-xs-2 label-control">電話番号：</label><p id="Tel_out" class="col-xs-3"></p>
                          <label class="col-xs-2 label-control">携帯番号：</label><p id="Phone_out" class="col-xs-3"></p>
                        </div>
                        <div class="form-group">
                          <label class="col-xs-2 label-control">従業員番号：</label><p id="Emp_out" class="col-xs-3"></p>
                        </div>
                     </div>
              </div>

      </div>
			<div class="modal-footer">
  				<button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <input type="hidden" name="id" id="m_id">
                <input type="hidden" name="kana" id="m_kana">
                <input type="hidden" name="tel" id="m_tel">
                <input type="hidden" name="mobile" id="m_phone">
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
