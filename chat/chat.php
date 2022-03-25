<?php
    session_start();
    require('../library.php');


    if (!empty($_SESSION["login"])) {
        if (isset($_GET['page'])) {
            $page = (int)$_GET['page'];
        } else {
            $page = 1;
        }

        if ($page > 1) {
            $start = ($page * 10) - 10;
        } else {
            $start = 0;
        }
        $PDO = dbconnect();
        $table = "SELECT * FROM chats INNER JOIN users ON chats.user_id = users.id LIMIT {$start}, 10";
        $sql = $PDO->query($table);
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../style.css?1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>チャット</title>
</head>
<body>

<?php include("../templates/header.html"); ?>

<div class="chat-page">

<?php
    
    echo '<div class="container">';
    echo '<div class="my-3 p-3 bg-body rounded shadow-sm memo-list">';
    echo '<h3 class="memo-title">みんなの掲示板</h2>';
    echo '<p style="text-align: center; padding-bottom: 20px !important;" class="border-bottom">植物に関する質問や雑談にご活用ください。</p>';
    foreach ($sql as $row) {
                $timestamp = strtotime($row['date']);
                $date = date("Y-m-d H:i", $timestamp);
                    if ($_SESSION['login'] === ($row['id'])) {
                        echo '<div class="pt-3 border-bottom align-right">';
                        echo '<p class="pb-3 mb-0 medium lh-sm">';
                        echo '<span class="chat-date" style="font-size: 0.8em !important;">' . $date . '</span><br>';
                        echo '<span>' . $row['comment']  .': '. '<span style="color: black; font-weight: bold;">自分</span>' . '<span>';
                        echo '</p>'; 
                        echo '</div>';
                    } else {
                        echo '<div class="pt-3 border-bottom">';
                        echo '<p class="pb-3 mb-0 medium lh-sm">';
                        echo '<span class="chat-date" style="font-size: 0.8em !important;">' . $date . '</span><br>';
                        echo '<span><span style="color: black; font-weight: bold;">' . $row['name'] . '</span>' . ': ' . $row['comment'] . '<span>';
                        echo '</p>';
                        echo '</div>';
                    }
    }
    
    $PDO = dbconnect();
    $chats_num = $PDO->prepare("SELECT COUNT(*) FROM chats");
    $chats_num->execute();
    $chats_num = $chats_num->fetchColumn();
    $pagination = ceil($chats_num / 10);

    echo '<div class="chat-pagination">';
    for ($x = 1; $x <= $pagination ; $x++) {
        if ($x == $_GET['page']) {
            echo '<a href="?page=' . $x . '" style="color: black;">' . $x . '</a>'; 
        } else {
            echo '<a href="?page=' . $x . '">' . $x . '</a>';
        }
    }
    echo '</div>';

    echo '<div class="leave-message">';
    echo '<a href="../chat/chat_post.php" class="btn btn-lg btn-primary">コメントを残す</a>';
    echo '</div>';

    echo '</div>';
    echo '</div>';
    
?>

</div>


<?php include("../templates/footer.html"); ?>

<div id="js-scroll-top" class="scroll-top not-active">TOP</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>