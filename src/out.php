<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>アップロード後</h1>
    <p>ファイル名:      <?= $_FILES["fin_img"]["name"] ?></p>
    <p>ファイル形式:    <?= $_FILES["fin_img"]["type"] ?></p>
    <p>ファイルサイズ:  <?= $_FILES["fin_img"]["size"] ?></p>
    <p>tmpファイル:     <?= $_FILES["fin_img"]["tmp_name"] ?></p>
    <p>エラー情報:      <?= $_FILES["fin_img"]["error"] ?></p>
    
</body>
</html>