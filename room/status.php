<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
$(function(){
    // 「.modal-open」をクリック
    $('.modal-open').click(function(){
        // オーバーレイ用の要素を追加
        $('body').append('<div class="modal-overlay"></div>');
        // オーバーレイをフェードイン
        $('.modal-overlay').fadeIn('slow');

        // モーダルコンテンツのIDを取得
        var modal = '#' + $(this).attr('data-target');
        // モーダルコンテンツの表示位置を設定
        modalResize();
         // モーダルコンテンツフェードイン
        $(modal).fadeIn('slow');

        // 「.modal-overlay」あるいは「.modal-close」をクリック
        $('.modal-overlay, .modal-close').off().click(function(){
            // モーダルコンテンツとオーバーレイをフェードアウト
            $(modal).fadeOut('slow');
            $('.modal-overlay').fadeOut('slow',function(){
                // オーバーレイを削除
                $('.modal-overlay').remove();
            });
        });

        // リサイズしたら表示位置を再取得
        $(window).on('resize', function(){
            modalResize();
        });

        // モーダルコンテンツの表示位置を設定する関数
        function modalResize(){
            // ウィンドウの横幅、高さを取得
            var w = $(window).width();
            var h = $(window).height();

            // モーダルコンテンツの表示位置を取得
            var x = (w - $(modal).outerWidth(true)) / 2;
            var y = (h - $(modal).outerHeight(true)) / 2;

            // モーダルコンテンツの表示位置を設定
            $(modal).css({'left': x + 'px','top': y + 'px'});
        }

    });
});
</script>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="content-type" charset="utf-8">
  <title>部屋状況｜ホテル宿泊管理システム</title>
<?php
include "../header_css.php"
?>
  <link rel="stylesheet" type="text/css" href="../css/status.css">
  <link rel="shortcut icon" href="assets/ico/img.png">
  <meta name=viewport content="width=device-width, initial-scale=1">
</head>

<body>
<?php
include "../header.php"
?>

