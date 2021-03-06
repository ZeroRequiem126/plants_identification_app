<?php
//セッションを使うことを宣言
session_start();

//ログインされていない場合は強制的にログインページにリダイレクト
if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../assets/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>ログアウト</title>
    </head>
<body>

<?php include("../assets/templates/header.html"); ?>

<?php
    echo '<div class="logout-page">';
    echo '<div class="container">';
    echo '<h2>ログアウトしました</h2>';
    echo '<div class="balloon-general">';
    echo '<div class="faceicon">';
    echo '<img src="..//assets/img/main/芋虫.png" width="300">';
    echo '</div>';
    echo '<h4 class="says">また来てね！</h4>';
    echo '</div>';
    echo '<a class="btn btn-light" href="../index.php">トップページ</a>';
    echo '<a class="btn btn-light" href="../account/login.php">ログインページ</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
?>

<?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js?4"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>