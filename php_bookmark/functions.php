<?php

//DB接続関数
function db_con(){
  $dbname = 'gs_db_dev10';
  try{
      $pdo = new PDO('mysql:dbname='.$dbname.';charset=utf8;host=localhost','root','');
  }  catch (PDOException $e){
      exit('DbConnectError:'.$e -> getMessage());
  }
  return $pdo;
}

//SQL処理エラー
function queryError($stmt){
    $eror = $stmt -> errorInfo();
    exit("QueryError:".$error[2]);
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function chk_ssid(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        exit("LOGIN ERROR");
    }else{
        session_regenerate_id(true);
        $_SESSION["chk_ssid"]=session_id();
    }
}

?>

