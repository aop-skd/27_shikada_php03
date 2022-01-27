<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>会員登録</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Menuへ戻る</a>   
    </div>

  <h1>会員登録</h1>
  <form method="post" action="user_insert.php">
    <div class="form-group">
        <label for="InputName">お名前</label>
        <input type="name" class="form-control" id="InputName" placeholder="Name" name="username">
    </div>

    <div class="form-group">
        <label for="InputEmail1">メールアドレス</label>
        <input type="email" class="form-control" id="InputEmail" placeholder="Email" name="useremail">
    </div>
    
    <div class="form-group">
        <label for="InputPassword">パスワード</label>
        <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="userpassword">
    </div>
 
    <input type="submit" class="btn btn-primary" value="会員登録"></input>
  </form>

    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>