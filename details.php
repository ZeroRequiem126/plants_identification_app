<?php
    session_start();
    require('library.php');
    $PDO = dbconnect();
    if (!empty($_GET["id"]) ) {
        $table = "SELECT id, name, overview_image, fruit_image, description, flowering_period, harvest_period, link FROM trees WHERE id='".$_GET['id']."'";
        $sql = $PDO->query($table);
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css?">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>山の恵みぺディア</title>
</head>
<body>

<?php include("templates/header.html"); ?>

<div class="tree-detail">
    <div class="container">
    <?php
        
        if (!empty($_GET["id"]) ) {
            foreach ($sql as $row) {
                echo '<h2 style="text-align: center;">' . "【" . $row['name'] . "】" . '</h2>';

                echo '<img src="'. $row['overview_image'] . '">';
                echo '<img src="'. $row['fruit_image'] . '">';

                echo '<div class="feature">';
                echo '<h2 class="pb-2 border-bottom">概要</h2>';
                echo '<div class="feature-content">';
                echo '<p>' . $row['description'] .'</p><br>';
                echo '<div class="wikipedia-link">';
                echo '<a href="' . $row['link'] . '">' . '>> Wikipediaで「' . $row['name'] . '」の情報を見てみる</a>';
                echo '</div>';
                echo '<h4><span style="font-weight: bold; color: red;">' . '開花時期：</span>' . $row['flowering_period'] . ' / ' . '<span style="font-weight: bold;  color: blue;">' . ' 収穫時期：</span>' . $row['harvest_period'] . '</h4>';
                echo '</div>';
                echo '</div>';
                
                $_SESSION['tree_id'] = $row['id'];
                $_SESSION['tree_name'] = $row['name'];


                echo '<div class="feature">';
                echo '<h2 class="pb-2 border-bottom">『' .  $row['name'] . '』を使ったレシピ</h2>';

                $PDO = dbconnect();
                $table = "SELECT * FROM recipes WHERE tree_id='".$_SESSION['tree_id']."'";
                $sql = $PDO->query($table);

                echo '<div class="recipe-link">';
                foreach ($sql as $row) {
                    echo '<form method="post" action="recipe.php" >';
                    echo '<input type="hidden" name="recipe_no" value="' .$row['recipe_no'] . '">';
                    echo '<input type="submit" value ="' . $row['recipe_title'] .'">';
                    echo '</form>';
                }
                echo '</div>';
                echo '<div class="diary-button">';
                echo '<a href="memo/memo_post.php" class="btn btn-lg btn-primary">メモを残す</a>';
                echo '<a href="memo/memos.php" class="btn btn-lg btn-secondary">メモを見る</a>';
                echo '</div>';

            }
        }
    ?>
    </div>
</div>

<?php include("templates/footer.html"); ?>

    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>