<div>
  <div class="box3">
    <table border=1 class="table1">
      <?php
          require"../dbconnect.php";//DB接続用ファイルの読み込み
          //テーブルのレコードを抽出
          $reservation_client_stmt = $db->query('SELECT * FROM tbl_reservation LEFT JOIN tbl_client ON tbl_reservation.CLIENT_CODE = tbl_client.CLIENT_CODE;');
          //fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
          $reservation_client = $reservation_client_stmt -> fetchAll(PDO::FETCH_ASSOC);

          $room_client_stmt = $db->query('SELECT * FROM tbl_reservation LEFT JOIN tbl_room ON tbl_reservation.ROOM_CODE = tbl_room.ROOM_CODE;');
          $room_client = $room_client_stmt -> fetchAll(PDO::FETCH_ASSOC);

          $room_stmt = $db->query('select * from tbl_room');
          $rooms = $room_stmt -> fetchAll(PDO::FETCH_ASSOC);

          $room_client_reservation_stmt = $db->query('SELECT * FROM tbl_reservation LEFT JOIN tbl_client ON tbl_reservation.CLIENT_CODE = tbl_client.CLIENT_CODE LEFT JOIN tbl_room ON tbl_reservation.ROOM_CODE = tbl_room.ROOM_CODE;');
          $room_client_reservation = $room_client_reservation_stmt -> fetchAll(PDO::FETCH_ASSOC);


          $count = 0;
          $today = date("Y-m-d");
          $color = "";
          $day3 = date("Y-m-d",strtotime('3 day'));

          foreach ($rooms as $r_row)
          {
            $color = "";
              if($count == 0)
              {
                echo '<tr>'.
                        '<td>'.$r_row['ROOM_TYPE'].'</td>'.
                        '<td class="room'.$r_row['ROOM_CODE'].'"><a data-target="'.$r_row['ROOM_CODE'].'" class="modal-open">'.$r_row['ROOM_NAME'].
                        '号室<br>';
                        if($r_row['ROOM_RENOVATION'] == 0){

                        foreach($room_client_reservation as $r_c_row)
                        {
                          if($r_row['ROOM_CODE'] == $r_c_row['ROOM_CODE'])
                          {
                          $time_stamp_stayday = (string)($r_c_row['RESERVATION_STAYDAY']);
                          $time_stamp_stayday .= "day";
                          $time_stamp_day = strtotime($r_c_row['RESERVATION_DAY']);
                          if(date($today) > date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
                              ;//終了
                          elseif(date($today) == date($r_c_row['RESERVATION_DAY'])){
                            echo $r_c_row['CLIENT_NAME'];
                            $color = "#d86a6a";
                            break; }//本日から宿泊
                          elseif(date($today) < date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
                            if(date($today) < date($r_c_row['RESERVATION_DAY'])){
                              if(date($day3) >= date($r_c_row['RESERVATION_DAY']))
                              $color = "skyblue";else;} //予約;
                            else{
                              echo $r_c_row['CLIENT_NAME'];
                              $color = "#d86a6a";
                              break;} //宿泊中
                          else{
                            echo $r_c_row['CLIENT_NAME'];
                            $color = "#d86a6a";
                            break; }//宿泊中

                          }
                        }}
                        else {
                          echo '改装中';
                          $color = "grey";
                        }
                echo    '<style>.room'.$r_row['ROOM_CODE'].'{background-color:'.$color.'}</style>';
                echo    '</td></a>';
              }
              else {
                if($r_row['ROOM_TYPE'] === $roomif){
                  echo '<td class="room'.$r_row['ROOM_CODE'].'"><a data-target="'.$r_row['ROOM_CODE'].'" class="modal-open">'.$r_row['ROOM_NAME'].'号室<br>';
                  if($r_row['ROOM_RENOVATION'] == 0){
                  foreach($room_client_reservation as $r_c_row)
                  {
                    if($r_row['ROOM_CODE'] == $r_c_row['ROOM_CODE'])
                    {
                    $time_stamp_stayday = (string)($r_c_row['RESERVATION_STAYDAY']);
                    $time_stamp_stayday .= "day";
                    $time_stamp_day = strtotime($r_c_row['RESERVATION_DAY']);
                    if(date($today) > date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
                        ;//終了
                    elseif(date($today) == date($r_c_row['RESERVATION_DAY'])){
                      echo $r_c_row['CLIENT_NAME'];
                      $color = "#d86a6a";
                      break; }//本日から宿泊
                    elseif(date($today) < date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
                      if(date($today) < date($r_c_row['RESERVATION_DAY'])){
                        if(date($day3) >= date($r_c_row['RESERVATION_DAY']))
                        $color = "skyblue";else;} //予約;
                      else{
                        echo $r_c_row['CLIENT_NAME'];
                        $color = "#d86a6a";
                        break;} //宿泊中
                    else{
                      echo $r_c_row['CLIENT_NAME'];
                      $color = "#d86a6a";
                      break; }//宿泊中

                    }
                  }
                }
                else{
                  echo "改装中";
                  $color = "grey";
                }
                  echo    '';
                  echo    '<style>
                          .room'.$r_row['ROOM_CODE'].'{background-color:'.$color.'}
                          </style></td></a>';
                }
                else{
                  echo '</tr><tr><td>'.$r_row['ROOM_TYPE'].'</td><td class="room'.$r_row['ROOM_CODE'].'"><a data-target="'.$r_row['ROOM_CODE'].'" class="modal-open">'.$r_row['ROOM_NAME'].'号室<br>';
                  if($r_row['ROOM_RENOVATION'] == 0){
                  foreach($room_client_reservation as $r_c_row)
                  {
                    if($r_row['ROOM_CODE'] == $r_c_row['ROOM_CODE'])
                    {
                    $time_stamp_stayday = (string)($r_c_row['RESERVATION_STAYDAY']);
                    $time_stamp_stayday .= "day";
                    $time_stamp_day = strtotime($r_c_row['RESERVATION_DAY']);
                    if(date($today) > date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
                        ;//終了
                    elseif(date($today) == date($r_c_row['RESERVATION_DAY'])){
                      echo $r_c_row['CLIENT_NAME'];
                      $color = "#d86a6a";
                      break; }//本日から宿泊
                    elseif(date($today) < date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
                      if(date($today) < date($r_c_row['RESERVATION_DAY'])){
                        if(date($day3) >= date($r_c_row['RESERVATION_DAY']))
                        $color = "skyblue";else;} //予約;
                      else{
                        echo $r_c_row['CLIENT_NAME'];
                        $color = "#d86a6a";
                        break;} //宿泊中
                    else{
                      echo $r_c_row['CLIENT_NAME'];
                      $color = "##d86a6a";
                      break; }//宿泊中

                    }
                  }
                }
                else{
                  echo '改装中';
                  $color ="grey";
                }
                  echo    '<style>
                          .room'.$r_row['ROOM_CODE'].'{background-color:'.$color.'}
                          </style></td></a>';

                }}
              $roomif = $r_row['ROOM_TYPE'];
              $count++;

          }
      ?>
   </table>
  </div>
</div>

<?php

    foreach ($rooms as $row) {
      echo '<div id="'.$row['ROOM_CODE'].'" class="modal-content">';
      echo '<ul>';
      echo    '<li>部屋情報</li>';
      echo      '<ul>';
      echo     '<li>部屋番号：'.$row['ROOM_NAME'].'</li>';
      echo     '<li>部屋タイプ：'.$row['ROOM_TYPE'].'</li>';
      echo     '<li>タバコ：';
            if($row['ROOM_SMOKING'] === '0')
              echo '喫煙</li>';
            else
              echo '禁煙</li>';
      echo     '<li>最大人数：  '.$row['ROOM_CAPACITY'].'人</li>';
      echo     '<li>ベッド数：'.$row['ROOM_BED'].'</li>';
      echo     '<li>料金：'.$row['ROOM_PRICE'].'円</li>';
      echo '</ul>';

      echo '<li>宿泊者情報</li>';
      echo '<ul><li>';
      foreach($room_client_reservation as $r_c_row)
      {
        if($row['ROOM_CODE'] == $r_c_row['ROOM_CODE'])
        {
        $time_stamp_stayday = (string)($r_c_row['RESERVATION_STAYDAY']);
        $time_stamp_stayday .= "day";
        $time_stamp_day = strtotime($r_c_row['RESERVATION_DAY']);
        if(date($today) > date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
            ;//終了
        elseif(date($today) == date($r_c_row['RESERVATION_DAY'])){
          echo $r_c_row['CLIENT_NAME'].' ： '.date("Y年m月d日",strtotime((string)$r_c_row['RESERVATION_DAY'])).' ~ '.date("Y年m月d日",strtotime((string)$time_stamp_stayday,$time_stamp_day)).'</li>';
          echo '<li>宿泊人数：'.$r_c_row['RESERVATION_NUMBER'].'人</li>';
          break; }//本日から宿泊
        elseif(date($today) < date("Y-m-d",strtotime((string)$time_stamp_stayday,$time_stamp_day)))
          if(date($today) < date($r_c_row['RESERVATION_DAY']))
            ; //予約;
          else{
            echo $r_c_row['CLIENT_NAME'].' ： '.date("Y年m月d日",strtotime((string)$r_c_row['RESERVATION_DAY'])).' ~ '.date("Y年m月d日",strtotime((string)$time_stamp_stayday,$time_stamp_day)).'</li>';
            echo '<li>宿泊人数：'.$r_c_row['RESERVATION_NUMBER'].'人</li>';
            break;} //宿泊中
        else{
          echo $r_c_row['CLIENT_NAME'].' ： '.date("Y年m月d日",strtotime((string)$r_c_row['RESERVATION_DAY'])).' ~ '.date("Y年m月d日",strtotime((string)$time_stamp_stayday,$time_stamp_day)).'</li>';
          echo '<li>宿泊人数：'.$r_c_row['RESERVATION_NUMBER'].'人</li>';
          break; }//宿泊中
        }
      }



          echo '</ul><li>予約情報</li><ul>';


      foreach($room_client_reservation as $r_c_row)
      {
        if($row['ROOM_CODE'] == $r_c_row['ROOM_CODE'])
        {
        $time_stamp_stayday = (string)($r_c_row['RESERVATION_STAYDAY']);
        $time_stamp_stayday .= "day";
        $time_stamp_day = strtotime($r_c_row['RESERVATION_DAY']);
    if(date($today) < date($r_c_row['RESERVATION_DAY'])){
      echo '<li>'.$r_c_row['CLIENT_NAME'].' ： '.date("Y年m月d日",strtotime((string)$r_c_row['RESERVATION_DAY'])).' ~ '.date("Y年m月d日",strtotime((string)$time_stamp_stayday,$time_stamp_day)).'</li>'; //予約;
      }
    else ;
      }
    }
      echo '</ul></ul>';
      echo '</ul>';
      echo '<p><a class="modal-close">閉じる</a></p>'.
            '</div>';
    }

 ?>
<br>
<div class="copyright">
<div align="center"><p>COPYRIGHT &copy; ビジネスホテルOIC ALL RIGHTS RESERVED.</p>
</div>

</body>
</html>
