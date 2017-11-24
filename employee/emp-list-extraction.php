<?php
require"../dbconnect.php";//DB接続用ファイルの読み込み


//テーブルのレコードを抽出
$stmt = $db->query('select * from tbl_employee');
//fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
$users = $stmt -> fetchAll(PDO::FETCH_ASSOC);

// foreach文で配列の中身を一行ずつ出力
foreach ($users as $row) {
   //<tr><td></td><td></td><td>2017/10/10</td><td>男</td><td>false</td></tr>
   echo '<tr>'.
       '<td>'.$row['EMPLOYEE_NAME'].'</td>'.
       '<td>'.$row['EMPLOYEE_KANA'].'</td>'.
       '<td>'.$row['EMPLOYEE_ENTRY'].'</td>'.
       '<td>'.$row['EMPLOYEE_SEX'].'</td>';
       if($row['EMPLOYEE_ADMIN'] === '1'){
           echo '<td>'."責任者".'</td>';
       }else{
           echo '<td>'."従業員".'</td>';
       }
                echo "</tr>\n";
}
?>