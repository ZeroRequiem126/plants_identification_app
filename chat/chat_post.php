<?php
    session_start();
    require('../assets/templates/library.php');

    $PDO = dbconnect();

    $user_id = ($_SESSION['login']);

        if (!empty($_POST["comment"]) && !empty($_SESSION["login"])) {
            try {
                $comment = $_POST["comment"];
                $date = $_SESSION["login"];
    
                $sql = "INSERT INTO chats (comment, user_id) VALUES (:comment, :user_id)";
                $stmt = $PDO->prepare($sql);
                $params = array(':comment' => $comment, ':user_id' => $user_id);
                $stmt->execute($params);
            } catch (PDOExeption $e) {
                exit('データベースエラー');
            }
        } else {
            $message = "全ての項目を入力してください";
        }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>チャット投稿ページ</title>
</head>
<body>

<?php include("../assets/templates/header.html"); ?>

<?php
    echo '<div class="chat-post-page">';
    echo '<h2>掲示板投稿画面</h2>';
    echo '<div class="container">';
    echo '<form action="" method="post">';
    echo '<h3>コメント</h3>';
    echo '<textarea name="comment" rows="5" class="form-control" required></textarea>';
    echo '<div class="buttons">';
    echo '<button type="submit" class="btn btn-lg btn-danger" id="signup-button">投稿</button>';
    echo '<a href="../chat/chat.php?page=1" class="btn btn-lg btn-dark">掲示板</a>';
    echo '</div>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
?>

<?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js?4"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>