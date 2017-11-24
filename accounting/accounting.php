
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>会計｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="css/accounting.css">
  <link rel="shortcut icon" href="assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">
</head>

<body>
<?php
include "../header.php"
?>


<div class="box">
  <div class="container">
  <div class="form-horizontal">
      <form action="*" method="post" class="aaa">
            <div class="form-group">
              <label class="col-xs-2 label-control">部屋番号：</label>
                <div class="col-xs-2">
                  <input type="text" name="room-id" class="form-control" size="10">
                </div>
              <label class="col-xs-2 label-control">顧客番号：</label>
              <div class="col-xs-2">
                <input type="text" name="ec-id" class="form-control" size="12">
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-2 label-control">顧客名：</label>
                <div class="col-xs-2">
                  <input type="text" name="c-name" class="form-control" size="10">
                </div>
            </div>
            <div class="form-group">
              <label class="col-xs-2 label-control">CheckIn：</label>
              <div class="col-xs-2">
                <input type="date" name="checkin-day" class="form-control" size="12">
              </div>
              <label class="col-xs-2 label-control">泊数：</label>
              <div class="col-xs-2">
                <input type="text" name="stayday" class="form-control" size="12">
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-2 label-control">CheckOut：</label>
              <div class="col-xs-2">
                <input type="date" name="checkout-day" class="form-control" size="12">
              </div>
            </div>
            <div class="form-group">
              <label class="col-xs-2 label-control">お支払：</label>
              <div class="col-xs-2">
                <input type="text" name="pay" class="form-control" size="12" readonly>
              </div>
              <button type="submit" class="btn btn-default btn-lg">領収書発行</button>
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
