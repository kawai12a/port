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
  <?php
  include('db_con.php');
  include('header.php');
  include('get_Image.php');
  ?>

  <div style="position: relative;">
    <div class="illustBtn"><button class="imgButton">イラスト</button></div>
    <label>おすすめ作品</label>
    <div class="imageList">
      <?php for ($i = 0; $i < count($images); $i++) { ?>
        <div class="artDiv">
          <a href="Artworks.php?id=<?= $images[$i]['image_id']; ?>">
            <img src="pick_sql.php?id=<?= $images[$i]['image_id']; ?>"></a>
          <div class="artworkName"><span><?= $images[$i]['image_name']; ?></span></div>
          <div class="artworkUsername"></div>
        </div>
      <?php } ?>
      <div class="PageNation">
        <?php
        for ($i = 1; $i < $TotalPages; $i++) {
          echo "<a class='PageNationBtn' href='Home.php?page=" . $i . "'>" . $i . "</a>";
        }
        ?>
      </div>
    </div>
</body>

</html>