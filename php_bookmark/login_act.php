<?php
session_start();

include("functions.php");

//1. DB接続
$pdo = db_con();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//2. データ登録SQL作成
$stmt = $pdo -> prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw = :lpw AND life_flg = 0");
$stmt -> bindValue('lid', $lid);
$stmt -> bindValue('lpw', $lpw);
$res = $stmt -> execute();

//3. SQL実行時にエラーがある場合
if($res==false){
    QueryError($stmt);
}

//4. 抽出データを取得
$val =$stmt-> fetch();

//5. 該当レコードがあればSESSIONに値を代入
if($val["id"] != ""){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"] = $val['name'];
    header("Location: select.php");
} else{
    header("Location: login.php");
    echo("error");
}

exit();
?>
