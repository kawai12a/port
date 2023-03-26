<?php

if (!empty($_GET['page'])) $page = $_GET['page'];
else $page = 1;
$ReqNum = 10;

$sql = 'SELECT * FROM images';
$stmt = $db->query($sql);
$Res = $stmt->rowCount();

$TotalPages = ceil($Res / $ReqNum)+1;

$startNum = ($page-1)*10;

$sql = "SELECT * FROM images ORDER BY created_at DESC LIMIT ".$startNum.",".$ReqNum."";

$stmt = $db->prepare($sql);
$stmt->execute();
$images = $stmt->fetchAll();

?>
