<?php
    $dbname = 'mysql:host=localhost;dbname=pixiv_ish;charset=utf8;';
    $username ='root';
    // $pass = 'admin';
    
    try{
        $db = new PDO($dbname,$username);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "データベース接続エラー:".$e->getMessage();
    }
?>