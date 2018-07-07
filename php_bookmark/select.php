<?php
session_start();

//0. 外部ファイル読み込み
include("functions.php");
chk_ssid();

//1. DB接続
$pdo = db_con();

//2. データ登録SQL作成
$stmt = $pdo -> prepare("SELECT * FROM gs_an_table");
$status = $stmt -> execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p>';
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= h($result["name"])."[".h($result["indate"])."]";
    $view .= '</a> ';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>フリーアンケート表示</title>
</head>
<body id="main">

<header>
    <nav>
    <div></div>
    <?php echo $_SESSION["name"];?>さんこんにちは。
    <?php if($_SESSION["kanri_flg"]==0){ ?>
    <a href="index.php">データ登録</a>
    <?php }?>
    <a href="logout.php">LOGOUT</a>
    </nav>
</header>

<div><?= $view?></div>

</body>
</html>
