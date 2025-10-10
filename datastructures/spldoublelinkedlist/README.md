# SplDoublyLinkedList

## サンプル

```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push("a");
$splDoublyLinkedList->push("b");
$splDoublyLinkedList->push("c");
$splDoublyLinkedList->push("d");

$splDoublyLinkedList->rewind();

while ($splDoublyLinkedList->valid()) {
    echo $splDoublyLinkedList->current() . PHP_EOL;
    $splDoublyLinkedList->next();
}
```

## 目次

[定数](#定数)
- IT_MODE_LIFO - スタックのようなLIFO (最後に入れたものを最初に取り出す)で走査する
- IT_MODE_FIFO - キューのようなFIFO (先入れ先出し)で走査する
- IT_MODE_DELETE - 走査された要素を削除する振る舞い
- IT_MODE_KEEP - 走査されても要素を削除しない振る舞い
--------------------------------------------------------------------------------------------------
[メソッド](#メソッド)
- [add(int $index, mixed $value): void](#add) - 特定のインデックスに新しい値を追加/挿入する
- [unshift(mixed $value): void](#unshift) - 先頭に要素を追加する
- [push(mixed $value): void](#push) - 末尾に要素を追加する
- [rewind(): void](#rewind) - イテレータを先頭に巻き戻す
- [current(): mixed](#current) - 現在の要素を返す
- [bottom(): mixed](#bottom) - 最初のノードを取得する
- [top(): mixed](#top) - 最後のノードを取得する
- [shift(): mixed](#shift) - 先頭からノードを取り出す
- [pop(): mixed](#pop) - 末尾からノードを取り出す
- [key(): int](#key) - 現在のノードのインデックスを返す
- [next(): void](#next) - 次のエントリに移動する
- [prev(): void](#prev) - 前のエントリに移動する
- [valid(): bool](#valid) - ノードがまだあるかどうかを調べる
- [isEmpty(): bool](#isEmpty) - 空かどうか調べる
- [count(): int](#count) - 要素数を数える
- [offsetExists(int $index): bool](#offsetExists) - 指定した$indexが存在するかどうかを返す
- [offsetGet(int $index): mixed](#offsetGet) - 指定した$indexの値を返す
- [offsetSet(?int $index, mixed $value): void](#offsetSet) - 指定した$indexの値を$valueに設定する
- [offsetUnset(int $index): void](#offsetUnset) - 指定した$indexの値を削除する
- [setIteratorMode(int $mode): int](#setIteratorMode) - 反復処理のモードを設定する
- [getIteratorMode(): int](#getIteratorMode) - 反復処理のモードを返す
- [serialize(): string](#serialize) - ストレージをシリアライズする
- [unserialize(string $data): void](#unserialize) - ストレージをアンシリアライズする

[⬆︎目次トップに戻る](#目次)

## メソッド

<a name="add"></a>

`add(int $index, mixed $value): void` - 特定のインデックスに新しい値を追加/挿入する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->add(0, 100);  // [100]
$splDoublyLinkedList->add(0, 200);  // [200], 100
$splDoublyLinkedList->add(1, 150);  // 200, [150], 100
print_r($splDoublyLinkedList);  // 200, 150, 100
```

<a name="unshift"></a>

`unshift(mixed $value): void` - 先頭に要素を追加する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->unshift(10);  // [10]
$splDoublyLinkedList->unshift(20);  // [20], 10
$splDoublyLinkedList->unshift(30);  // [30], 20, 10
print_r($splDoublyLinkedList);      // 30, 20, 10
```

<a name="push"></a>

`push(mixed $value): void` - 末尾に要素を追加する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);     // [10]
$splDoublyLinkedList->push(20);     // 10, [20]
$splDoublyLinkedList->push(30);     // 10, 20, [30]
print_r($splDoublyLinkedList);      // 10, 20, 30
```

<a name="rewind"></a>

`rewind(): void` - イテレータを先頭に巻き戻す
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
$splDoublyLinkedList->rewind();         // current等が使用可能になる
echo $splDoublyLinkedList->current();   // 10
```

<a name="current"></a>

`current(): mixed` - 現在の要素を返す
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
$splDoublyLinkedList->rewind();
echo $splDoublyLinkedList->current();   // 10
```

<a name="bottom"></a>

`bottom(): mixed` - 最初のノードを取得する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
echo $splDoublyLinkedList->bottom();    // 10
```

<a name="top"></a>

`top(): mixed` - 最後のノードを取得する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
echo $splDoublyLinkedList->top();       // 20
```

<a name="shift"></a>

`shift(): mixed` - 先頭からノードを取り出す
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
echo $splDoublyLinkedList->shift();     // 10
```

<a name="pop"></a>

`pop(): mixed` - 末尾からノードを取り出す
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
echo $splDoublyLinkedList->pop();       // 20
```

<a name="key"></a>

`key(): int` - 現在のノードのインデックスを返す
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
echo $splDoublyLinkedList->key();       // 0
```

<a name="next"></a>

`next(): void` - 次のエントリに移動する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
$splDoublyLinkedList->push(30);
$splDoublyLinkedList->rewind();
echo $splDoublyLinkedList->current() . PHP_EOL; // 10
$splDoublyLinkedList->next();
echo $splDoublyLinkedList->current() . PHP_EOL; // 20
```

<a name="prev"></a>

`prev(): void` - 前のエントリに移動する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);
$splDoublyLinkedList->push(30);
$splDoublyLinkedList->rewind();
$splDoublyLinkedList->next();
echo $splDoublyLinkedList->current() . PHP_EOL; // 20
$splDoublyLinkedList->prev();
echo $splDoublyLinkedList->current() . PHP_EOL; // 10
```

<a name="valid"></a>

`valid(): bool` - ノードがまだあるかどうかを調べる
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push(10);
$splDoublyLinkedList->push(20);

$splDoublyLinkedList->rewind();
while ($splDoublyLinkedList->valid()) {
    echo $splDoublyLinkedList->current() . PHP_EOL;
    $splDoublyLinkedList->next();
}
```

<a name="isEmpty"></a>

`isEmpty(): bool` - 空かどうか調べる
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
echo var_export($splDoublyLinkedList->isEmpty()) . PHP_EOL; // true
$splDoublyLinkedList->push("a");
echo var_export($splDoublyLinkedList->isEmpty()) . PHP_EOL; // false
```

<a name="count"></a>

`count(): int` - 要素数を数える
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push("a");
$splDoublyLinkedList->push("b");
echo $splDoublyLinkedList->count(); // 2
```

<a name="offsetExists"></a>

`offsetExists(int $index): bool` - 指定した$indexが存在するかどうかを返す
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push("a");
$splDoublyLinkedList->push("b");
echo var_export($splDoublyLinkedList->offsetExists(1)); // true
echo var_export($splDoublyLinkedList->offsetExists(2)); // false
```

<a name="offsetGet"></a>

`offsetGet(int $index): mixed` - 指定した$indexの値を返す
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push("a");
$splDoublyLinkedList->push("b");
echo var_export($splDoublyLinkedList->offsetGet(1)); // "b"
```

<a name="offsetSet"></a>

`offsetSet(?int $index, mixed $value): void` - 指定した$indexの値を$valueに設定する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push("a");
$splDoublyLinkedList->push("b");
$splDoublyLinkedList->offsetSet(1, "BBB");
echo var_export($splDoublyLinkedList->offsetGet(1)); // "BBB"
```

<a name="offsetUnset"></a>

`offsetUnset(int $index): void` - 指定した$indexの値を削除する
```php
$splDoublyLinkedList = new SplDoublyLinkedList();
$splDoublyLinkedList->push("a");
$splDoublyLinkedList->push("b");
$splDoublyLinkedList->push("c");
$splDoublyLinkedList->offsetUnset(1);
print_r($splDoublyLinkedList);  // [0] => "a", [1] => "c"
```

<a name="setIteratorMode"></a>

`setIteratorMode(int $mode): int` - 反復処理のモードを設定する
```php
$sdll = new SplDoublyLinkedList();
$sdll->setIteratorMode(SplDoublyLinkedList::IT_MODE_DELETE);
$sdll->setIteratorMode(SplDoublyLinkedList::IT_MODE_FIFO);
$sdll->setIteratorMode(SplDoublyLinkedList::IT_MODE_KEEP);
$sdll->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);
```

<a name="getIteratorMode"></a>

`getIteratorMode(): int` - 反復処理のモードを返す
```php
$sdll = new SplDoublyLinkedList();
$sdll->setIteratorMode(SplDoublyLinkedList::IT_MODE_KEEP);
$mode = $sdll->getIteratorMode();
echo $mode; // 0
```

<a name="serialize"></a>

`serialize(): string` - ストレージをシリアライズする

<a name="unserialize"></a>

`unserialize(string $data): void` - ストレージをアンシリアライズする

[⬆︎目次に戻る](#目次)
