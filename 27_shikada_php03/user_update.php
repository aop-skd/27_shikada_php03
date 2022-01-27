<?php

require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST['username'];
$email = $_POST['useremail'];
$password = $_POST['userpassword'];
$id = $_POST['id'];


//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
    // 1. SQL文を用意
    $stmt = $pdo->prepare('UPDATE
                        gs_member
                    SET
                        name = :name,
                        email = :email,
                        password = :password,
                        date = sysdate()
                    WHERE
                        id = :id;
                    ');

    //  2. バインド変数を用意
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    //  3. 実行
    $status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
    //５．index.phpへリダイレクト
    redirect('user_list.php');

}
?>
