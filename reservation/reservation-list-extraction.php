<?php
require"../dbconnect.php";//DB接続用ファイルの読み込み


//テーブルのレコードを抽出
$stmt = $db->query('select * from tbl_reservation re join tbl_client cl on re.CLIENT_CODE = cl.CLIENT_CODE join tbl_employee em on em.EMPLOYEE_CODE = re.EMPLOYEE_CODE join tbl_room ro on ro.ROOM_CODE = re.ROOM_CODE;');


//fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
$users = $stmt -> fetchAll(PDO::FETCH_ASSOC);

// foreach文で配列の中身を一行ずつ出力
foreach ($users as $row) {
    //<tr><td></td><td></td><td>2017/10/10</td><td>男</td><td>false</td></tr>
    echo
        '<tr>' .
        '<td>' . $row['RESERVATION_CODE'] . '</td>' . //予約番号
        '<td>' . $row['RESERVATION_DAY'] . '</td>' .	//宿泊日
        '<td>' . $row['RESERVATION_STAYDAY'] . '</td>' .	//泊数
        '<td>' . $row['RESERVATION_NUMBER'] . '</td>' .		//人数
        '<td>' . $row['CLIENT_NAME']. '</td>' .				//名前
        '<td>' . $row['CLIENT_KANA']. '</td>' .				//フリガナ
        '<td>' . $row['CLIENT_SEX'] . '</td>' .				//性別
		'<td>' . $row['CLIENT_TEL'] . '</td>' .				//連絡先
        '<td>' . $row['ROOM_NAME'] . '</td>' .				//部屋番号
        '<td>' . $row['ROOM_TYPE'] . '</td>' .				//部屋タイプ
        '<td>' . $row['EMPLOYEE_CODE'] . '</td>' .			//従業員番号
        '<td>' . $row['RECEIP_DAY'] . '</td>' .				//受付日
        '<td>' . $row['RESERVATION_REMARKS'] . '</td>' .			//備考
        "</tr>\n";
}
?>