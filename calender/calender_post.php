<?php
    session_start();
    require('../assets/templates/library.php');

    $PDO = dbconnect();

    $user_id = ($_SESSION['login']);

        if (!empty($_POST['tree_id']) && !empty($_POST['date'])) {
            try {
                $tree_id = $_POST["tree_id"];
                $date = $_POST["date"];
    
                $sql = "INSERT INTO calenders (tree_id, user_id, date) VALUES (:tree_id, :user_id, :date)";
                $stmt = $PDO->prepare($sql);
                $params = array(':tree_id' => $tree_id, ':user_id' => $user_id, ':date' => $date);
                $stmt->execute($params);
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
    <link rel="stylesheet" href="../assets/style/style.css?">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>カレンダー登録</title>
</head>
<body>

<?php include("../assets/templates/header.html"); ?>

<?php
    echo '<div class="calender-post-page">';
    echo '<h2>カレンダー登録</h2>';
    echo '<div class="container">';
    echo '<form action="" method="post">';

    echo '<div class="mb-3">';
    echo '<select name="tree_id">';
    echo '<option class="form-control" value="">木の実を選択してください</option>';

    if(!empty($user_id)) {
    $favorites = "SELECT * FROM favorites INNER JOIN trees ON favorites.tree_id = trees.id WHERE favorites.user_id = '".$user_id."'";
    $sql = $PDO->query($favorites);
    var_dump($sql);
    foreach ($sql as $row) {
        echo '<option value="' . $row['tree_id'] . '">' . $row['name'] . '</option>';
    }
    }   
    echo '</select>';
    echo '</div>';

    echo '<div class="mb-3">';
    echo '<input type="date" name="date" class="form-control">';
    echo '</div>';
    
    echo '<div class="mb-3">';
    echo '<input type="submit" value="送信"  class="form-control">';
    echo '</div>';

    echo '<div class="mb-3">';
    echo '<input type="reset" value="リセット"  class="form-control">';
    echo '</div>';

    echo '<div class="mb-3">';
    echo '<a href="../calender/calender.php" class="btn btn-lg btn-dark">収穫カレンダー</a>';
    echo '</div>';

    echo '</form>';
    echo '</div>';
    echo '</div>';
?>

<?php include("../assets/templates/footer.html"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
<script src="../assets/js/main.js?"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>