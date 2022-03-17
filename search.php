<?php
    $db = new mysqli('localhost:8889', 'root', 'root', 'tree_list');
    if (!empty($_GET["id"])) {
        $table = "SELECT id, name, image, application, tree_height FROM tree WHERE id='".$_GET['id']."'";
    $sql = $db->query($table);
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>データ表示</title>
</head>
<body>

    <form action="" method="GET">
        <select name="id">
            <option value="">木の大きさ</option>
            <option value="1">ID:1</option>
            <option value="2">ID:2</option>
            <option value="3">ID:3</option>
        </select>
        <input type="submit" value ="送信">
    </form>

    <?php
        if (!empty($_GET["id"])) {
            foreach ($sql as $row) {
                echo "id" . $row['id'] . 'のnameは、' . $row['name'].'です。'.'<br>';
                echo "id" . $row['id'] . 'のtree_heightは、' . $row['tree_height'].'です。'.'<br>';
                echo "id" . $row['id'] . 'のapplication：' . $row['application'].''.'<br>';
                echo "<img src=" . $row['image'] . ">";
                echo "<br>";     
            }
        }
    ?>
<script src="sub.js"></script>

</body>
</html>

