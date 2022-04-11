<?php
    session_start();
    require('../templates/library.php');
    
    $PDO = dbconnect();

    if (isset($_SESSION['user_id'])) {

        $message = 'ニックネーム「' . $_SESSION['name'] . '」で登録しました！';

        
        $sql = "SELECT * FROM users WHERE name = '".$_SESSION["name"]."' AND user_id = '".$_SESSION["user_id"]."'";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();

    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/style/style.css?">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>会員登録結果</title>
    </head>
<body>

<?php include("../assets/templates/header.html"); ?>

<?php
    echo '<div class="success-page">';
    echo '<div class="container">';

    foreach ($stmt as $row) {
        if ($row["user_id"] ==  $_SESSION['user_id']) {
            echo "<h2>会員登録しました</h2>";
            echo '<div class="balloon-general">';
            echo '<div class="faceicon">';
            echo '<img src="../assets/img/main/芋虫.png" width="300">';
            echo '</div>';
            echo '<h4 class="says">' . $row['name'] . 'さん、ようこそ！</h4>';
            echo '</div>';
            echo '<a class="btn btn-light" href="../index.php">トップページ</a>';
        } else {
            echo "<h2>会員登録に失敗しました</h2>";
            echo '<div class="balloon-general">';
            echo '<div class="faceicon">';
            echo '<img src="../img/芋虫.png" width="300">';
            echo '</div>';
            echo '<h4 class="says">正しく入力してね！</h4>';
            echo '</div>';
            echo '<a class="btn btn-light" href="../account/signup.php">新規登録ページ</a';
        }

        $_SESSION['login'] = $row['id'];
    }
    
    echo '</div>';
    echo '</div>';
?>

<?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js?4"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>