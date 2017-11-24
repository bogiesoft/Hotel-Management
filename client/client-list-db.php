            <?php
            require"../dbconnect.php";//DB接続用ファイルの読み込み
            //テーブルのレコードを抽出
            $stmt = $db->query("select * from tbl_client");
            //fetchAll(PDO::返却される配列の形式)でquery関数で返却された値を全件取得します
            $users = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            // foreach文で配列の中身を一行ずつ出力
            foreach ($users as $row) {
            	//削除フラグ条件
                if($row['CLIENT_DELETE'] === '1') {

                }else if($row['CLIENT_DELETE'] === '0'){
                
                	//電話番号の条件
                    if ($row['CLIENT_HOPE_CONTACT'] === '0') {
                        $client_tel=$row['CLIENT_TEL'];
                    }else if ($row['CLIENT_HOPE_CONTACT'] === '1'){
                        $client_tel=$row['CLIENT_MOBILE'];
                    }
                    
                    
                echo '<tr>'.
                                '<td>' . $row['CLIENT_CODE'] . '</td>' .        //顧客番号
                                '<td>' . $row['CLIENT_ENTRY'] . '</td>' .       //入会日
                                '<td>' . $row['CLIENT_NAME'] . '</td>' .        //顧客名
                                '<td>' . $row['CLIENT_KANA'] . '</td>' .        //フリガナ
                                '<td>' . $row['CLIENT_SEX'] . '</td>' .         //性別
                                '<td>' . $row['CLIENT_BIRTH'] . '</td>'.        //生年月日
                                '<td>' . $client_tel . '</td>'.                 //電話番号
                                '<td>' . $row['CLIENT_POSTCODE'] . '</td>' .   //郵便番号
                                '<td>' . $row['CLIENT_ADDRESS'] . '</td>' .    //住所
                                '<td>' . $row['CLIENT_REMARKS'] . '</td>';     //備考

                echo "</tr>\n";
                }
            }
            ?>