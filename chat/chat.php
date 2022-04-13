<?php
    session_start();
    require('../assets/templates/library.php');
    $PDO = dbconnect();

    if (!empty($_SESSION["login"])) {
        
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $search_value = $search;

            $table = "SELECT * FROM chats INNER JOIN users ON chats.user_id = users.id WHERE comment LIKE :search";
            $sql = $PDO->prepare($table);
            $sql->bindValue(":search", '%'. $search .'%', PDO::PARAM_STR);
            $sql->execute();
        } else {
            $search = '';
            $search_value = '';

            $table = "SELECT * FROM chats INNER JOIN users ON chats.user_id = users.id";
            $sql = $PDO->query($table);
        }
    }


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="../assets/style/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>チャット</title>
</head>
<body>

<?php include("../assets/templates/header.html"); ?>

<div class="chat-page">

<?php
    
    echo '<div class="container">';
    echo '<div class="my-3 p-3 bg-body rounded shadow-sm chat-list">';
    echo '<h3>掲示板</h3>';
    echo '<p style="text-align: center; padding-bottom: 20px !important;" class="border-bottom">植物に関する質問や雑談にご活用ください。</p>';
    
    echo '<div class="search-comment">';
    echo '<div class="wrap">';
    echo '<form action="" method="get">';
    echo '<p>コメント検索</p>';
    echo '<input type="text" name="search" value="' .$search_value. '"><br>';
    echo '<input type="submit" name="" value="検索">';
    echo '<input type="button" value="リセット" onclick="history.back()">';
    echo '</form>';
    echo '</div>';
    echo '</div>';

    echo '<div class="comment">';
    foreach ($sql as $row) {
                $timestamp = strtotime($row['date']);
                $date = date("Y-m-d H:i", $timestamp);
                    if ($_SESSION['login'] === ($row['id'])) {
                        echo '<div class=" right-comment">';
                        echo '<div class="pt-3 border-bottom comment-item">';
                        echo '<p class="pb-3 mb-0 medium lh-sm">';
                        echo '<span class="chat-date" style="font-size: 0.8em !important;">' . $date . '</span><br>';
                        echo '<span><span style="color: black; font-weight: bold;">あなた: </span>'. $row['comment'] . '<span>';
                        echo '</p>'; 
                        echo '</div>';
                        echo '</div>';
                        echo '</br>';
                    } else {
                        echo '<div class="left-comment">';
                        echo '<div class="pt-3 border-bottom comment-item">';
                        echo '<p class="pb-3 mb-0 medium lh-sm">';
                        echo '<span class="chat-date" style="font-size: 0.8em !important;">' . $date . '</span><br>';
                        echo '<span><span style="color: black; font-weight: bold;">' . $row['name'] . '</span>' . ': ' . $row['comment'] . '<span>';
                        echo '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</br>';
                    }
    }
    echo '</div>';
    
    $PDO = dbconnect();
    $chats_num = $PDO->prepare("SELECT COUNT(*) FROM chats");
    $chats_num->execute();
    $chats_num = $chats_num->fetchColumn(); 
    $pagination = ceil($chats_num / 10);

    echo '<div class="leave-message">';
    echo '<a href="../chat/chat_post.php" class="btn btn-lg btn-primary">投稿する</a>';
    echo '</div>';

    echo '</div>';
    echo '</div>';
    
?>

</div>


<?php include("../assets/templates/footer.html"); ?>

<div id="js-scroll-top" class="scroll-top not-active">TOP</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>