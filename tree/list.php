<?php
    session_start();
    require('../assets/templates/library.php');

    $PDO = dbconnect();

    if (!empty($_GET["leaf_attachment"]) && !empty($_GET["leaf_pattern"]) && !empty($_GET["leaf_shape"]) && !empty($_GET["leaf_blade"]) && !empty($_GET["leaf_edge"]) && !empty($_GET["leaf_vein"]) && !empty($_GET["leaf_lateral_vein"]) ) {
        $table = "SELECT id, name, overview_image FROM trees WHERE leaf_attachment='".$_GET['leaf_attachment']."' AND leaf_pattern='".$_GET['leaf_pattern']."' AND leaf_shape='".$_GET['leaf_shape']."' AND leaf_blade='".$_GET['leaf_blade']."' AND leaf_edge='".$_GET['leaf_edge']."' AND leaf_vein='".$_GET['leaf_vein']."' AND leaf_lateral_vein='".$_GET['leaf_lateral_vein']."'";
        $sql = $PDO->query($table);
        $count = $sql->rowCount();
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>検索結果</title>
</head>
<body>

<?php include("../assets/templates/header.html"); ?>

    <div class="results">
        <h2>検索結果</h2>

        <?php

            echo '<div class="album py-5 bg-light">';
            echo '<div class="container">';
            
            if (!empty($count) && $count >= 1) {

                echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                if (!empty($_GET["leaf_attachment"]) && !empty($_GET["leaf_pattern"]) && !empty($_GET["leaf_shape"]) && !empty($_GET["leaf_blade"]) && !empty($_GET["leaf_edge"]) && !empty($_GET["leaf_vein"]) && !empty($_GET["leaf_lateral_vein"]) ) {
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

                            if (isset($_SESSION['login'])) {
                                echo '<form method="POST" action="">';
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
                                        echo '<input type="submit" value ="登録済み" class="btn btn-sm btn-success">';
                                    } else {
                                        $delete_from_favorite = "DELETE FROM favorites WHERE tree_id = '".$_POST['tree_id']."' AND user_id = '".$_POST['user_id']."'";
                                        $sql = $PDO->query($delete_from_favorite);
                                        echo '<input type="submit" value ="お気に入り登録" class="btn btn-sm btn-outline-secondary">';
                                    }
                                } else {
                                    if ($count == 0) {
                                        echo '<input type="submit" value ="お気に入り登録" class="btn btn-sm btn-outline-secondary">';
                                    } else {
                                        echo '<input type="submit" value ="登録済み" class="btn btn-sm btn-success">';
                                    }
                                }
                            }
                            echo '</form>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                    }
                }
                echo '</div>';

            } else {
                echo '<div class="balloon">';
                echo '<div class="faceicon">';
                echo '<img src="../assets/img/main/芋虫.png" width="300">';
                echo '</div>';
                echo '<h4 class="says">再検索してね！</h4>';
                echo '</div>';
            }
                echo '</div>';
                echo '</div>';
        ?>

        <div class="search-button bg-white"><input type="submit" value ="再検索" class="bg-green txt-white" id="edit-button" onclick="history.back()"></div>
    </div>
    
    <?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>