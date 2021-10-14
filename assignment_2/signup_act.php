<?php

require("funcs.php");

$name = $_POST['username'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO user_table(id, username, lid, lpw, kanri_flg)
  VALUES(NULL, :name, :lid, :lpw, 0)");

//  2. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);
} else {
    //５．index.phpへリダイレクト
  redirect("login.php");
}