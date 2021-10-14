<!DOCTYPE html>
<html lang="ja">

<?php
session_start();
$name = $_SESSION['name'];
require_once("funcs.php");
loginCheck();
?>


<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid bar">
                <div class="navbar-header">データ一覧</div>
                <div class="navbar-header">こんにちは! <?= $name ?> さん</div>
                <div class="navbar-header"><a class = "logout" href="logout.php">ログアウト</a></div>
                
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="tweet.php">
        <div class="jumbotron">
            <fieldset>
                <legend class="word">掲示板</legend>
                <label>
                    <label class="word">Tweetしよう <br>
                        <input type="text" name="name" value="<?= $name ?>" class="tweet_name"><br>
                        <textarea name="content" rows="4" cols="40" placeholder="tweet"></textarea></label><br>

                    <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>

    <!-- 検索画面 -->
    <form method="get" action="search.php">
        <div class="jumbotron">
            <fieldset>
                <legend class="word">検索ワード入力</legend>
                <label><input type="search" name="key" placeholder="キーワードを入力"></label><br>

                <input type="submit" value="検索する">
            </fieldset>
        </div>
    </form>

    <!-- Main[End] -->

<?php

// ini_set("display_errors", 1);
// error_reporting(E_ALL);


$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM tweet ORDER BY id DESC");
$status = $stmt->execute();

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
        $view .= "<div class='wrapper'>";
        $view .= "<div class='tweet'>";
        $view .= "<div class='namedate'><p class='username'>" . h($result['username']) . "</p>";
        $view .= "<p class='date'>" . h($result['date']) . "</p></div>";
        $view .= "<p class='content'>" . h($result['content']) . "</p>";
        $view .= "</div>";
        // aタグで囲って、それぞれ修正を飛ばせるようにする
        // URLパラメーターをつけて、クリックしたもののIDをつけておくれる
        $view .= '<input type="button" value ="編集" class="edit" id="' . $result['id'] .'">';
        $view .= '</input>';
        $view .= '<input type="button" value ="削除" class="confirm" id="' . $result['id'] .'">';
        $view .= '</input>';
        $view .= "</div>";
    };
};
print($view);


?>


<script>
        $(".edit").on("click", function(){
            var num = $(this).attr("id");
            var link = `update.php?id=${num}`;
            location.href=link;
        });


        $(".confirm").on("click", function(){
          if(!confirm("削除しますか?")){
              return false;
          }else{
            var num = $(this).attr("id");
            var link = `delete.php?id=${num}`;
            location.href=link;
          };
        });
    </script>



    <style>
        input:not(.tweet_name) {
            margin:10px;
        }
        input {
            padding: 5px;
        }
        textarea{
            margin:5px 0 0 0;
        }
        
        .logout {
            color: whitesmoke;
        }

        .bar {
        display:flex;
        justify-content: space-between;
        };

        .wrapper {
            display:flex;
            justify-content: left;
            align-items:center;
            padding:0px;
        }
        .word{
            margin:10px 0 0 10px;
        }
        .tweet {
            background-color: lightblue;
            width: 66vw;
            border-radius: 10px;
            margin: 10px;
            padding: 5px 5px 5px 5px;
        }

        .namedate {
            display: flex;
        }

        .username {
            font-size: 15px;
            color: black;
            padding: 0 20px 0 0;
        }

        .content {
            font-size: 18px;
            font-size: bold;
            color: black;
            padding: 5px 0 5px 20px;
        }

        .date {
            font-size: 12px;
            color: black;
            padding: 0 0 0 10px;
        }
    </style>
</body>

</html>