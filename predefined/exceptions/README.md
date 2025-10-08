# 定義済みの例外

Exception
- `Exception` - 全てのユーザー例外の基底クラス
- `ErrorException` - エラー例外
- `ClosedGeneratorException` - 閉じられたGeneratorから値を取得しようとした場合にスローされる例外
- `RequestParseBodyException` - `request_parse_body()`内でリクエストボディが無効な場合にスローされる例外
--------------------------------------------------------------------------------------------------
Error
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
