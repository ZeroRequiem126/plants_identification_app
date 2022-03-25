<?php
    session_start();
    require('../library.php');

    $PDO = dbconnect();

    if (!empty($_SESSION["login"]) && !empty($_SESSION["login"]) && !empty($_SESSION["tree_id"])) {
        $table = "SELECT * FROM memos WHERE user_id = '".$_SESSION['login']."' AND tree_id = '".$_SESSION['tree_id']."'";
        $sql = $PDO->query($table);
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>メモ</title>
</head>
<body>

<?php include("../templates/header.html"); ?>

<div class="memos-page">

<?php
    
    echo '<div class="container">';
    echo '<div class="my-3 p-3 bg-body rounded shadow-sm memo-list">';
    echo '<h3 class="border-bottom pb-2 mb-0 memo-title">' . '『' . '<span>' . $_SESSION["tree_name"] . '</span>' . '』' . 'のメモ' . '</h3>';
    foreach ($sql as $row) {
                echo '<div class="d-flex text-muted pt-3 border-bottom">';
                    echo '<p class="pb-3 mb-0 medium lh-sm">';
                    echo '<strong class="d-block text-gray-dark">' . $row['date'] . '</strong>';
                    echo $row['memo'];
                    echo '</p>';
                echo '</div>';
    }

    echo '<div class="leave-message">';
    echo '<a href="../memo/memo_post.php" class="btn btn-lg btn-primary">メモを残す</a>';
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