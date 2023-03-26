<?php   include('db_con.php');
// 画像保存処理
    if (!empty($_FILES['image']['name'])) {
        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];

        if(!empty($_POST['imageName']))
            $name = strip_tags($_POST['imageName']);

        $sql = 'INSERT INTO images(image_name, image_type, image_content, image_size, created_at) VALUES (:image_name, :image_type, :image_content, :image_size, now())';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->execute();
    }
    if(!empty($_POST['imageCaption'])){

        $sql = 'SELECT MAX(image_id) FROM images;';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $id = $stmt->fetchColumn();

        $CaptionTEXT = $_POST['imageCaption'];

        $insert = $db->query("INSERT INTO comments (image_id, caption) VALUES (" . $id . ",'" . $CaptionTEXT . "')");
    }
    header('Location:' . 'Home.php',true,303);
    exit();
?>
