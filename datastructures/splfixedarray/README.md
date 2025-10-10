# SplFixedArray

## サンプル

```php
$arr = new SplFixedArray(3);
$arr[0] = 0;
$arr[1] = 10;
$arr[2] = 20;
$arr[3] = 30;   // エラー。[3]は指定できません。
$arr[] = 40;    // エラー。添字を指定する必要があります。

foreach ($arr as $value) {
    echo $value . PHP_EOL;
}
```

## メソッド

- `__construct(int $size = 0)` - 新しい配列を作成する
- `count(): int` - 配列のサイズを返す
- `current(): mixed` - 現在の配列の要素を返す
- `fromArray(array $array, bool $preserveKeys = true): SplFixedArray` - PHP配列をSplFixedArrayインスタンスにインポートする
- `getIterator(): Iterator` - 配列を走査するためのイテレータを取得する
- `getSize(): int` - 配列のサイズを取得する
- `jsonSerialize(): array` - JSONに交換可能な値の表現を返す
- `key(): int` - 現在の配列の添字を返す
- `next(): void` - 次のエントリに進む
- `offsetExists(int $index): bool` - 指定した添字が存在するかどうかを返す
- `offsetGet(int $index): mixed` - 指定した添字の値を返す
- `offsetSet(int $index, mixed $value): void` - 指定した添字の新しい値を設定する
- `offsetUnset(int $index): void` - 指定した添字の値を消去する
- `rewind(): void` - イテレータを先頭に巻き戻す
- `__serialize(): array` - SplFixedArrayオブジェクトをシリアライズする
- `setSize(int $size): true` - 配列のサイズを変更する
- `toArray(): array` - 固定長配列からPHPの配列を返す
- `__unserialize(array $data): void` - dataパラメータをSplFixedArrayオブジェクトに復元する
- `valid(): bool` - 配列にまだ要素があるかどうかを調べる
