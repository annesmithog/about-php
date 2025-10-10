# SplQueue

## サンプル

```php
$queue = new SplQueue();
$queue[] = 10;
$queue[] = 20;
$queue[] = 30;

foreach ($queue as $element) {
    echo $element . PHP_EOL;    // 10, 20, 30
}
```

## 定数

定数は[SplDoublyLinkedListの定数](/datastructures/spldoublelinkedlist/README.md#目次)を継承しています。

## メソッド

メソッドは[SplDoublyLinkedListのメソッド](/datastructures/spldoublelinkedlist/README.md#メソッド)を継承しています。

以下、SplQueueのメソッド

<a name="enqueue"></a>

`enqueue(mixed $value): void` - 要素をキューに追加する
```php
$queue = new SplQueue();
$queue->enqueue(10);
$queue->enqueue(20);

foreach ($queue as $element) {
    echo $element . ", ";   // 10, 20, 
}
```

<a name="dequeue"></a>

`dequeue(): mixed` - キューからノードを取り出す
```php
$queue = new SplQueue();
$queue->enqueue(10);
$queue->enqueue(20);
$x = $queue->dequeue();

echo $x . PHP_EOL;          // 10            

foreach ($queue as $element) {
    echo $element . ", ";   // 20, 
}
```
