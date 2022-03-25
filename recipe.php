<?php
    session_start();
    require('library.php');

    $PDO = dbconnect();
    $table = "SELECT * FROM recipes INNER JOIN trees ON recipes.tree_id = trees.id INNER JOIN materials ON recipes.recipe_id = materials.recipe_id WHERE recipes.recipe_id='".$_GET['recipe_id']."'";
    $sql = $PDO->query($table);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>山の恵みぺディア</title>
</head>
<body>

<?php include("templates/header.html"); ?>

<div class="recipe-page">
<?php
    
    foreach ($sql as $row) {
        echo '<div class="container">';
        echo '<div class="my-3 p-3">';
        echo '<h2>' . '『' . '<span>' . $row['recipe_title'] . '</span>' . '』' . '</h2>';
        echo '<div class="image-container">';
        echo '<img src="' .$row['image'] .'"">';
        echo '</div>';
        
        echo '<div class="recipe-container">';
        echo '<h3 class="border-bottom border-secondary">材料</h3>';
        for ($i = 1; $i <= 10; $i++) {
            if (!empty($row['ingredient_' . $i]) && !empty($row['ingredient_' . $i . '_serving'])) {
                echo '<section class="recipe-materials">';
                echo '<ul class="border-bottom recipe_material_list">';
                echo '<li class="recipe_material">';
                echo '<span class="ingredient-name">' . $row['ingredient_' . $i] . '</span>';
                echo '<span class="ingredient-serving">' . $row['ingredient_' . $i . '_serving'] . '</span>';
                echo '</li>';
                echo '</ul>';
                echo '</section>';
            }
        }
        echo '</div>';

        echo '<div class="recipe-container">';
        echo '<h3 class="border-bottom border-secondary">作り方</h3>';
        for ($i = 1; $i <= 6; $i++) {
                if (!empty($row['step_' . $i])) {
                    echo '<div class="pt-3 recipe-step">';
                    echo '<span class="recipe-step-order">'  . $i . '</span>';
                    echo '<span class="recipe-step-txt">' . $row['step_' . $i] . '</span>';
                    echo '</div>';
                }
        }
        echo '</div>';

        /* if (!empty($row['remark'])) {
            echo '<div class="recipe-remark">';
            echo '<p class="recipe-remark-title">＜メモ＞</p>';
            echo '<p class="recipe-remark-txt">' . $row['remark'] . '</p>';
            echo '</div>';
        } 
        */

        echo '</div>';
        echo '</div>';
    }

    
?>
</div>

<?php include("templates/footer.html"); ?>

    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>