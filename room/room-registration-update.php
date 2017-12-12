<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json_parse.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2/20160511/json_parse_state.js"></script>

<?php require"../dbconnect.php" ?>
<?php
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);

          $u_stmt = $db->query("select * from tbl_room where ROOM_CODE=".$id."");
          $u_room_regi = $u_stmt->fetchAll(PDO::FETCH_ASSOC);
          $val_room = json_encode($u_room_regi);
          $count = json_encode(count($u_room_regi));
        }
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>部屋登録変更｜ホテル宿泊管理システム</title>
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
//
                var getId = $("#room_code").val();
                $('#Id_out').text(getId);
                var getName = $("#room_name").val();
                $('#Name_out').text(getName);
                var getEntry = $("#entry").val();
                $('#Entry_out').text(getEntry);

                var getKana = $("#emp_kana").val();
                $('#Kana_out').text(getKana);
                var getSex = $("#sex").val();
                $('#Gender_out').text(getSex);
                var getMgr = $("#mgr").val();
                $('#Mgr_out').text(getMgr);
                var getPass = $("#pass").val();
                $('#Pass_out').text(getPass);

                var dummy = $("#pass").val();
                var strdum = "*".repeat(dummy.length);
                $('#Dummy_pass').text(strdum);

            });
        });
    </script>

    <script type="text/javascript">
    $(function () {
      $('#reg_conf').click( function() {
        var i_id = document.qwe.e_id.value;
        console.log(i_id);
        document.getElementById('f_id').value=i_id;
        var i_entry = document.qwe.entry.value;
        document.getElementById('f_entry').value=i_entry;
        var i_name = document.qwe.e_name.value;
        document.getElementById('f_name').value=i_name;
        var i_kana = document.qwe.e_kana.value;
        document.getElementById('f_kana').value=i_kana;
        var i_sex = document.qwe.sex.value;
        document.getElementById('f_sex').value=i_sex;
        var i_mgr = document.qwe.mgr.value;
        document.getElementById('f_mgr').value=i_mgr;
        var i_pass = document.qwe.e_pass.value;
        document.getElementById('f_pass').value=i_pass;
      });
    });

    </script>
</head>

<body>
<?php
include "../header.php"
?>

<script>
$( function() {
  $('#room_code').change( function() {
    var array_room = JSON.parse('<?php echo $val_room;?>');
    var array_count = JSON.parse('<?php echo $count?>');

    var setCode = $('#room_code').val();
    var i;

    for (i=0; array_count > i;i++) {

      if(setCode == array_room[i]['ROOM_CODE']) {

        room_id = array_room[i]['ROOM_CODE'];
        room_type = array_room[i]['ROOM_TYPE'];
        room_name= array_room[i]['ROOM_NAME'];
        room_capa = array_room[i]['ROOM_CAPACITY'];
        room_bed = array_room[i]['ROOM_BED'];
        room_smoking = array_room[i]['ROOM_SMOKING'];
        room_price = array_room[i]['ROOM_PRICE'];
        room_desc = array_room[i]['ROOM_DESCRIPTION'];
        room_reno = array_room[i]['ROOM_RENOVATION'];
        room_start_reno = array_room[i]['START_RENOVATION'];
        room_end_reno = array_room[i]['END_RENOVATION'];
        room_clean = array_room[i]['ROOM_CLEAN'];


        $('#id').val(room_id);
        $('#type').val(room_type);
        $('#name').val(room_name);
        $('#capa').val(room_capa);
        $('#bed').val(room_bed);
        $('#smoke').val(room_smoking);
        $('#price').val(room_price);
        $('#desc').val(room_desc);
        $('#reno').val(room_reno);
        $('#start_reno').val(room_start_reno);
        $('#end_reno').val(room_end_reno);
        $('#clean').val(room_clean);

        break;
      }
    }

  });
});
</script>


<div class="box">
    <div class="container">
        <div class="form-horizontal">
            <form action="test.php" method="post" name="qwe">
              <div class="form-group">
                 <label class="col-xs-2 label-control">部屋コード：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_code" class="form-control" size="7" id="id">
                 </div>
                 <label class="col-xs-2 label-control">部屋タイプ：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_type" class="form-control" size="20" id="type">
                 </div>
             </div>

             <div class="form-group">
                 <label class="col-xs-2 label-control">号室名：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_name" class="form-control" size="3" id="name" required>
                 </div>
             </div>

             <div class="form-group">
                 <label class="col-xs-2 label-control">定員数：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_capa" class="form-control" size="2" id="capa" required>
                 </div>
                 <label class="col-xs-2 label-control">ベット数：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_bed" class="form-control" size="2" id="bed" required>
                 </div>
             </div>

             <div class="form-group">
                 <label class="col-xs-2 label-control">煙草：</label>
                 <div class="col-xs-2">
                     <select name="r_smoking" id="smoke" >
                         <option value="true">喫煙</option>
                         <option value="false" selected>禁煙</option>
                     </select>
                 </div>
                 <label class="col-xs-2 label-control">金額 ：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_price" class="form-control" size="5" id="price" required>
                 </div>
             </div>
             <div class="form-group">
             <label class="col-xs-2 label-control ">改装状態：</label>
               <div class="col-xs-2">
                   <select name="r_reno" id="reno" >
                       <option value="true">改装中</option>
                       <option value="false" selected>非改装</option>
                   </select>
               </div>
               <label class="col-xs-2 label-control ">改装開始日：</label>
               <div class="col-xs-2">
                   <input type="date" name="r_start_reno"  value='' class="form-control" size="12" tabindex="-1" required id="start_reno">
               </div>
             </div>
             <div class="form-group">

                 <label class="col-xs-2 label-control ">清掃状態：</label>
               <div class="col-xs-2">
                   <select name="r_clean" id="clean" >
                       <option value="true">清掃中</option>
                       <option value="false" selected>非清掃</option>
                   </select>
               </div>
               <label class="col-xs-2 label-control ">改装終了日：</label>
               <div class="col-xs-2">
                   <input type="date" name="r_end_reno"  value='' class="form-control" size="12" tabindex="-1" required id="end_reno">
               </div>

             </div>
             <div class="form-group">
               <label class="col-xs-2 label-control">概要 ：</label>
               <div class="col-xs-2">
                   <input type="text" name="r_desc" class="form-control" size="21" id="desc" required>
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
          <form action="test.php" method="post">
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
                    <div class="form-group">
                        <label class="col-xs-2 label-control" >ﾊﾟｽﾜｰﾄﾞ：</label>
                        <p id="Dummy_pass" class="col-xs-3"></p>
                        <p hidden id="Pass_out" class="col-xs-3"></p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <input type="hidden" name="id" id="f_id">
                <input type="hidden" name="entry" id="f_entry">
                <input type="hidden" name="name" id="f_name">
                <input type="hidden" name="kana" id="f_kana">
                <input type="hidden" name="sex" id="f_sex">
                <input type="hidden" name="mgr" id="f_mgr">
                <input type="hidden" name="pass" id="f_pass">
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
