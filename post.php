<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>登録結果</title>
</head>
<body>

<?php
// ブラウザでエラー確認が出来るようにします
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    //データベース名、ユーザー名、パスワード
    $db = new mysqli('localhost', 'root', 'root', 'tree_list');

    //index.phpの値を取得
    // あらかじめMySQL内にテーブルとカラムを作成しておく必要がある
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $description = $_POST['description'];
    $application = $_POST['application'];
    $link = $_POST['link'];
    $tree_length = $_POST['tree_length'];
    $leaf_attachment = $_POST['leaf_attachment'];
    $leaf_pattern = $_POST['leaf_pattern'];
    $leaf_shape = $_POST['leaf_shape'];
    $leaf_blade = $_POST['leaf_blade'];
    $leaf_edge = $_POST['leaf_edge'];
    $leaf_vein = $_POST['leaf_vein'];
    $leaf_lateral_vein = $_POST['leaf_lateral_vein'];

    // INSERT文を変数に格納
    // あらかじめMySQL内にテーブルとカラムを作成しておく必要がある
    $sql = "INSERT INTO contents (
        id, name, image, description, application, link, 
        tree_length, leaf_attachment, leaf_pattern,leaf_shape, 
        leaf_blade, leaf_edge, leaf_vein, leaf_lateral_vein) 
        VALUES (:id, :name, :image, :description, :application, :link, 
        :tree_length, :leaf_attachment, :leaf_pattern, :leaf_shape, 
        :leaf_blade, :leaf_edge, :leaf_vein, :leaf_lateral_vein)";
    //挿入する値は空のまま、SQL実行の準備をする
    $stmt = $db->prepare($sql);
    // 挿入する値を配列に格納する
    $params = array(
        ':id' => $id, ':name' => $name, ':image' => $image, 
        ':description' => $description, ':link' => $link, ':tree_length' => $tree_length, 
        ':leaf_attachment' => $leaf_attachment, ':leaf_pattern' => $leaf_pattern, 
        ':leaf_shape' => $leaf_shape, ':leaf_blade' => $leaf_blade, ':leaf_edge' => $leaf_edge, 
        ':leaf_vein' => $leaf_vein, ':leaf_lateral_vein' => $leaf_lateral_vein);
    //挿入する値が入った変数をexecuteにセットしてSQLを実行
    $stmt->execute($params);

    echo "id: ".$id."<br>";
    echo "name: ".$name."<br>";
    echo "category: ".$category."<br>";
    echo "image: ".$image."<br>";
    echo "description: ".$description."<br>";
    echo "tree_length: ".$tree_length."<br>";
    echo "leaf_attachment: ".$leaf_attachment."<br>";
    echo "leaf_pattern: ".$leaf_pattern."<br>";
    echo "leaf_shape: ".$leaf_shape."<br>";
    echo "leaf_blade: ".$leaf_blade."<br>";
    echo "leaf_vein: ".$leaf_vein."<br>";
    echo "leaf_lateral_vein`: ".$leaf_lateral_vein."<br>";
    echo "で登録しました";
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
}

?>

<?php
        foreach ($sql as $row) {
        // データベースのフィールド名で出力
        echo "id" . $row['id'] . 'の名前は、' . $row['name'].'です。'.'<br>';
        echo "id" . $row['id'] . 'の説明：' . $row['application'].''.'<br>';
        echo "<img src=" . $row['image'] . ">";
        echo "<br>";
        }
 ?>
</body>
</html>