<?php
//【重要】
/**
 * DB接続のための関数をfuncs.phpに用意
 * require_onceでfuncs.phpを取得
 * 関数を使えるようにする。
 */

// 1. DB接続（関数かしてfuncs.phpにまとめている）
require_once('funcs.php');
$pdo = db_conn();


//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    // ここを関数化しました。
    sql_error($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //GETデータ送信リンク作成
        // <a>で囲う。
        while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

            if($result['kanri_flg'] == 1){
                $kanri = '<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>';
            }else{
                $kanri = '';
            };
            // 管理者フラグのマーク

            $view .= '<tr>';
            $view .= '<td>';
            $view .= h($result['id']);
            $view .= '</td>';
            $view .= '<td>';
            $view .= $kanri;
            $view .= '</td>';
            $view .= '<td>';
            $view .= h($result['name']);
            $view .= '</td>';
            $view .= '<td>';
            $view .= '<a href="detail.php?id='.$result['id'].'"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>';
            $view .= '</td>';
            $view .= '<td>';
            $view .= '<a href="delete.php?id='.$result['id'].'"><span class="glyphicon glyphicon-trash" aria-hidden="trrue"></span></a>';
            $view .= '</td>';
            $view .= '</tr>';
          }
        
    }
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
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
        <th>管理者</th>
        <th>名前</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
    </thead>
    <tbody>
        <div class="container">
        <a href="detail.php"></a>
            <?= $view ?>
        </div> 
    </tbody>
    </table>
    </div>
    <!-- Main[End] -->

</body>

</html>
