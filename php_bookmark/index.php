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
        <div><a href="select.php">データ一覧</a></div>
    </nav>
</header>
    
<form method ="post" action="insert.php" enctype="multipart/form-data"></form>
<fieldset>
    <legend>ブックマーク</legend>
    <label>書籍名: <input type="text" name="name"></label><br>
    <label>URL: <input type="text" name="url"></label><br>
    <label><textArea name ="naiyou" rows = "4" cols ="40"></textArea></label><br>
    <input type="file" name="upfile"><br>
    <input type="submit" value="送信"><br>
</fieldset>
</form>

</body>
</html>