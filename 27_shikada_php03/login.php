<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ログイン画面</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Menuへ戻る</a>   
    </div>

  <h1>ログイン画面</h1>
  <form method="post" action="login_act.php">
    <div class="form-group">
        <label for="InputName">メールアドレス</label>
        <input type="email" class="form-control" id="InputEmail" placeholder="Id/Email adrress" name="lid">
    </div>

    <div class="form-group">
        <label for="InputEmail1">パスワード</label>
        <input type="text" class="form-control" id="InputPw" placeholder="Password" name="lpw">
    </div>
 
    <input type="submit" class="btn btn-primary" value="ログイン"></input>
    </form>

    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>