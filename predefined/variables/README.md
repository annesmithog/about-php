# 定義済みの変数

## 目次

- [$GLOBALS](#globals) - グローバルスコープで使用可能なすべての変数への参照
- [$_SERVER](#_server) - サーバー情報および実行時の環境情報
- [$_GET](#_get) - クエリストリング変数
- [$_POST](#_post) - HTTP POST リクエストから得られるフォームデータ
- [$_FILES](#_files) - HTTP ファイルアップロード変数
- [$_REQUEST](#_request) - HTTP リクエスト変数
- [$_SESSION](#_session) - セッション変数
- [$_ENV](#_env) - 環境変数
- [$_COOKIE](#_cookie) - HTTP クッキー
- [$php_errormsg](#php_errormsg) - 直近のエラーメッセージ
- [$http_response_header](#http_response_header) - HTTP レスポンスヘッダ
- [$argc](#argc) - スクリプトに渡された引数の数
- [$argv](#argv) - スクリプトに渡された引数の配列

## $GLOBALS

グローバルスコープで使用可能なすべての変数への参照

```php
function test() {
    $x = "ローカル変数";
    echo 'グローバルスコープの$x: ' . $GLOBALS["x"] . PHP_EOL;
    echo '現在のスコープの$x: ' . $x . PHP_EOL;
}

$x = "グローバル変数";
test();
/*
グローバルスコープの$x: グローバル変数
現在のスコープの$x: ローカル変数
*/
```

[目次に戻る](#目次)

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

[目次に戻る](#目次)

## $_GET

クエリストリング変数

```php
echo htmlspecialchars($_GET["id"]) . PHP_EOL;
```

[目次に戻る](#目次)

## $_POST

HTTP POST リクエストから得られるフォームデータ

```php
echo htmlspecialchars($_POST["id"]) . PHP_EOL;
```

[目次に戻る](#目次)

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

![alt](/predefined/variables/img_variables1.png)

2. アップロード後

```php
<h1>アップロード後</h1>
<p>ファイル名:      <?= $_FILES["fin_img"]["name"] ?></p>
<p>ファイル形式:    <?= $_FILES["fin_img"]["type"] ?></p>
<p>ファイルサイズ:  <?= $_FILES["fin_img"]["size"] ?></p>
<p>tmpファイル:     <?= $_FILES["fin_img"]["tmp_name"] ?></p>
<p>エラー情報:      <?= $_FILES["fin_img"]["error"] ?></p>
```

![alt](/predefined/variables/img_variables2.png)

[目次に戻る](#目次)

## $_REQUEST

HTTP リクエスト変数

[目次に戻る](#目次)

## $_SESSION

セッション変数

[目次に戻る](#目次)

## $_ENV

環境変数

[目次に戻る](#目次)

## $_COOKIE

HTTP クッキー

[目次に戻る](#目次)

## $php_errormsg

直近のエラーメッセージ

[目次に戻る](#目次)

## $http_response_header

HTTP レスポンスヘッダ

[目次に戻る](#目次)

## $argc

スクリプトに渡された引数の数

[目次に戻る](#目次)

## $argv

スクリプトに渡された引数の配列

[目次に戻る](#目次)
