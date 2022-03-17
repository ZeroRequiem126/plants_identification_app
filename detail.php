<?php
    $db = new mysqli('localhost:8889', 'root', 'root', 'tree_list');
    if (!empty($_GET["id"])) {
        $table = "SELECT id, name, overview_image, fruit_image, description, flowering_period, harvest_period, application, tree_height, link, leaf_attachment FROM tree WHERE id='".$_GET['id']."'";
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
    <header id="top">
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

    <div class="tree-detail">
        <div class="container">
        <?php
            
            if (!empty($_GET['id'])) {
                foreach ($sql as $row) {
                    echo '<h2 style="text-align: center;">' . "[" . $row['name'] . "]" . '</h2>';

                    echo '<img src="'. $row['overview_image'] . '">';
                    echo '<img src="'. $row['fruit_image'] . '">';

                    echo '<div class="feature">';
                    echo '<h2 class="pb-2 border-bottom">概要</h2>';
                    echo '<div class="feature-content">';
                    echo '<p>' . $row['description'] .'</p>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="feature">';
                    echo '<h2 class="pb-2 border-bottom">開花期 / 収穫期</h2>';
                    echo '<div class="feature-content">';
                    echo '<p>' . "開花期：" . $row['flowering_period'] . '</p><br>';
                    echo '<p>' . "収穫期：" . $row['harvest_period'] . '</p>';
                    echo '</div>';
                    echo '</div>';

                    echo '<div class="feature">';
                    echo '<h2 class="pb-2 border-bottom">使い道</h2>';
                    echo '<div class="feature-content">';
                    echo '<p>' . $row['application'] . '</p>';
                    echo '</div>';
                    echo '<a href="' . $row['link'] . '">' . '>> Wikipediaはこちら</a>';
                    echo '</div>';
                }
            }
        ?>
        </div>
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