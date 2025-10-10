# SplPriorityQueue

## サンプル

```php
class PQTest extends SplPriorityQueue {
    public function compare(mixed $priority1, mixed $priority2): int {
        if ($priority1 === $priority2) return 0;
        return $priority1 < $priority2 ? -1 : 1;
    }
}

$objPQ = new PQTest();
$objPQ->insert("A", 3);
$objPQ->insert("B", 6);
$objPQ->insert("C", 1);
$objPQ->insert("D", 2);

echo "Count => " . $objPQ->count() . PHP_EOL;

$objPQ->setExtractFlags(PQTest::EXTR_BOTH);

$objPQ->top();

while ($objPQ->valid()) {
    print_r($objPQ->current());
    echo PHP_EOL;
    $objPQ->next();
}
```

## 定数

- `EXTR_BOTH`
- `EXTR_PRIORITY`
- `EXTR_DATA`

## メソッド

- `insert(mixed $value, mixed $priority): true` - キューに要素を挿入する
- `rewind(): void` - イテレータを先頭に巻き戻す (何もしない)
- `current(): mixed` - イテレータが指す現在のノードを返す
- `top(): mixed` - キューの先頭のノードを取り出す
- `key(): int` - 現在のノードのインデックスを返す
- `next(): void` - 次のノードに移動する
- `extract(): mixed` - ヒープの先頭からノードを取り出す
- `valid(): bool` - キューにまだノードがあるかどうかを調べる
- `isEmpty(): bool` - キューが空かどうかを調べる
- `count(): int` - キュー内の要素数を数える
- `getExtractFlags(): int` - 展開する時のフラグを取得する
- `setExtractFlags(int $flags): int` - 取り出しモードを設定する
- `compare(mixed $priority1, mixed $priority2): int` - 要素の優先順位を比較し、ヒープ内の適切な位置に置く
- `isCorrupted(): bool` - 優先度付きキューが壊れているかを調べる
- `recoverFromCorruption(): true` - 破壊されたキューを復旧し、それ以降の操作をできるようにする
