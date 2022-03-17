<?php
    $db = new mysqli('localhost:8889', 'root', 'root', 'tree_list');
    if (!empty($_GET["tree_height"]) && !empty($_GET["leaf_attachment"])) {
        $table = "SELECT id, name, overview_image, application, tree_height, leaf_attachment FROM tree WHERE tree_height='".$_GET['tree_height']."' AND leaf_attachment='".$_GET['leaf_attachment']."'";
        $sql = $db->query($table);
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>この木なんの木？</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php" id="site-title"><img src="img/leaf.png" width="50" height="50"> この木なんの木？</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-link menu-item" href="#">検索する</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="results">
        <h2>検索結果</h2>

        <?php

            echo '<div class="album py-5 bg-light">';
            echo '<div class="container">';
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

            if (!empty($_GET["tree_height"]) && !empty($_GET["leaf_attachment"])) {
                foreach ($sql as $row) {
                    echo '<div class="col">';
                    echo '<div class="card shadow-sm">';
                    echo '<img src="' .$row['overview_image'] .'" class="bd-placeholder-img card-img-top">';
                    echo '<div class="card-body">';
                    echo '<h3 class="card-text">' . $row['name'] . '</h3>';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<div class="btn-group">';
                    echo '<form method="GET" action="detail.php">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<input type="submit" value ="詳細を見る" class="btn btn-sm btn-outline-secondary">';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        ?>
    </div>

    <footer>
    <div class="container">
        <nav class="footB">
        <ul>
            <li><a href="index.php">ホーム</a></li>
            <li><a href="index.php#first-category">検索する</a></li>
        </ul>
        </nav>
    </footer>

    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>