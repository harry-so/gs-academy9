<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
};

function db_conn(){
        //1.  DB接続します
    try {
        $db_name = 'gs_db';    //データベース名
        $db_id   = 'root';      //アカウント名
        $db_pw   = 'root';      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        // 重要!!! Never forget
        return $pdo;
        //
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    };
};

function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
};

function redirect($file_name = 'index.php'){
    header('Location:' . $file_name);
    exit();
};


// ログインチェク処理 loginCheck()
function loginCheck() {
    // 1. ログインチェック処理！
    if ($_SESSION['chk_ssid'] == session_id()) {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
        // echo session_id();
    } else {
        // id持ってない OR idが違う
        exit("BAD ENTRY");
    };
    }
