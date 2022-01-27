<?php


require_once('funcs.php');
session_start();

// 0.POST情報の習得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//1. 接続します
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_member WHERE email=:email AND password=:password";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $lid);
$stmt->bindValue(':password', $lpw);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  sql_error($stmt);
}

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入
if( $val["email"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  // ユニークなキーをゲットできる方法
  $_SESSION["kanri_flg"]   = $val['name'];
  $_SESSION["name"]       = $val['name'];
  //Login処理OKの場合select.phpへ遷移
  redirect('user_list.php');
}else{
  //Login処理NGの場合login.phpへ遷移
  redirect('login.php');
}

?>

