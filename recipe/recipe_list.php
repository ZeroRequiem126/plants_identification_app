<?php
    session_start();
    require('../assets/templates/library.php');

    $PDO = dbconnect();
    $table = "SELECT * FROM recipes INNER JOIN trees ON recipes.tree_id = trees.id";
    $sql = $PDO->query($table);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/style/style.css?">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>レシピ一覧</title>
</head>
<body>

<?php include("../assets/templates/header.html"); ?>

    <div class="recipe-list">
        <h2>レシピ</h2>

        <?php

            echo '<div class="album py-5 recipe-items">';
            echo '<div class="container">';
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

                foreach ($sql as $row) {
                    echo '<div class="col">';
                    echo '<div class="card shadow-sm">';
                    echo '<img src="' .$row['image'] .'" class="bd-placeholder-img card-img-top recipe-image">';
                    echo '<div class="card-body">';
                    echo '<h3 class="card-text">' . $row['recipe_title'] . '</h3>';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<div class="btn-group">';
                    echo '<form method="GET" action="recipe.php">';
                    echo '<input type="hidden" name="recipe_id" value="' . $row['recipe_id'] . '">';
                    echo '<input type="submit" value ="詳細" class="btn btn-sm btn-dark" id="tree-detail">';
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
        ?>
    </div>
    
    <?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>