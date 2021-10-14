

<!DOCTYPE html>
<html lang="ja">
<?php
session_start();
require_once('funcs.php');
loginCheck();

?>
<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <button></button>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="index.php">データ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

<?php
$id = $_GET['id'];

$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM
                        tweet
                    WHERE
                        id = :id;");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

if ($status == false) {
    // sql_error($status);
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>

    <!-- Main[Start] -->
    <form method="post" action="db_update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>掲示板</legend>
                <label><?php $name ?>
                    <label>編集しよう <br>
                        <input type="text" name="name" placeholder="Username" class="tweet_name" value="<?=h($row["username"])?>"><br>
                        <textarea name="content" rows="4" cols="40" placeholder="tweet"><?=h($row["content"])?></textarea></label><br>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="submit" value="更新">
            </fieldset>
        </div>
    </form>