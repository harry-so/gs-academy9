<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once('funcs.php');
loginCheck();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索</title>
</head>
<body>
    <a href="index.php">メインへ戻る</a>

<?php

// ツイートの検索機能

//1. POSTデータ取得
$key = $_GET['key'];
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM Tweet WHERE username LIKE concat('%', :key, '%') OR content LIKE concat('%', :key, '%') ORDER BY id DESC;");
$status = $stmt->execute(['key' => $key]);

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= "<div class='tweet'>";
        $view .= "<div class='namedate'><p class='username'>" . h($result['username']) . "</p>";
        $view .= "<p class='date'>" . h($result['date']) . "</p></div>";
        $view .= "<p class='content'>" . h($result['content']) . "</p>";
        $view .= "</div>";
    };
};

print($view);

?>

<style>
    .tweet {
        background-color: lightblue;
        width: 66vw;
        border-radius: 10px;
        margin : 10px;
        padding: 5px 5px 5px 5px;
    }
    .namedate {
        display:flex;
    }
    .username{
        font-size:15px;
        color : black;
        padding:0 20px 0 0;
    }
    .content{
        font-size:18px;
        font-size:bold;
        color : black;
        padding: 5px 0 5px 20px;
    }
    .date{
        font-size:12px;
        color : black;
        padding: 0 0 0 10px;
    }
</style>
</body>
</html>