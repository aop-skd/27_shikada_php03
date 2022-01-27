<?php

$id = $_GET['id'];

// DBに接続
require_once('funcs.php');
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_member WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    sql_error($stmt);
} else {
    //データが取得できたら。
    $view = $stmt->fetch();
}
// var_dump($view);
?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登録情報の変更</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Menuへ戻る</a>   
    </div>

  <h1>登録情報の変更</h1>
  <form method="post" action="user_update.php">
    <div class="form-group">
        <label for="InputName">お名前</label>
        <input type="name" class="form-control" id="InputName" name="username" value="<?= $view['name'] ?>">
    </div>

    <div class="form-group">
        <label for="InputEmail1">メールアドレス</label>
        <input type="email" class="form-control" id="InputEmail" name="useremail" value="<?= $view['email'] ?>">
    </div>

    <div class="form-group">
        <label for="InputPassword">パスワード</label>
        <input type="text" class="form-control" id="InputPassword" placeholder="Password" name="userpassword" value="<?= $view['password'] ?>">
    </div>

    <input type="hidden" name="id" value=<?= $view['id'] ?>>
 
    <input type="submit" class="btn btn-primary" value="更新"></input>
  </form>

    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>