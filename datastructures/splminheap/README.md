# SplMinHeap

## サンプル

```php
$values = [10, 50, 30, 20, 40];
$minHeap = new SplMinHeap();

foreach ($values as $value) {
    $minHeap->insert($value) . PHP_EOL;
}

while ($minHeap->valid()) {
    echo $minHeap->extract() . PHP_EOL;
}

/*
10
20
30
40
50
*/
```

## メソッド

メソッドは[SplHeapのメソッド](/datastructures/splheap/README.md#メソッド)を継承しています。
