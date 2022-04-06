<?php
    session_start();
    require('../assets/templates/library.php');
    
    $PDO = dbconnect();

    if (isset($_POST['user_id']) && isset($_POST['password'])) {

        $user_id = $_POST['user_id'];
        $password = $_POST['password'];   
        $password_hash = password_hash($password,PASSWORD_DEFAULT);

        $_SESSION["user_id"] = $_POST['user_id'];
        $_SESSION["password"] =  $_POST['password'];
        
        $sql = "SELECT * FROM users WHERE user_id = '".$_POST["user_id"]."'";
        $stmt = $PDO->prepare($sql);
        $stmt->execute();

        foreach ($stmt as $row) {
            if ($row["user_id"] ==  $_SESSION['user_id']) {
                if(password_verify($_SESSION['password'], $row['password'])){
                    $_SESSION['login'] = $row['id'];
                } 
            }

    
        }

        header("Location: ../account/welcome.php");
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
    <title>ログインページ</title>
    </head>
<body>

<?php include("../assets/templates/header.html"); ?>

<?php
    echo '<div class="login-page">';
    echo '<div class="container">';
    echo '<form action="" method="post">';
    echo '<div class="mb-3">';
    echo '<h3>ID</h3>';
    echo '<input type="text" name="user_id" class="form-control" id="exampleInputPassword1" required>';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<h3>パスワード</h3>';
    echo '<input type="password" name="password" class="form-control" id="exampleInputPassword1" required>';
    echo '</div>';
    echo '<button type="submit" class="btn btn-warning" id="login-button">ログイン</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
?>

<?php include("../assets/templates/footer.html"); ?>

</body>
</html>