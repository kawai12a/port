<?php 

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $imageId = $_GET['id'];
    $sql = 'SELECT * FROM comments WHERE image_id = ' . $imageId;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $data['comments'] = $stmt->fetchAll();
    $cntCom = count($data['comments']);
}

?>
