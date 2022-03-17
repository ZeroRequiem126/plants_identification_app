<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>登録ページ</title>
</head>
<body>
<div id="post">
    <form method="post" action="post.php">
        <div>id <input type="text" name="id" size="30"></div>
        <div>name <input type="text" name="name" size="30"></div>
        <div>image <input type="text" name="image" size="30"></div>
        <div>description <textarea name="description"></textarea></div>
        <div>application <textarea name="application"></textarea></div>
        <div>link <input type="text" name="link" size="30"></div>
        <div>tree_length <input type="text" name="tree_length" size="30"></div>
        <div>leaf_attachment <input type="text" name="leaf_attachment" size="30"></div>
        <div>leaf_pattern <input type="text" name="leaf_pattern" size="30"></div>
        <div>leaf_shape <input type="text" name="leaf_shape" size="30"></div>
        <div>leaf_blade <input type="text" name="leaf_blade" size="30"></div>
        <div>leaf_edge <input type="text" name="leaf_edge" size="30"></div>
        <div>leaf_vein <input type="text" name="leaf_vein" size="30"></div>
        <div>leaf_lateral_vein <input type="text" name="leaf_lateral_vein" size="30"></div>
        <div><input type="submit" name="submit" value="投稿"></div>
    </form>
</div>
</body>
</html>

if (!empty($_GET["id"])) {
        $table = "SELECT id, name, image, application, tree_height FROM tree WHERE id='".$_GET['id']."'";
    $sql = $db->query($table);
    }

    <form action="" method="GET">
    <input type="text" name="id"><br/>
    <input type="text" name="tree_height"><br/>
    <input type="submit" value ="送信">
    </form>



    echo "id" . $row['id'] . 'のnameは、' . $row['name'].'です。'.'<br>';
    echo "id" . $row['id'] . 'のtree_heightは、' . $row['tree_height'].'です。'.'<br>';
    echo "id" . $row['id'] . 'のleaf_attachmentは、' . $row['leaf_attachment'].'です。'.'<br>';
    echo "id" . $row['id'] . 'のapplication：' . $row['application'].''.'<br>';
    echo "<img src=" . $row['image'] . ">";
    echo "<br>";    