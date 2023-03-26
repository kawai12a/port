<?php include('./db_con.php');    // コメント投稿処理

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['comment'])) {
    $imageId = $_GET['id'];
    $comText = $_POST['comment'];
    $insert = $db->query("INSERT INTO comments (image_id, comment) VALUES (" . $imageId . ",'" . $comText . "')");
    if ($insert) {
        $uri = $_SERVER['HTTP_REFERER'];
        header('Location: ' . $uri, true, 303);
        exit();
    }
} else {
    $uri = $_SERVER['HTTP_REFERER'];
    header('Location: ' . $uri, true, 303);
    exit();
}
