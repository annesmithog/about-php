# 定義済み

## 目次

- 変数
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
- 例外
    - `Exception` - 全てのユーザー例外の基底クラス
    - `ErrorException` - エラー例外
    - `ClosedGeneratorException` - 閉じられたGeneratorから値を取得しようとした場合にスローされる例外
    - `RequestParseBodyException` - `request_parse_body()`内でリクエストボディが無効な場合にスローされる例外
    --------------------------------------------------------------------------------------------------
    - `Error` - 全ての内部エラーの基底クラス
    - `ArgumentCountError` - 渡された引数が少ない場合にスローされるエラー
    - `ArithmeticError` - 数学的な操作でエラーが発生した場合にスローされるエラー
    - `AssertionError` - `assert()`によるアサーションが失敗した場合にスローされるエラー
    - `DivisionByZeroError` - 数値をゼロで割ろうとした場合にスローされるエラー
    - `CompileError` - コンパイルエラーが起きた場合にスローされるエラー
    - `ParseError` - (`eval()`などで)PHPコードのパースに失敗した場合にスローされるエラー
    - `TypeError` - 型が一致しない場合にスローされるエラー
    - `ValueError` - 引数の方は正しいが値が正しくない場合にスローされるエラー
    - `UnhandledMatchError` - `match`がどの分岐でも処理できなかった場合にスローされるエラー
    - `FiberError` - `Fiber`に対して不正な操作が行われた場合にスローされるエラー
- インターフェース／クラス
    - `Traversable` - クラスの中身が`foreach`を使用して辿れるか検出するためのインターフェース
    - `Iterator` - 外部イテレータあるいはオブジェクト自身から反復処理を行うためのインターフェース
    - `IteratorAggregate` - 外部イテレータを作成するためのインターフェース
    - `Throwable` - `throw`でスロー可能なあらゆるオブジェクトが実装する基底インターフェース
    - `Countable` - `count()`関数を使用できるようにするインターフェース
    - `ArrayAccess` - 配列としてオブジェクトにアクセスするためのインターフェース
    - `Serializable` - 独自のシリアライズ用のインターフェース
    - `Stringable` - クラスが`__toString()`メソッドを持つことを示すインターフェース
    - `UnitEnum` - 全ての列挙型に対して自動的に適用するインターフェース
    - `BackedEnum` - `UnitEnum`に`from()`, `tryFrom()`を実装したインターフェース
    --------------------------------------------------------------------------------------------------
    - `InternalIterator` - 内部クラスが`IteratorAggregate`を実装しやすくするためのクラス
    - `Closure` - 無名関数を表すためのクラス
    - `stdClass` - 動的なプロパティが使える、汎用的な空のクラス
    - `Generator` - ジェネレータが返すオブジェクトのクラス
    - `Fiber` - 完全なスタックを持つ停止可能な関数を持つクラス
    - `WeakReference` - キャッシュの構造を実装しやすくするクラス
    - `WeakMap` - マップ用のクラス
    - `SensitiveParameterValue` - 秘密の値の公開を防ぐための値をラップするクラス
- アトリビュート
    - `Attribute` - アトリビュート
    - `AllowDynamicProperties` - 動的なプロパティを許可することをマークする
    - `Deprecated` - 機能を非推奨としてマークする
    - `Override` - オーバーライドしている意図あるいはインターフェースの実装を示す
    - `ReturnTypeWillChange` - 戻り値の型を宣言できない場合に追加することで警告を抑止する
    - `SensitiveParameter` - スタックトレース中に現れた場合に値を削除すべき秘密の値としてパラメータをマークする

[⬆︎目次トップに戻る](#目次)

## 定義済みの変数

### $_SERVER

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

### $_FILES

HTTP ファイルアップロード変数

1. アップロード前

```php
<h1>画像アップロード</h1>
<form method="post" action="out.php" enctype="multipart/form-data">
    <input type="file" name="fin_img">
    <input type="submit" value="送信">
</form>
```

![alt](/predefined/img/files_before.png)

2. アップロード後

```php
<h1>アップロード後</h1>
<p>ファイル名:      <?= $_FILES["fin_img"]["name"] ?></p>
<p>ファイル形式:    <?= $_FILES["fin_img"]["type"] ?></p>
<p>ファイルサイズ:  <?= $_FILES["fin_img"]["size"] ?></p>
<p>tmpファイル:     <?= $_FILES["fin_img"]["tmp_name"] ?></p>
<p>エラー情報:      <?= $_FILES["fin_img"]["error"] ?></p>
```

![alt](/predefined/img/files_after.png)

[⬆︎目次に戻る](#目次)