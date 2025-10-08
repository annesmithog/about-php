# 定義済みの変数

## 目次

- `$GLOBALS` - グローバルスコープで使用可能なすべての変数への参照
- [$_SERVER](#_server) - サーバー情報および実行時の環境情報
- `$_GET` - クエリストリング変数
- `$_POST` - HTTP POST リクエストから得られるフォームデータ
- [$_FILES](#_files) - HTTP ファイルアップロード変数
- `$_REQUEST` - HTTP リクエスト変数
- `$_SESSION` - セッション変数
- `$_ENV` - 環境変数
- `$_COOKIE` - HTTP クッキー
- `$php_errormsg` - 直近のエラーメッセージ
- `$http_response_header` - HTTP レスポンスヘッダ
- `$argc` - スクリプトに渡された引数の数
- `$argv` - スクリプトに渡された引数の配列

## $_SERVER

サーバー情報および実行時の環境情報

- `DOCUMENT_ROOT`: ドキュメントルートディレクトリ
- `SERVER_ADDR`: サーバーのIPアドレス
- `SERVER_NAME`: サーバーのホスト名
- `REQUEST_METHOD`: リクエストのメソッド名 (例: `GET`, `POST`, `PUT`, `HEAD`)
- `QUERY_STRING`: 検索引数 (例: `?id=2&key=3`)

```php
<body>
Hello
<?php 
echo $_SERVER["DOCUMENT_ROOT"] . PHP_EOL;
?>
</body>
```

## $_FILES

HTTP ファイルアップロード変数

1. アップロード前

```php
<h1>画像アップロード</h1>
<form method="post" action="out.php" enctype="multipart/form-data">
    <input type="file" name="fin_img">
    <input type="submit" value="送信">
</form>
```

![alt](/predefined/variables/img/files_before.png)

2. アップロード後

```php
<h1>アップロード後</h1>
<p>ファイル名:      <?= $_FILES["fin_img"]["name"] ?></p>
<p>ファイル形式:    <?= $_FILES["fin_img"]["type"] ?></p>
<p>ファイルサイズ:  <?= $_FILES["fin_img"]["size"] ?></p>
<p>tmpファイル:     <?= $_FILES["fin_img"]["tmp_name"] ?></p>
<p>エラー情報:      <?= $_FILES["fin_img"]["error"] ?></p>
```

![alt](/predefined/variables/img/files_after.png)
