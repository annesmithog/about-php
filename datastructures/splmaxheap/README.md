# SplMaxHeap

## サンプル

```php
$values = [10, 50, 30, 20, 40];
$maxHeap = new SplMaxHeap();

foreach ($values as $value) {
    $maxHeap->insert($value) . PHP_EOL;
}

while ($maxHeap->valid()) {
    echo $maxHeap->extract() . PHP_EOL;
}

/*
50
40
30
20
10
*/
```

## メソッド

メソッドは[SplHeapのメソッド](/datastructures/splheap/README.md#メソッド)を継承しています。
