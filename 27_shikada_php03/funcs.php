<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

// サーバーアタックを防ぐための構文。インプットタグには必ず使用。
    function h($str) 
    {
        return htmlspecialchars($str, ENT_QUOTES);
    }


// DBへの接続を行う関数
    function db_conn()
    {
    try {
        $pdo = new PDO('mysql:dbname=gs_db; charset=utf8;host=localhost','root','root');  //insertからコピペ。
        return $pdo;
    } 
    catch (PDOException $e) {
        exit('DBConnectError'.$e->getMessage());
    }
    }



//SQLエラー関数：sql_error($stmt)
    function sql_error($stmt){
        $error = $stmt->errorInfo();
        exit('SQLError:' . print_r($error, true));
    }

    
//リダイレクト関数: redirect($file_name)

function redirect($file_name){
    header('Location:' .$file_name);
    exit();
}
