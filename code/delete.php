<?php  include('./db_con.php');

$sql = 'DELETE FROM images WHERE image_id = :image_id';
$sth = $db->prepare($sql);
$sth->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$sth->execute();

header('Location:' . 'Home.php',true,303);
exit();
?>