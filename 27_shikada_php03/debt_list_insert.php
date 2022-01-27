<?php

require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST['name'];
$name2 = '%'.$name.'%';


//2. DB接続します
$pdo = db_conn();

//3．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_debt WHERE name LIKE :name");   //名前付プレイスホルダて一回変数にしておく。直接変数をいれない
$status = $stmt->execute([':name' => $name2]); //Executeする際に名前付プレイスホルダーに変数を入れる

//4．データ表示
$view ="";

if ($status==false) {
    // execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
    redirect('debt_list.php');
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

  $ary_amount =[];
  // 金額合計値をだすための配列   

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

    $ary_amount[]= h($result['amount']);
    // 金額を配列にプッシュする
  }

  $amount_total = array_sum($ary_amount);


  $view .= '<tr>';
  $view .= '<td>';
  $view .= '</td>';
  $view .= '<td>';
  $view .= '</td>';
  $view .= '<td>';
  $view .= '</td>';
  $view .= '<td>';
  $view .= '</td>';
  $view .= '<td>';
  $view .= h($amount_total);
  $view .= '</td>';   
  $view .= '<td>';
  $view .= '</td>';
  $view .= '</tr>';

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
      <a class="navbar-brand" href="debt_list.php">検索画面へ戻る</a>
      </div>
    </div>
  </nav>    
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
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