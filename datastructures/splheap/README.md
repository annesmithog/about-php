# SplHeap

## サンプル

```php
class ScoreHeap extends SplHeap {
    public function compare($user1, $user2): int {
        return $user1["score"] <=> $user2["score"];
    }
}

$heap = new ScoreHeap();
$heap->insert(["name" => "Tanaka", "score" => 349]);
$heap->insert(["name" => "Yamada", "score" => 310]);
$heap->insert(["name" => "Anne", "score" => 350]);

while (!$heap->isEmpty()) {
    $user = $heap->extract();
    echo "{$user['name']}を通します (スコア: {$user['score']})" . PHP_EOL;
}
/*
Anneを通します (スコア: 350)
Tanakaを通します (スコア: 349)
Yamadaを通します (スコア: 310)
*/
```

## メソッド

- `insert(mixed $value): true` - ヒープに要素を挿入する
- `rewind(): void` - イテレータを先頭に巻き戻す (何もしない)
- `current(): mixed` - イテレータが指す現在のノードを返す
- `top(): mixed` - ヒープの先頭のノードを取り出す
- `key(): int` - 現在のノードのインデックスを返す
- `next(): void` - 次のノードに移動する
- `extract(): mixed` - ヒープの先頭からノードを取り出す
- `valid(): bool` - ヒープにまだノードがあるかどうかを調べる
- `isEmpty(): bool` - ヒープが空かどうかを調べる
- `count(): int` - ヒープ内の要素数を数える
- `compare(mixed $value1, mixed $value2): int` - 要素を比較し、ヒープ内の適切な位置に置く
- `isCorrupted(): bool` - ヒープが壊れているかどうかを調べる
- `recoverFromCorruption(): true` - 破壊されたヒープを復旧し、それ以降の操作を可能にする
