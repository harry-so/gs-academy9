<?php
require_once('funcs.php');
//1. POSTデータ取得


$name = $_POST['name'];
$content = $_POST['content'];
$id = $_POST['id'];

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
// 1. SQL文を用意
$stmt = $pdo->prepare("UPDATE 
                            tweet 
                        SET
                            username = :name,
                            content = :content,
                            date = sysdate()
                        WHERE
                            id = :id;");

//  2. バインド変数を用意
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    sql_error($stmt);
} else {
    //５．index.phpへリダイレクト
  redirect();
}