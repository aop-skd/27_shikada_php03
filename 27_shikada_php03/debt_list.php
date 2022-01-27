<?php

require_once('funcs.php');

//1.  DB接続します
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_debt");   //データをすべて出力してくる。
$status = $stmt->execute();

//３．データ表示
$view ="";

if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr>';
    $view .= '<td>';
    $view .= h($result['id']);
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result['name']);
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result['date']);
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result['party']);
    $view .= '</td>';
    $view .= '<td>';
    $view .= h($result['amount']);
    $view .= '</td>';   
    $view .= '<td>';
    $view .= h($result['memo']);
    $view .= '</td>';
    $view .= '</tr>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>会員リスト</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Menuへ戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="search">
  <h2>検索条件</h2>
  <form class="form-inline" method="post" action="debt_list_insert.php">
    <div class="form-group">
      <label for="InputName2">名前</label>
      <input type="text" class="form-control" id="InputName2" placeholder="Search" name="name">
    </div>
    <button type="submit" class="btn btn-primary">検索</button>
  </form>
</div>

<div class="container">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>名前</th>
        <th>日付</th>
        <th>名称</th>
        <th>金額</th>
        <th>メモ</th>
      </tr>
    </thead>
    <tbody>
        <div class="container jumbotron"><?= $view ?></div> 
    </tbody>
  </table>
</div>
<!-- Main[End] -->

</body>
</html>
