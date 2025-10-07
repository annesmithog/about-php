# 配列関数

## 目次

[基本](#基本)
- [array](#array) - 配列を生成する
- [list](#list) - 複数の変数への代入を行う
- [array_keys](#array_keys) - 配列の全てのキーまたはその一部を返す
- [array_values](#array_values) - 配列の全ての値を返す
- [array_key_first](#array_key_first) - 配列の最初のキーを得る
- [array_key_last](#array_key_last) - 配列の最後のキーを得る
- [array_key_exists](#array_key_exists) - 指定したキーまたは添字が配列にあるかどうか調べる
- [key_exists](#key_exists) - `array_key_exists`のエイリアス
- [in_array](#in_array) - 配列に値があるか調べる
- [array_is_list](#array_is_list) - 指定された配列がリストかどうか調べる
- [compact](#compact) - 変数名とその値から配列を作成する
- [range](#range) - ある範囲の要素を含む配列を作成する
--------------------------------------------------------------------------------------------------
[検索／判定](#検索判定)
- [array_search](#array_search) - 指定した値で配列を検索し、見つかった場合対応する最初のキーを返す
- [array_find](#array_find) - コールバック関数を満たす最初の要素を返す
- [array_find_key](#array_find_key) - コールバック関数を満たす最初の要素のキーを返す
- [array_column](#array_column) - 入力配列から単一のカラムの値を返す
- [array_unique](#array_unique) - 配列から重複した値を削除する
- [array_filter](#array_filter) - 配列の要素をコールバック関数でフィルタリングする
- [array_all](#array_all) - 配列の全ての要素がコールバック関数を満たすかどうか調べる
- [array_any](#array_any) - 配列のいずれかの要素がコールバック関数を満たすかどうか調べる
--------------------------------------------------------------------------------------------------
[編集](#編集)
- [array_pop](#array_pop) - 配列の末尾から要素を取り除く
- [array_push](#array_push) - 配列の末尾に一つ以上の要素を追加する
- [array_shift](#array_shift) - 配列の先頭から要素を取り出す
- [array_unshift](#array_unshift) - 配列の先頭に一つ以上の要素を追加する
- [array_merge](#array_merge) - 一つまたは複数の配列をマージする
- [array_merge_recursive](#array_merge_recursive) - 一つ以上の配列を再起的にマージする
- [array_replace](#array_replace) - 配列の要素を置換する
- [array_replace_recursive](#array_replace_recursive) - 配列の要素を再起的に置換する
- [array_splice](#array_splice) - 配列の一部を削除し、他の要素で置換する
--------------------------------------------------------------------------------------------------
[変換／整形](#変換整形)
- [array_reverse](#array_reverse) - 要素を逆順にした配列を返す
- [array_slice](#array_slice) - 配列の一部を展開する
- [array_chunk](#array_chunk) - 配列を分割する
- [array_combine](#array_combine) - 一方の配列をキーとして、もう一方の配列を値として、ひとつの配列を生成する
- [array_pad](#array_pad) - 指定長に指定した値で配列を埋める
- [array_fill](#array_fill) - 指定した値で配列を埋める
- [array_fill_keys](#array_fill_keys) - キーを指定して配列を埋める
- [array_change_key_case](#array_change_key_case) - 配列の全てのキーの大文字小文字を変更する
- [array_flip](#array_flip) - 配列のキーと値を反転する
- [array_map](#array_map) - 配列の要素にコールバック関数を適用する
- [array_walk](#array_walk) - 配列の全要素にユーザー定義関数を適用する
- [array_reduce](#array_reduce) - コールバック関数を繰り返し配列に適用し、配列を一つの値にまとめる
--------------------------------------------------------------------------------------------------
[集計／計算](#集計計算)
- [count](#count) - 全ての要素の数
- [sizeof](#sizeof) - `count`のエイリアス
- [array_sum](#array_sum) - 配列の値の合計
- [array_product](#array_product) - 配列の値の積
- [array_count_values](#array_count_values) - 配列の異なる値の出現回数
--------------------------------------------------------------------------------------------------
[ポインタ](#ポインタ)
- [key](#key) - 配列からキーを取り出す
- [prev](#prev) - 配列の内部ポインタをひとつ前に戻す
- [current](#current) - 現在、配列の内部ポインタが指している要素を返す
- [pos](#current) - `current`のエイリアス
- [next](#next) - 配列の内部ポインタを進める
- [reset](#reset) - 配列の内部ポインタを先頭の要素にセットする
- [end](#end) - 配列の内部ポインタを末尾の要素にセットする
--------------------------------------------------------------------------------------------------
[ソート](#ソート)
- [ksort](#ksort) - 配列をキーで昇順にソート
- [krsort](#krsort) - 配列をキーで降順にソート
- [asort](#asort) - 連想キーと要素の関係を維持しつつ配列を昇順にソート
- [arsort](#arsort) - 連想キーと要素の関係を維持しつつ配列を降順にソート
- [sort](#sort) - 配列を昇順にソート
- [rsort](#rsort) - 配列を降順にソート
- [natsort](#natsort) - "自然順"アルゴリズムで配列をソート
- [natcasesort](#natcasesort) - "自然順"アルゴリズムを用いて配列をソート (大文字小文字区別なし)
- [array_multisort](#array_multisort) - 複数または多次元の配列をソート
<!-- 
[差／共通項](#差共通項)
- [array_diff](#array_diff) - 配列の差を計算する
- [array_diff_key](#array_diff_key) - キーを基準にして、配列の差を計算する
- [array_diff_ukey](#array_diff_ukey) - キーを基準にしてコールバック関数を使用し、配列の差を計算する
- [array_diff_assoc](#array_diff_assoc) - 配列の添字を用いて、配列の差を計算する
- [array_diff_uassoc](#array_diff_uassoc) - 配列の添字を用いてコールバック関数を使用し、配列の差を計算する
- [array_intersect](#array_intersect) - 配列の共通項を計算する
- [array_intersect_key](#array_intersect_key) - キーを基準にして、配列の共通項を計算する
- [array_intersect_ukey](#array_intersect_ukey) - キーを基準にしてコールバック関数を使用し、配列の共通項を計算する
- [array_intersect_assoc](#array_intersect_assoc) - 配列の添字を用いて、配列の共通項を計算する
- [array_intersect_uassoc](#array_intersect_uassoc) - 配列の添字を用いてコールバック関数を使用し、配列の共通項を計算する
- [array_udiff](#array_udiff) - データの比較にコールバック関数を使用し、配列の差を計算する
- [array_udiff_assoc](#array_udiff_assoc) - データの比較にコールバック関数を使用し、配列の添字を用いて配列の差を計算する
- [array_udiff_uassoc](#array_udiff_uassoc) - データと添字の比較にコールバック関数を使用し、追加された配列の添字を用いて配列の差を計算する
- [array_uintersect](#array_uintersect) - データの比較にコールバック関数を使用し、配列の共通項を計算する
- [array_uintersect_assoc](#array_uintersect_assoc) - データの比較にコールバック関数を使用し、追加された配列の添字を用いて配列の共通項を計算する
- [array_uintersect_uassoc](#array_uintersect_uassoc) - データと添字の比較にコールバック関数を使用し、追加された配列の添字を用いて配列の共通項を計算する 
-->

<!-- 
[特殊](#特殊)
- [array_rand](#array_rand) - 配列から一つ以上のキーをランダムに取得する
- [shuffle](#shuffle) - 配列をシャッフルする
- [extract](#extract) - 配列からシンボルテーブルに変数をインポートする 
-->

[⬆︎目次トップに戻る](#目次)

## 基本

<a name="array"></a>

`array(mixed ...$values): array` - 配列を生成する
```php
$arr = array("one", "two", "three");
```

<a name="list"></a>

`list(mixed $var, mixed ...$vars = ?): array` - 複数の変数への代入を行う
```php
$arr = ["one", "two", "three"];
list($x, $y, $z) = $arr;
```

<a name="array_keys"></a>

`array_keys(array $array): array` - 配列の全てのキーまたはその一部を返す
```php
$arr1 = [3 => "x", "y", "z"];
$arr2 = array_keys($arr1);
var_export($arr2);  // array (0 => 3, 1 => 4, 2 => 5)
```

<a name="array_values"></a>

`array_values(array $array): array` - 配列の全ての値を返す
```php
$arr1 = ["one", "two", "three"];
$arr2 = array_values($arr1);
var_export($arr2); // array (0 => 'one', 1 => 'two', 2 => 'three')
```

<a name="array_key_first"></a>

`array_key_first(array $array): int|string|null` - 配列の最初のキーを得る
```php
$arr = [3 => "one", "two", "three"];
$firstKey = array_key_first($arr);
var_export($firstKey);  // 3
```

<a name="array_key_last"></a>

`array_key_last(array $array): int|string|null` - 配列の最後のキーを得る
```php
$arr = [3 => "one", "two", "three"];
$lastKey = array_key_last($arr);
var_export($lastKey);   // 5
```

<a name="array_key_exists"></a>

`array_key_exists(string|int|float|bool|resource|null $key, array $array): bool` - 指定したキーまたは添字が配列にあるかどうか調べる
```php
$arr = ["one" => 1, "two" => 2];
echo var_export(array_key_exists("two", $arr)) . PHP_EOL;      // true
echo var_export(array_key_exists("three", $arr)) . PHP_EOL;    // false
```

<a name="key_exists"></a>

key_exists - `array_key_exists`のエイリアス

<a name="in_array"></a>

`in_array(mixed $needle, array $haystack, bool $strict = false): bool` - 配列に値があるか調べる
```php
$arr = [10, 20, 30];
echo var_export(in_array(10, $arr)) . PHP_EOL;  // true
echo var_export(in_array(11, $arr)) . PHP_EOL;  // false
```

<a name="array_is_list"></a>

`array_is_list(array $array): bool` - 指定された配列がリストかどうか調べる
```php
echo var_export(array_is_list([])) . PHP_EOL;               // true
echo var_export(array_is_list([10, 20])) . PHP_EOL;         // true
echo var_export(array_is_list([0=>"a", 1=>"b"])) . PHP_EOL; // true
echo var_export(array_is_list([1=>"b", 0=>"a"])) . PHP_EOL; // false
echo var_export(array_is_list([0=>"a", 2=>"c"])) . PHP_EOL; // false
```

<a name="compact"></a>

`compact(array|string $var_name, array|string ...$var_names): array` - 変数名とその値から配列を作成する
```php
$firstName = "Anne";
$lastName = "Smith";

$name = ["firstName", "lastName"];
$age = 20;

$result = compact($name, "age");
var_export($result);    // array('firstName' => 'Anne', 'lastName' => 'Smith', 'age' => 20)
```

<a name="range"></a>

`range(string|int|float $start, string|int|float $end, int|float $step = 1): array` - ある範囲の要素を含む配列を作成する
```php
$arr = range(0, 50, 10);
var_export($arr);   // array(0 => 0, 1 => 10, 2 => 20, 3 => 30, 4 => 40, 5 => 50)
```

[⬆︎目次に戻る](#目次)

## 検索／判定

<a name="array_search"></a>

`array_search(mixed $needle, array $haystack, bool $strict = false): int|string|false` - 指定した値で配列を検索し、見つかった場合対応する最初のキーを返す
```php
$arr = ["one", "two", "three"];
echo var_export(array_search("two", $arr)) . PHP_EOL;   // 1
echo var_export(array_search("four", $arr)) . PHP_EOL;  // false
```

<a name="array_find"></a>

`array_find(array $array, callable $callback): mixed` - コールバック関数を満たす最初の要素を返す
```php
function is_z($value) {
    return $value === "z";
}

$arr = ["x", "y", "z"];
echo array_find($arr, "is_z");  // "z"
```

<a name="array_find_key"></a>

`array_find_key(array $array, callable $callback): mixed` - コールバック関数を満たす最初の要素のキーを返す
```php
function is_z($value) {
    return $value === "z";
}

$arr = ["x", "y", "z"];
echo array_find_key($arr, "is_z");  // 2
```

<a name="array_column"></a>

`array_column(array $array, int|string|null $column_key, int|string|null $index_key = null): array` - 入力配列から単一のカラムの値を返す
```php
$persons = [
    ["id" => 1, "name" => "John"],
    ["id" => 4, "name" => "Paul"],
    ["id" => 6, "name" => "Anne"],
];

$names = array_column($persons, "name");
var_export($names);    // array(0 => 'John', 1 => 'Paul', 2 => 'Anne')
```

<a name="array_unique"></a>

`array_unique(array $array, int $flags = SORT_STRING): array` - 配列から重複した値を削除する
```php
$arr1 = [1, 1, 2, 3, 4, 2];
$arr2 = array_unique($arr1);
var_export($arr2);  // array(0 => 1, 2 => 2, 3 => 3, 4 => 4)
```

<a name="array_filter"></a>

`array_filter(array $array, ?callable $callback = null, int $mode = 0): array` - 配列の要素をコールバック関数でフィルタリングする
```php
function even($value) {
    return !($value & 1);
}

$arr1 = [0, 5, 10, 15, 20];
$arr2 = array_filter($arr1, "even");
var_export($arr2);  // array(0 => 0, 2 => 10, 4 => 20)
```

<a name="array_all"></a>

`array_all(array $array, callable $callback): bool` - 配列の全ての要素がコールバック関数を満たすかどうか調べる
```php
function even($value) {
    return !($value & 1);
}

$result1 = array_all([0, 2], "even");
echo var_export($result1) . PHP_EOL;    // true
$result2 = array_all([1, 2], "even");
echo var_export($result2) . PHP_EOL;    // false
```

<a name="array_any"></a>

`array_any(array $array, callable $callback): bool` - 配列のいずれかの要素がコールバック関数を満たすかどうか調べる
```php
function even($value) {
    return !($value & 1);
}

$result1 = array_any([0, 2], "even");
echo var_export($result1) . PHP_EOL;    // true
$result2 = array_any([1, 3], "even");
echo var_export($result2) . PHP_EOL;    // false
```

[⬆︎目次に戻る](#目次)

## 編集

<a name="array_pop"></a>

`array_pop(array &$array): mixed` - 配列の末尾から要素を取り除く
```php
$arr = ["A", "B", "C"];
$x = array_pop($arr);
echo $x;    // "C"
```

<a name="array_push"></a>

`array_push(array &$array, mixed ...$values): int` - 配列の末尾に一つ以上の要素を追加する
```php
$arr = ["A", "B", "C"];
array_push($arr, "D", "E");
var_export($arr);   // array(0 => 'A', 1 => 'B', 2 => 'C', 3 => 'D', 4 => 'E')
```

<a name="array_shift"></a>

`array_shift(array &$array): mixed` - 配列の先頭から要素を取り出す
```php
$arr = ["A", "B", "C"];
$x = array_shift($arr);
echo $x;    // "A"
```

<a name="array_unshift"></a>

`array_unshift(array &$array, mixed ...$values): int` - 配列の先頭に一つ以上の要素を追加する
```php
$arr = ["A", "B", "C"];
array_unshift($arr, "X", "Y", "Z");
var_export($arr);   // array(0 => 'X', 1 => 'Y', 2 => 'Z', 3 => 'A', 4 => 'B', 5 => 'C')
```

<a name="array_merge"></a>

`array_merge(array ...$arrays): array` - 一つまたは複数の配列をマージする
```php
$arr1 = ["first" => "A", "B"];
$arr2 = ["second" => "C", "D"];
$arr3 = array_merge($arr1, $arr2);
var_export($arr3);  // array('first' => 'A', 0 => 'B', 'second' => 'C', 1 => 'D')
```

<a name="array_merge_recursive"></a>

`array_merge_recursive(array ...$arrays): array` - 一つ以上の配列を再起的にマージする
```php
$arr1 = ["color" => ["RED", "BLUE"], "A"];
$arr2 = ["color" => ["GREEN"], "B"];
$arr3 = array_merge_recursive($arr1, $arr2);
var_export($arr3);  // array('color' => array(0 => 'RED', 1 => 'BLUE', 2 => 'GREEN'), 0 => 'A', 1 => 'B')
```

<a name="array_replace"></a>

`array_replace(array $array, array ...$replacements): array` - 配列の要素を置換する
```php
$arr = ["A", "B", "C"];
$replacements1 = [0 => "AA", 3 => "DD"];
$replacements2 = [0 => "AAA"];
$result = array_replace($arr, $replacements1, $replacements2);
var_export($result);    // array(0 => 'AAA', 1 => 'B', 2 => 'C', 3 => 'DD')
```

<a name="array_replace_recursive"></a>

`array_replace_recursive(array $array, array ...$replacements): array` - 配列の要素を再起的に置換する
```php
$arr = ["colors" => [0 => "red", 1 => "blue"], "A", "B"];
$replacements = ["colors" => [0 => "yellow", 2 => "cian"]];
$result = array_replace_recursive($arr, $replacements);
var_export($result);    // array('colors' => array(0 => 'yellow', 1 => 'blue', 2 => 'cian'), 0 => 'A', 1 => 'B')
```

<a name="array_splice"></a>

`array_splice(array &$array, int $offset, ?int $length = null, mixed $replacement = []): array` - 配列の一部を削除し、他の要素で置換する
```php
$arr = ["A", "B", "C", "D"];
array_splice($arr, 2);
var_export($arr);      // array(0 => 'C', 1 => 'D')

$arr = ["A", "B", "C", "D"];
array_splice($arr, 1, -1);
var_export($arr);       // array(0 => 'A', 1 => 'D')
```

[⬆︎目次に戻る](#目次)

## 変換／整形

<a name="array_reverse"></a>

`array_reverse(array $array, bool $preserve_keys = false): array` - 要素を逆順にした配列を返す
```php
$arr = ["A", "B", ["X", "Y", "Z"]];
var_export(array_reverse($arr));        // array(0 => array(0 => 'X', 1 => 'Y', 2 => 'Z'), 1 => 'B', 2 => 'A')
var_export(array_reverse($arr, true));  // array(2 => array(0 => 'X', 1 => 'Y', 2 => 'Z'), 1 => 'B', 0 => 'A')
```

<a name="array_slice"></a>

`array_slice(array $array, int $offset, ?int $length = null, bool $preserve_keys = false): array` - 配列の一部を展開する
```php
$arr = [10, 20, 30];
var_export(array_slice($arr, 2));       // array(0 => 30)
var_export(array_slice($arr, -2, 1));   // array(0 => 20)
var_export(array_slice($arr, 0, 3));    // array(0 => 10, 1 => 20, 2 => 30)
```

<a name="array_chunk"></a>

`array_chunk(array $array, int $length, bool $preserve_keys = false): array` - 配列を分割する
```php
$arr = ["A", "B", "C", "D"];
var_export(array_chunk($arr, 2));       // array(0 => array(0 => 'A', 1 => 'B'), 1 => array(0 => 'C', 1 => 'D'))
var_export(array_chunk($arr, 2, true)); // array(0 => array(0 => 'A', 1 => 'B'), 1 => array(2 => 'C', 3 => 'D'))
```

<a name="array_combine"></a>

`array_combine(array $keys, array $values): array` - 一方の配列をキーとして、もう一方の配列を値として、ひとつの配列を生成する
```php
$arr1 = ["A", "B", "C"];
$arr2 = ["X", "Y", "Z"];
$result = array_combine($arr1, $arr2);
var_export($result);    // array('A' => 'X', 'B' => 'Y', 'C' => 'Z')
```

<a name="array_pad"></a>

`array_pad(array $array, int $length, mixed $value): array` - 指定長に指定した値で配列を埋める
```php
$arr = ["A", "B", "C"];
$result = array_pad($arr, 5, "Z");
var_export($result);    // array(0 => 'A', 1 => 'B', 2 => 'C', 3 => 'Z', 4 => 'Z')
```

<a name="array_fill"></a>

`array_fill(int $start_index, int $count, mixed $value): array` - 指定した値で配列を埋める
```php
$arr = array_fill(1, 3, "Test");
var_export($arr);   // array(1 => 'Test', 2 => 'Test', 3 => 'Test')
```

<a name="array_fill_keys"></a>

`array_fill_keys(array $keys, mixed $value): array` - キーを指定して配列を埋める
```php
$arr = ["a", "b", "c", "d"];
$result = array_fill_keys($arr, "Test");
var_export($result);    // array('a' => 'Test', 'b' => 'Test', 'c' => 'Test', 'd' => 'Test')
```

<a name="array_change_key_case"></a>

`array_change_key_case(array $array, int $case = CASE_LOWER): array` - 配列の全てのキーの大文字小文字を変更する
```php
$arr = ["One" => 1, "Two" => 2];
$result1 = array_change_key_case($arr, CASE_LOWER);
var_export($result1);   // array('one' => 1, 'two' => 2)
$result2 = array_change_key_case($arr, CASE_UPPER);
var_export($result2);   // array('ONE' => 1, 'TWO' => 2)
```

<a name="array_flip"></a>

`array_flip(array $array): array` - 配列のキーと値を反転する
```php
$arr = [0 => "A", 1 => "B", "x" => "C"];
$result = array_flip($arr);
var_export($result);    // array('A' => 0, 'B' => 1, 'C' => 'x')
```

<a name="array_map"></a>

`array_map(?callable $callback, array $array, array ...$arrays): array` - 配列の要素にコールバック関数を適用する
```php
function plus_one($value) {
    return $value + 1;
}

$arr = [10, 20, 30];
$result = array_map("plus_one", $arr);
var_export($result);    // array(0 => 11, 1 => 21, 2 => 31)
```

<a name="array_walk"></a>

`array_walk(array|object &$array, callable $callback, mixed $arg = null): true` - 配列の全要素にユーザー定義関数を適用する
```php
function plus_one(&$value) {
    $value += 1;
}

$arr = [10, 20, 30];
array_walk($arr, "plus_one");
var_export($arr);    // array(0 => 11, 1 => 21, 2 => 31)
```

<a name="array_reduce"></a>

`array_reduce(array $array, callable $callback, mixed $initial = null): mixed` - コールバック関数を繰り返し配列に適用し、配列を一つの値にまとめる
```php
function sum($value1, $value2) {
    return $value1 + $value2;
}

$arr = [10, 20, 30];
$result = array_reduce($arr, "sum");
echo $result;   // 60
```

[⬆︎目次に戻る](#目次)

## 集計／計算

<a name="count"></a>

`count(Countable|array $value, int $mode = COUNT_NORMAL): int` - 全ての要素の数
```php
$arr = [10, 20, 30];
echo count($arr);   // 3
```

<a name="sizeof"></a>

sizeof - `count`のエイリアス

<a name="array_sum"></a>

`array_sum(array $array): int|float` - 配列の値の合計
```php
$arr = [10, 20, 30];
echo array_sum($arr);   // 60
```

<a name="array_product"></a>

`array_product(array $array): int|float` - 配列の値の積
```php
$arr = [1, 3, 5];
echo array_product($arr);   // 15
```

<a name="array_count_values"></a>

`array_count_values(array $array): array` - 配列の異なる値の出現回数
```php
$arr = ["a", "b", "c", "c", "a", "c"];
$result = array_count_values($arr);
var_export($result);    // array('a' => 2, 'b' => 1, 'c' => 3)
```

[⬆︎目次に戻る](#目次)

## ポインタ

<a name="key"></a>

`key(array|object $array): int|string|null` - 配列からキーを取り出す
```php
$arr = ["one" => 1, "two" => 2, "three" => 3];
echo key($arr); // "one"
```

<a name="current"></a>

`current(array|object $array): mixed` - 現在、配列の内部ポインタが指している要素を返す
```php
$arr = ["one" => 1, "two" => 2, "three" => 3];
echo current($arr); // 1
```

<a name="pos"></a>

pos - `current`のエイリアス

<a name="next"></a>

`next(array|object &$array): mixed` - 配列の内部ポインタを進める
```php
$arr = ["one" => 1, "two" => 2, "three" => 3];
echo current($arr) . PHP_EOL;  // 1
next($arr);
echo current($arr) . PHP_EOL;  // 2
```

<a name="prev"></a>

`prev(array|object &$array): mixed` - 配列の内部ポインタをひとつ前に戻す
```php
$arr = ["one" => 1, "two" => 2, "three" => 3];
echo current($arr) . PHP_EOL;  // 1
next($arr);
echo current($arr) . PHP_EOL;  // 2
prev($arr);
echo current($arr) . PHP_EOL;  // 1
```

<a name="reset"></a>

`reset(array|object &$array): mixed` - 配列の内部ポインタを先頭の要素にセットする
```php
$arr = ["one" => 1, "two" => 2, "three" => 3];
next($arr);
echo current($arr) . PHP_EOL;   // 2
reset($arr);
echo current($arr) . PHP_EOL;   // 1
```

<a name="end"></a>

`end(array|object &$array): mixed` - 配列の内部ポインタを末尾の要素にセットする
```php
$arr = ["one" => 1, "two" => 2, "three" => 3];
end($arr);
echo current($arr) . PHP_EOL;   // 3
```

[⬆︎目次に戻る](#目次)

## ソート

<a name="ksort"></a>

`ksort(array &$array, int $flags = SORT_REGULAR): true` - 配列をキーで昇順にソート
```php
$arr = ["b" => 1, "c" => 2, "a" => 3];
ksort($arr);
var_export($arr);   // array('a' => 3, 'b' => 1, 'c' => 2)
```

<a name="krsort"></a>

`krsort(array &$array, int $flags = SORT_REGULAR): true` - 配列をキーで降順にソート
```php
$arr = ["b" => 1, "c" => 2, "a" => 3];
krsort($arr);
var_export($arr);   // array('c' => 2, 'b' => 1, 'a' => 3)
```

<a name="asort"></a>

`asort(array &$array, int $flags = SORT_REGULAR): true` - 連想キーと要素の関係を維持しつつ配列を昇順にソート
```php
$arr = ["a" => "DDD", "b" => "CCC", "c" => "BBB", "d" => "AAA"];
asort($arr);
var_export($arr);   // array('d' => 'AAA', 'c' => 'BBB', 'b' => 'CCC', 'a' => 'DDD')
```

<a name="arsort"></a>

`arsort(array &$array, int $flags = SORT_REGULAR): true` - 連想キーと要素の関係を維持しつつ配列を降順にソート
```php
$arr = ["d" => "AAA", "c" => "BBB", "b" => "CCC", "a" => "DDD"];
arsort($arr);
var_export($arr);   // array('a' => 'DDD', 'b' => 'CCC', 'c' => 'BBB', 'd' => 'AAA')
```

<a name="sort"></a>

`sort(array &$array, int $flags = SORT_REGULAR): true` - 配列を昇順にソート
```php
$arr = [20, 10, 30];
sort($arr);
var_export($arr);   // array(0 => 10, 1 => 20, 2 => 30)
```

<a name="rsort"></a>

`rsort(array &$array, int $flags = SORT_REGULAR): true` - 配列を降順にソート
```php
$arr = [20, 10, 30];
rsort($arr);
var_export($arr);   // array(0 => 30, 1 => 20, 2 => 10)
```

<a name="natsort"></a>

`natsort(array &$array): true` - "自然順"アルゴリズムで配列をソート
```php
$arr = ["img12", "IMG2", "img1"];
natsort($arr);
var_export($arr);  // array (1 => 'IMG2', 2 => 'img1', 0 => 'img12')
```

<a name="natcasesort"></a>

`natcasesort(array &$array): true` - "自然順"アルゴリズムを用いて配列をソート (大文字小文字区別なし)
```php
$arr = ["img12", "IMG2", "img1"];
natcasesort($arr);
var_export($arr);  // array(2 => 'img1', 1 => 'IMG2', 0 => 'img12')
```

<a name="array_multisort"></a>

`array_multisort(array &$array1, mixed $array1_sort_order = SORT_ASC, mixed $array1_sort_flags = SORT_REGULAR, mixed ...$rest): bool` - 複数または多次元の配列をソート
```php
$arr1 = [40, 30, 20, 10];
$arr2 = [100, 200, 300, 400];
array_multisort($arr1, $arr2);
var_export($arr1);  // array(0 => 10, 1 => 20, 2 => 30, 3 => 40)
var_export($arr2);  // array(0 => 400, 1 => 300, 2 => 200, 3 => 100)
```

[⬆︎目次に戻る](#目次)
