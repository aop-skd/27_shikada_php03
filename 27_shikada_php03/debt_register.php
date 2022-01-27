<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>債権管理</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Menuへ戻る</a>   
    </div>

  <h1>債権管理</h1>
  <form method="post" action="debt_insert.php">
    <div class="form-group">
        <label for="InputName">お名前</label>
        <input type="name" class="form-control" id="InputWho" placeholder="Name" name="whoname">
    </div>

    <div class="form-group">
        <label for="InputDate">日付</label>
        <input type="date" class="form-control" id="InputDate" placeholder="Date" name="partydate">
    </div>
    
    <div class="form-group">
        <label for="InputParty">名称</label>
        <input type="text" class="form-control" id="InputParty" placeholder="Party" name="partyname">
    </div>

    <div class="form-group">
        <label for="InputAmount">金額</label>
        <input type="number" class="form-control" id="InputAmount" placeholder="Amount" name="amount">
    </div>


    <div class="form-group">
        <label for="InputMemo">メモ</label>
        <input type="textarea" class="form-control" id="InputMemo" placeholder="Memo" name="memo">
    </div>
 
    <input type="submit" class="btn btn-primary" value="記録する"></input>
    </form>

    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>