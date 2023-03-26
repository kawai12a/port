<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title></title>
</head>

<body>
  <header>
  <div class="header">
    <div class="logos">
      <a href='Home.php'><img class='logo' src="./p.png" alt='が' /></a>
    </div>
    <form action="SearchRes.php" method="post" enctype="multipart/form-data">
    <div class="SearchField"><input type="search" name="word" class="Search" placeholder="作品を検索" /></div>
    </form>
    <section>
      <a href="postImage.php" class="postMig">投稿</a>
    </section>
  </div>
  </header>
</body>

</html>