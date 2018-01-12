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
  <link rel="stylesheet" type="text/css" href="../css/emp-registration.css">
  <link rel="shortcut icon" href="../assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">


    <script>
        $( function() {
            $('#reg_conf').click( function () {
                $('#reg_pop').modal();
//
                var getId = $("#id").val();
                $('#Id_out').text(getId);
                var getType = $("#type").val();
                $('#Type_out').text(getType);
                var getName = $("#name").val();
                $('#Name_out').text(getName);
                var getCapa = $("#capa").val();
                $('#Capa_out').text(getCapa);
                var getBed = $("#bed").val();
                $('#Bed_out').text(getBed);
                var getSmoke = $("#smoke").val();
                $('#Smoke_out').text(getSmoke);
                var getPrice = $("#price").val();
                $('#Price_out').text(getPrice);
                var getReno = $("#reno").val();
                $('#Reno_out').text(getReno);
                var getStart = $("#start_reno").val();
                $('#Start_out').text(getStart);
                var getEnd = $("#end_reno").val();
                $('#End_out').text(getEnd);
                var getClean = $("#clean").val();
                $('#Clean_out').text(getClean);
                var getDesc = $("#desc").val();
                $('#Desc_out').text(getDesc);

        var i_id = document.qwe.r_id.value;
        document.getElementById('f_id').value=i_id;
        var i_type = document.qwe.r_type.value;
        document.getElementById('f_type').value=i_type;
        var i_name = document.qwe.r_name.value;
        document.getElementById('f_name').value=i_name;
        var i_capa = document.qwe.r_capa.value;
        document.getElementById('f_capa').value=i_capa;
        var i_bed = document.qwe.r_bed.value;
        document.getElementById('f_bed').value=i_bed;
        var i_smoke = document.qwe.r_smoking.value;
        document.getElementById('f_smoke').value=i_smoke;
        var i_price = document.qwe.r_price.value;
        document.getElementById('f_price').value=i_price;
        var i_reno = document.qwe.r_reno.value;
        document.getElementById('f_reno').value=i_reno;
        var i_start_reno = document.qwe.r_start_reno.value;
        document.getElementById('f_start_reno').value=i_start_reno;
        var i_clean = document.qwe.r_clean.value;
        document.getElementById('f_clean').value=i_clean;
        var i_end_reno = document.qwe.r_end_reno.value;
        document.getElementById('f_end_reno').value=i_end_reno;
        var i_desc = document.qwe.r_desc.value;
        document.getElementById('f_desc').value=i_desc;


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
  $('#id').click( function(){
    var array_room = JSON.parse('<?php echo $val_room;?>');
    var array_count = JSON.parse('<?php echo $count?>');
    var setCode = JSON.parse('<?php echo $id;?>');

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
            <form action="room-comit.php" method="post" name="qwe">
              <div class="form-group">
                 <label class="col-xs-2 label-control">部屋コード：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_id" class="form-control" size="7" id="id">
                 </div>
              </div>

             <div class="form-group">
                 <label class="col-xs-2 label-control">号室名：</label>
                 <div class="col-xs-2">
                     <input type="text" name="r_name" class="form-control" size="3" id="name" required>
                 </div>
                 <label class="col-xs-2 label-control">部屋タイプ：</label>
                 <div class="col-xs-2">
                   <select name="r_type" id="type">
                       <option value="未選択">--客室名称を選択--</option>
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
                   </select>
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
                     <select name="r_smoking" id="smoke">
                         <option value="0">禁煙</option>
                         <option value="1">喫煙</option>
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
                       <option value="0">非改装</option>
                       <option value="1">改装中</option>
                   </select>
               </div>
               <label class="col-xs-2 label-control ">改装開始日：</label>
               <div class="col-xs-2">
                   <input type="date" name="r_start_reno"  value=room_start_reno class="form-control" size="12" tabindex="-1" required id="start_reno">
               </div>
             </div>
             <div class="form-group">

                 <label class="col-xs-2 label-control ">清掃状態：</label>
               <div class="col-xs-2">
                   <select name="r_clean" id="clean" >
                      <option value="0">非清掃</option>
                      <option value="1">清掃中</option>
                   </select>
               </div>
               <label class="col-xs-2 label-control ">改装終了日：</label>
               <div class="col-xs-2">
                   <input type="date" name="r_end_reno"  value=room_end_reno class="form-control" size="12" tabindex="-1" required id="end_reno">
               </div>

             </div>
             <div class="form-group">
               <label class="col-xs-2 label-control">概要 ：</label>
               <div class="col-xs-5">
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
          <form action="room-comit.php" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                <h4 class="modal-title">以下で登録しますか？</h4>
            </div>
            <div class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-xs-2 label-control">部屋コード：</label><p id="Id_out" class="col-xs-3"></p>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-2 label-control">部屋タイプ：</label><p id="Type_out" class="col-xs-4"></p>
                        <label class="col-xs-2 label-control">号室名：</label><p id="Name_out" class="col-xs-3"></p>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-2 label-control">定員数：</label><p id="Capa_out" class="col-xs-4"></p>
                      <label class="col-xs-2 label-control">ベッド数：</label><p id="Bed_out" class="col-xs-3"></p>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-2 label-control">煙草：</label><p id="Smoke_out" class="col-xs-4"></p>
                      <label class="col-xs-2 label-control" >金額：</label><p id="Price_out" class="col-xs-3"></p>
                    </div>
                    <div class="form-group">
                      <label class="col-xs-2 label-control" >清掃状態：</label><p id="Clean_out" class="col-xs-4"></p>
                      <label class="col-xs-2 label-control" >改装状態：</label><p id="Reno_out" class="col-xs-3"></p>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 label-control" >改装開始日：</label><p id="Start_out" class="col-xs-4"></p>
                        <label class="col-xs-2 label-control" >改装終了日：</label><p id="End_out" class="col-xs-3"></p>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 label-control" >概要：</label><p id="Desc_out" class="col-xs-7"></p>
                    </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <input type="hidden" name="h_id" id="f_id">
                <input type="hidden" name="h_type" id="f_type">
                <input type="hidden" name="h_name" id="f_name">
                <input type="hidden" name="h_capa" id="f_capa">
                <input type="hidden" name="h_bed" id="f_bed">
                <input type="hidden" name="h_smoke" id="f_smoke">
                <input type="hidden" name="h_price" id="f_price">
                <input type="hidden" name="h_reno" id="f_reno">
                <input type="hidden" name="h_start_reno" id="f_start_reno">
                <input type="hidden" name="h_clean" id="f_clean">
                <input type="hidden" name="h_end_reno" id="f_end_reno">
                <input type="hidden" name="h_desc" id="f_desc">

                <button type="submit" class="btn btn-default">更新</button>
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
