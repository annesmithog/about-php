# ArrayObject

## サンプル

```php
$receipt = new ArrayObject([
    "Apple" => 120,
    "Orange" => 80,
    "Banana" => 150,
]);

$receipt["Grape"] = 200;
unset($receipt["Orange"]);

$total = array_sum((array)$receipt);
echo "金額: {$total}円" . PHP_EOL;  // 金額: 470円
echo "-----------" . PHP_EOL;

foreach ($receipt as $item => $price) {
    echo "{$item}: {$price}円" . PHP_EOL;
}
echo "-----------" . PHP_EOL;

$receipt->asort();
foreach ($receipt as $item => $price) {
    echo "{$item}: {$price}円" . PHP_EOL;
}
```

## 目次

[定数](#定数)
- STD_PROP_LIST - 
- ARRAY_AS_PROPS - 
--------------------------------------------------------------------------------------------------
[メソッド](#メソッド)
- [__construct(array|object $array = [], int $flags = 0, string $iteratorClass = ArrayIterator::class)](#__construct) - 新規配列オブジェクトを生成する
- [append(mixed $value): void](#append) - 値を追加する
- [count(): int](#count) - publicプロパティの数を取得する
- [exchangeArray(array|object $array): array](#exchangeArray) - 配列を別の配列と交換する
- [getArrayCopy(): array](#getArrayCopy) - 配列を別の配列と交換する
- [offsetExists(mixed $key): bool](#offsetExists) - 要求されたインデックスが存在するかどうかを返す
- [offsetGet(mixed $key): mixed](#offsetGet) - 指定したインデックスの値を返す
- [offsetSet(mixed $key, mixed $value): void](#offsetSet) - 指定したインデックスに新しい値をセットする
- [offsetUnset(mixed $key): void](#offsetUnset) - 指定したインデックスの値を解除する
- [setFlags(int $flags): void](#setFlags) - 処理フラグを設定する
- [getFlags(): int](#getFlags) - 振る舞いのフラグを取得する
- [getIterator(): Iterator](#getIterator) - インスタンスから新規イテレータを生成する
- [getIteratorClass(): string](#getIteratorClass) - イテレータクラス名を取得する
- [setIteratorClass(string $iteratorClass): void](#setIteratorClass) - イテレータクラス名を設定する
- [asort(int $flags = SORT_REGULAR): true](#asort) - 値でエントリをソートする
- [ksort(int $flags = SORT_REGULAR): true](#ksort) - キーでエントリをソートする
- [natsort(): true](#natsort) - "自然順"アルゴリズムでエントリをソートする
- [natcasesort(): true](#natcasesort) - "自然順"アルゴリズムでエントリをソートする (大文字小文字区別なし)
- [uksort(callable $callback): true](#uksort) - ユーザー定義の比較関数を使って、キーでエントリをソートする
- [uasort(callable $callback): true](#uasort) - ユーザー定義の比較関数でエントリをソートし、キーとの対応は保持する
- [serialize(): string](#serialize) - シリアライズする
- [unserialize(string $data): void](#unserialize) - アンシリアライズする


[⬆︎目次トップに戻る](#目次)

## メソッド

<a name="__construct"></a>

`__construct(array|object $array = [], int $flags = 0, string $iteratorClass = ArrayIterator::class` - 新規配列オブジェクトを生成する
```php
$arrObj = new ArrayObject(["one", "two", "three"]);
```

<a name="append"></a>

`append(mixed $value): void` - 値を追加する
```php
$arrObj = new ArrayObject(["one", "two", "three"]);
$arrObj->append("four");
$arrObj->append("five");
```

<a name="count"></a>

`count(): int` - publicプロパティの数を取得する
```php
$arrObj = new ArrayObject(["one", "two", "three"]);
echo $arrObj->count();  // 3
```

<a name="exchangeArray"></a>

`exchangeArray(array|object $array): array` - 配列を別の配列と交換する
```php
$first = ["a" => 1, "b" => 2, "c" => 3, "d" => 4];
$last = ["x", "y", "z"];

$arrObj = new ArrayObject($first);
$old = $arrObj->exchangeArray($last);
print_r($old);      // a=>1, b=>2, c=>3, d=>4
print_r($arrObj);   // ArrayObject(x, y, z)
```

<a name="getArrayCopy"></a>

`getArrayCopy(): array` - 配列を別の配列と交換する
```php
$alphabets = ["a" => 1, "b" => 2, "c" => 3, "d" => 4];
$alphabetArrayObject = new ArrayObject($alphabets);
$alphabetArrayObject["a"] = 5;

$copy = $alphabetArrayObject->getArrayCopy();
print_r($copy); // a=>5, b=>2, c=.3, d=>4
```

<a name="offsetExists"></a>

`offsetExists(mixed $key): bool` - 要求されたインデックスが存在するかどうかを返す
```php
$arrObj = new ArrayObject(["zero", "one", "example" => "e.g."]);
var_dump($arrObj->offsetExists(1));             // true
var_dump($arrObj->offsetExists("example"));     // true
var_dump($arrObj->offsetExists("notfound"));    // false
```

<a name="offsetGet"></a>

`offsetGet(mixed $key): mixed` - 指定したインデックスの値を返す
```php
$arrObj = new ArrayObject(["zero", "one", "example" => "e.g."]);
var_dump($arrObj->offsetGet(1));             // "one"
var_dump($arrObj->offsetGet("example"));     // "e.g."
```

<a name="offsetSet"></a>

`offsetSet(mixed $key, mixed $value): void` - 指定したインデックスに新しい値をセットする
```php
class Example {
    public $property = "prop:public";
}
$arrObj = new ArrayObject(new Example());
$arrObj->offsetSet(4, "four");
$arrObj->offsetSet("group", ["g1", "g2"]);
print_r($arrObj);   // [property] => prop:public, [4] => four, [group] => Array≤([0] => g1, [1] => g2)

$arrObj = new ArrayObject(["zero", "one"]);
$arrObj->offsetSet(null, "last");
print_r($arrObj);   // [0] => zero, [1] => one, [2] => last
```

<a name="offsetUnset"></a>

`offsetUnset(mixed $key): void` - 指定したインデックスの値を解除する
```php
$arrObj =new ArrayObject([0 => "zero", 2 => "two"]);
$arrObj->offsetUnset(2);
print_r($arrObj);   // [0] => zero
```

<a name="setFlags"></a>

`setFlags(int $flags): void` - 処理フラグを設定する
```php
$arr = ["a" => 1, "b" => 4, "c" => 5, "d" => 10];
$arrObj = new ArrayObject($arr);
$arrObj->setFlags(ArrayObject::ARRAY_AS_PROPS);
echo $arrObj->a . PHP_EOL;  // "->a"で指定可能に (VSCode上では赤線ひかれる)
```

<a name="getFlags"></a>

`getFlags(): int` - 振る舞いのフラグを取得する
```php
$arrObj = new ArrayObject();
echo $arrObj->getFlags() . PHP_EOL;             // 0
$arrObj->setFlags(ArrayObject::ARRAY_AS_PROPS); // 変更
echo $arrObj->getFlags() . PHP_EOL;             // 2
```

<a name="getIterator"></a>

`getIterator(): Iterator` - インスタンスから新規イテレータを生成する
```php
$arr = ["1" => "one", "2" => "two", "3" => "three"];
$arrObj = new ArrayObject($arr);
$iterator = $arrObj->getIterator();

while ($iterator->valid()) {
    echo $iterator->key() . " => " . $iterator->current() . PHP_EOL;
    $iterator->next();
}
```

<a name="getIteratorClass"></a>

`getIteratorClass(): string` - イテレータクラス名を取得する
```php
$arr = ["a" => 1, "b" => 3, "c" => 5, "d" => 7];
$arrObj = new ArrayObject($arr);
$className = $arrObj->getIteratorClass();
echo $className . PHP_EOL;  // ArrayIterator
```

<a name="setIteratorClass"></a>

`setIteratorClass(string $iteratorClass): void` - イテレータクラス名を設定する
```php
class MyArrayIterator extends ArrayIterator {}

$arr = ["a" => 1, "b" => 3, "c" => 5, "d" => 7];
$arrObj = new ArrayObject($arr);
$arrObj->setIteratorClass("MyArrayIterator");
$className = $arrObj->getIteratorClass();
echo $className . PHP_EOL;  // MyArrayIterator
```

<a name="asort"></a>

`asort(int $flags = SORT_REGULAR): true` - 値でエントリをソートする
```php
$arr = ["a" => 300, "b" => 400, "c" => 200, "d" => 100];
$arrObj = new ArrayObject($arr);
$arrObj->asort();

foreach ($arrObj as $key => $value) {
    echo "{$key}({$value}), ";          // d(100), c(200), a(300), b(400), 
}
```

<a name="ksort"></a>

`ksort(int $flags = SORT_REGULAR): true` - キーでエントリをソートする
```php
$arr = ["a" => 300, "b" => 400, "c" => 200, "d" => 100];
$arrObj = new ArrayObject($arr);
$arrObj->ksort();

foreach ($arrObj as $key => $value) {
    echo "{$key}({$value}), ";          // a(300), b(400), c(200), d(100), 
}
```

<a name="natsort"></a>

`natsort(): true` - "自然順"アルゴリズムでエントリをソートする
```php
$arr = ["img12", "img10", "img2", "img1"];
$arrObj = new ArrayObject($arr);

$arrObj->natsort();
foreach ($arrObj as $value) {
    echo $value . ", ";     // img1, img2, img10, img12, 
}
```

<a name="natcasesort"></a>

`natcasesort(): true` - "自然順"アルゴリズムでエントリをソートする (大文字小文字区別なし)
```php
$arr = ["img12", "IMG10", "img2", "IMG1"];
$arrObj = new ArrayObject($arr);

$arrObj->natsort();
foreach ($arrObj as $value) {
    echo $value . ", ";     // IMG1, IMG10, img2, img12, 
}
```

<a name="uksort"></a>

`uksort(callable $callback): true` - ユーザー定義の比較関数を使って、キーでエントリをソートする
```php
function cmp($a, $b) {
    $a = preg_replace("@^(a|an|the) @", "", $a);
    $b = preg_replace("@^(a|an|the) @", "", $b);
    return strcasecmp($a, $b);
}

$arr = ["john" => 1, "the earth" => 2, "an apple" => 3, "a banana" => 4];
$arrObj = new ArrayObject($arr);
$arrObj->uksort("cmp");

foreach ($arrObj as $key => $value) {
    echo "{$key}({$value}), ";          // an apple(3), a banana(4), the earth(2), john(1), 
}
```

<a name="uasort"></a>

`uasort(callable $callback): true` - ユーザー定義の比較関数でエントリをソートし、キーとの対応は保持する
```php
function cmp($a, $b) {
    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}

$arr = ["a" => 4, "b" => 8, "c" => -1, "d" => -9, "e" => 2, "f" => 5, "g" => 3, "h" => -4];
$arrObj = new ArrayObject($arr);
foreach ($arrObj as $key => $value) {
    echo "{$key}({$value}), ";  // a(4), b(8), c(-1), d(-9), e(2), f(5), g(3), h(-4), 
}

echo PHP_EOL;

$arrObj->uasort("cmp");
foreach ($arrObj as $key => $value) {
    echo "{$key}({$value}), ";  // d(-9), h(-4), c(-1), e(2), g(3), a(4), f(5), b(8), 
}
```

<a name="serialize"></a>

`serialize(): string` - シリアライズする

<a name="unserialize"></a>

`unserialize(string $data): void` - アンシリアライズする

[⬆︎目次に戻る](#目次) -->
