<?php

require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST['whoname'];
$date = $_POST['partydate'];
$party = $_POST['partyname'];
$amount = $_POST['amount'];
$memo = $_POST['memo'];


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
    // 1. SQL文を用意
    $stmt = $pdo->prepare("INSERT INTO 
                            gs_debt
                            (id, name, date, party, amount, memo)
                            VALUES
                            (NULL, :name, :date, :party, :amount, :memo)");
    // 一旦変数にして保存している。直接送るのはセキュリティ上問題があるため。

    //  2. バインド変数を用意
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':date', $date, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':party', $party, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':amount', $amount, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':memo', $memo, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

    //  3. 実行
    $status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
    //５．index.phpへリダイレクト
    redirect('debt_list.php');

}
?>
