<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      border: 0;
      background-color: #f8f8f8;
    }
  </style>
  <title></title>
</head>

<body>
  <?php
  include('db_con.php');
  include('header.php');
  include('get_Image.php');
  include('get_comment.php') ?>
  <?php
  $id = $_GET['id'];
  $sql = 'SELECT * FROM images WHERE image_id = ' . $id . ' LIMIT 1';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $image = $stmt->fetch();

  $sql2 = 'SELECT caption FROM comments WHERE image_id = ' . $id;
  $stmt = $db->prepare($sql2);
  $stmt->execute();
  $caption = $stmt->fetchColumn();
  ?>

  <div class="WhiteGap"></div>
  <div class="AtrWorksBody">
    <div class="ArtworksBox">
      <div class="Artworks">
        <img src="pick_sql.php?id=<?= $id ?>" alt="画像">
        <div class="ImageNameField">
          <span>
            <?php if (!empty($image['image_name'])) echo $image['image_name'];
            else echo "UNTITLED"; ?>
          </span>
        </div>
        <div class="ImageCaptionField">
          <caption><?= strip_tags($caption) ?></caption>
        </div>
        <div class="ArtworksButton">
          <button class="deleteButton" onclick="location.href='delete.php?id=<?= $id ?>';">削除</button>
        </div>
        <button onclick="location.href='Home.php'">戻る</button>
      </div>
      <div class="comment">
        <p class="commentTitle">コメント</p>
        <ul>
          <?php for ($i = 0; $i < $cntCom; $i++) { ?>
            <li><?= strip_tags($data['comments'][$i]['comment']) ?></li>
          <?php } ?>
        </ul>
        <div class="submitComment">
          <form action="Comment.php?id=<?= $_GET['id']; ?>" method="post" enctype="multipart/form-data">
            <textarea name="comment" id="comment" cols="40" rows="10"></textarea>
            <button type="submit" name="submit">送信</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>