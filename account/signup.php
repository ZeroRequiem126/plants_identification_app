<?php
    session_start();
    require('../library.php');

    $PDO = dbconnect();

    if (isset($_SESSION["login"])) {
        header("Location: ../index.php");
        exit();
    }

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        try {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_hash = password_hash($password,PASSWORD_DEFAULT);

            $_SESSION["name"] = $name;
            $_SESSION["email"] = $email;


            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $PDO->prepare($sql);
            $params = array(':name' => $name, ':email' => $email, ':password' => password_hash($password,PASSWORD_DEFAULT));
            $stmt->execute($params);

            $sql2 = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
            $stmt = $PDO->prepare($sql2);
            $stmt->execute();

            foreach ($stmt as $row) {
                    $_SESSION['login'] = $row['id'];
            }
            header('Location: success.php');
            exit();
        } catch (PDOExeption $e) {
            exit('データベースエラー');
        }
    } else {
        $message = "全ての項目を入力してください";
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>新規登録</title>
</head>
<body>

<?php include("../templates/header.html"); ?>

<?php
    echo '<div class="signup-form">';
    echo '<h2>新規会員登録</h2>';
    echo '<div class="container">';
    echo '<form action="" method="post">';
    echo '<div class="mb-3">';
    echo '<h3>ニックネーム</h3>';
    echo '<input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<h3>Eメール</h3>';
    echo '<input type="text" name="email" class="form-control" id="exampleInputPassword1" required>';
    echo '</div>';
    echo '<div class="mb-3">';
    echo '<h3>パスワード</h3>';
    echo '<input type="password" name="password" class="form-control" id="exampleInputPassword1" required>';
    echo '</div>';
    echo '<button type="submit" class="btn btn-danger" id="signup-button">登録</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
?>

<?php include("../templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="main.js?4"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>