<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>home</title>

</head>

<body>
    <?php include('db_con.php');
    include('header.php');
    ?>


    <div style="position: relative;">
        <div class="SearchRes"><label>検索結果</label></div>
        <div class="imageList2">
            <?php 

            if (isset($_POST['word'])) {
                $SearchWord = $_POST['word'];
                $sql = "SELECT * FROM images WHERE image_name LIKE '%" . $SearchWord . "%'";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $ResImages = $stmt->fetchAll();
                if (empty($ResImages)) echo "No search results";
            ?>  
                <?php for ($i = 0; $i < count($ResImages); $i++) { ?>
                    <div class="artDiv">
                        <a href="Artworks.php?id=<?= $ResImages[$i]['image_id']; ?>">
                        <img src="pick_sql.php?id=<?= $ResImages[$i]['image_id']; ?>"></a>
                        <div class="artworkName"><span><?= $ResImages[$i]['image_name']; ?></span></div>
                    </div>
            <?php }
            } ?>

        </div>
</body>

</html>