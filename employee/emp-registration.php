<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>従業員｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="css/emp-registration.css">
  <link rel="shortcut icon" href="assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">


    <script>
        $( function() {
            $('#reg_conf').click( function () {
                $('#reg_pop').modal();

                var getId = $("#emp_id").val();
                $('#Id_out').text(getId);
                var getEntry = $("#entry").val();
                $('#Entry_out').text(getEntry);
                var getName = $("#emp_name").val();
                $('#Name_out').text(getName);
                var getKana = $("#emp_kana").val();
                $('#Kana_out').text(getKana);
                var getSex = $("#sex").val();
                $('#Gender_out').text(getSex);
                var getMgr = $("#mgr").val();
                $('#Mgr_out').text(getMgr);


            });
        });
    </script>
</head>

<body>
<?php
include "../header.php"
?>

<div class="box">
    <div class="container">
        <div class="form-horizontal">
            <form action="*" method="post">
                <div class="form-group">
                    <label class="col-xs-2 label-control">従業員番号：</label>
                    <div class="col-xs-2">
                        <input type="text" name="e_id" class="form-control" size="7" id="emp_id">
                    </div>
                    <label class="col-xs-2 label-control ">登録日：</label>
                    <div class="col-xs-2">
                        <input type="date" name="entry"  value='' class="form-control" size="12" tabindex="-1" required id="entry">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">名前：</label>
                    <div class="col-xs-2">
                        <input type="text" name="e_name" class="form-control" size="21" id="emp_name" required>
                    </div>
                    <label class="col-xs-2 label-control">ﾌﾘｶﾞﾅ ：</label>
                    <div class="col-xs-2">
                        <input type="text" name="e_kana" class="form-control" size="21" id="emp_kana" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-2 label-control">性別：</label>
                    <div class="col-xs-2">
                        <select name="sex" id="sex">
                            <option value="男性">男性</option>
                            <option value="女性">女性</option>
                            <option value="その他">その他</option>
                        </select>
                    </div>
                    <label class="col-xs-2 label-control">責任者：</label>
                    <div class="col-xs-2">
                        <select name="mgr" id="mgr">
                            <option value="true">true</option>
                            <option value="false" selected>false</option>
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
                        <label class="col-xs-2 label-control">顧客番号：</label><p id="Id_out" class="col-xs-3"></p>
                        <label class="col-xs-2 label-control">登録日：</label><p id="Entry_out" class="col-xs-3"></p>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 label-control">名前：</label><p id="Name_out" class="col-xs-9"></p>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 label-control">ﾌﾘｶﾞﾅ：</label><p id="Kana_out" class="col-xs-9"></p><br>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 label-control">性別：</label><p id="Gender_out" class="col-xs-3"></p>
                        <label class="col-xs-2 label-control">責任者：</label><p id="Mgr_out" class="col-xs-3"></p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <button type="submit" class="btn btn-default">ボタン</button>
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
