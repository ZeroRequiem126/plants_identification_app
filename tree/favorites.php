<?php
    session_start();
    require('../assets/templates/library.php');

    $PDO = dbconnect();

    if (!empty($_SESSION["login"])) {
        $table = "SELECT * FROM favorites INNER JOIN trees ON favorites.tree_id = trees.id WHERE favorites.user_id = '".$_SESSION['login']."'";
        $sql = $PDO->query($table);
        $sql->execute();
        $count = $sql->rowCount();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/style/style.css?">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>山の恵みぺディア</title>
</head>
<body>

<?php include("../assets/templates/header.html"); ?>

    <div class="favorites-page">
        <?php

            if ($count != 0 && !empty($_SESSION["login"])) {

                echo '<h2>お気に入り</h2>';
                echo '<div class="album py-5 bg-ligh favorite-items">';
                echo '<div class="container">';
                echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

                foreach ($sql as $row) {
                    echo '<div class="col">';
                    echo '<div class="card shadow-sm">';
                    echo '<img src="' .$row['overview_image'] .'" class="bd-placeholder-img card-img-top">';
                    echo '<div class="card-body">';
                    echo '<h3 class="card-text">' . $row['name'] . '</h3>';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<div class="btn-group">';
                    echo '<form method="GET" action="details.php">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<input type="submit" value ="詳細" class="btn btn-sm btn-dark" id="tree-detail">';
                    echo '</form>';

                    echo '<form method="POST" action="" name="deleteform">';
                    echo '<input type="hidden" name="tree_id" value="' . $row['id'] . '">';
                    echo '<input type="hidden" name="user_id" value="' . $_SESSION["login"] . '">';

                    $favorites = "SELECT * FROM favorites WHERE tree_id = '".$row['id']."' AND user_id = '".$_SESSION["login"]."'";
                    $sql = $PDO->query($favorites);
                    $sql->execute();
                    $count = $sql->rowCount();

                    if (isset($_POST['tree_id']) && isset($_POST['user_id']) && $_POST['tree_id'] == $row['id']) {
                        if ($count == 0) {
                            $add_to_favorite = "INSERT INTO favorites (tree_id, user_id) VALUES('".$_POST['tree_id']."', '".$_POST['user_id']."')";
                            $sql = $PDO->query($add_to_favorite);
                            echo '<input type="submit" value ="お気に入り解除" class="btn btn-sm btn-danger" onclick=\'return confirm("お気に入りを解除すると、収穫記録が残せなくなりますが、本当にいいですか？");\'>';
                        } else {
                            $delete_from_favorite = "DELETE FROM favorites WHERE tree_id = '".$_POST['tree_id']."' AND user_id = '".$_POST['user_id']."'";
                            $sql = $PDO->query($delete_from_favorite);
                            echo '<script type="text/JavaScript"> location.reload(); </script>';
                        }
                    } else {
                        if ($count == 0) {
                            echo '<input type="submit" value ="お気に入り登録" class="btn btn-sm btn-outline-secondary">';
                        } else {
                            echo '<input type="submit" value ="お気に入り解除" class="btn btn-sm btn-danger" onclick=\'return confirm("お気に入りを解除すると、収穫記録が残せなくなりますが、本当にいいですか？");\'>';
                        }
                    }
                    echo '</form>';
                    
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } 

                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="no-favorite">';
                echo '<div class="balloon">';
                echo '<div class="faceicon">';
                echo '<img src="img/芋虫.png" width="300">';
                echo '</div>';
                echo '<h4 class="says">登録がないよ！</h4>';
                echo '</div>';
                echo '</div>';
            }          
        ?>
    </div>
    
    <?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>