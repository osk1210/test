<?php
session_start();
include("functions.php");
chk_ssid();

//1. GETでidを取得
if(!isset($_GET["id"])){
    exit("Error");
}
$id = $_GET["id"];

//2. DB接続
$pdo = db_con();

//3. 
$stmt = $pdo -> prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt -> bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt -> execute();

if($status==false){
    queryError($stmt);
}else{
    $row = $stmt -> fetch();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POSTデータ登録</title>

</head>
<body>

<header>
    <nav>
        <div></div>
        <div><a href="select.php">ブックマーク一覧</a></div>
    </nav>
</header>
    
<form method ="post" action="update.php">
<fieldset>
    <legend>ブックマーク</legend>
    <label>書籍名: <input type="text" name="name" value="<?=$row["name"]?>"></label><br>
    <label>URL： <input type="text" name="url" value="<?=$row["url"]?>"></label><br>
    <label><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="送信"><br>
</fieldset>
</form>

</body>
</html>