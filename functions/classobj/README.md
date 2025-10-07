# クラス関数／オブジェクト関数

## 目次

[操作](#操作)
- [class_alias](#class_alias) - クラスのエイリアスを作成する
--------------------------------------------------------------------------------------------------
[判定](#判定)
- [is_a](#is_a) - オブジェクトが指定した型または部分型か調べる
- [is_subclass_of](#is_subclass_of) - オブジェクトが指定したクラスのサブクラスか(または指定したインターフェースを実装しているか)調べる
- [class_exists](#class_exists) - クラスが定義済みか調べる
- [property_exists](#property_exists) - オブジェクトもしくはクラスにプロパティが存在するか調べる
- [method_exists](#method_exists) - クラスメソッドが存在するか調べる
- [enum_exists](#enum_exists) - 列挙型が定義されているか調べる
- [interface_exists](#interface_exists) - インターフェースが宣言されているか調べる
- [trait_exists](#trait_exists) - トレイトが存在するか調べる
--------------------------------------------------------------------------------------------------
[情報取得](#情報取得)
- [get_class](#get_class) - オブジェクトのクラス名を返す
- [get_parent_class](#get_parent_class) - オブジェクトの親クラスの名前を返す
- [get_class_methods](#get_class_methods) - クラスメソッドの名前を返す
- [get_called_class](#get_called_class) - "遅延静的束縛"のクラス名を返す
- [get_class_vars](#get_class_vars) - クラスのデフォルトプロパティを返す
- [get_object_vars](#get_object_vars) - 指定したオブジェクトのプロパティを返す
- [get_mangled_object_vars](#get_mangled_object_vars) - マングリングされたオブジェクトのプロパティを配列で返す
- [get_declared_classes](#get_declared_classes) - 定義されているクラス一覧を配列で返す
- [get_declared_interfaces](#get_declared_interfaces) - 宣言されているインターフェース一覧を配列で返す
- [get_declared_traits](#get_declared_traits) - 宣言されているトレイト一覧を配列で返す

[⬆︎目次トップに戻る](#目次)

## 操作

<a name="class_alias"></a>

`class_alias(string $class, string $alias, bool $autoload = true): bool` - クラスのエイリアスを作成する
```php
class Human {}

class_alias("Human", "Person");
$person = new Person();
```

[⬆︎目次に戻る](#目次)

## 判定

<a name="is_a"></a>

`is_a(mixed $object_or_class, string $class, bool $allow_string = false): bool` - オブジェクトが指定した型または部分型か調べる
```php
class Human {}

$human = new Human();
echo var_export(is_a($human, "Human")) . PHP_EOL;   // true
echo var_export(is_a($human, "Insect")) . PHP_EOL;  // false
```

<a name="is_subclass_of"></a>

`is_subclass_of(mixed $object_or_class, string $class, bool $allow_string = true): bool` - オブジェクトが指定したクラスのサブクラスか(または指定したインターフェースを実装しているか)調べる
```php
class Human {}
class Japanese extends Human {}

$japanese = new Japanese();
echo var_export(is_subclass_of($japanese, "Human")) . PHP_EOL;      // true
echo var_export(is_subclass_of($japanese, "Japanese")) . PHP_EOL;   // false
```

<a name="class_exists"></a>

`class_exists(string $class, bool $autoload = true): bool` - クラスが定義済みか調べる
```php
class Human {}

echo var_export(class_exists("Human")) . PHP_EOL;   // true
echo var_export(class_exists("Alien")) . PHP_EOL;   // false
```

<a name="property_exists"></a>

`property_exists(object|string $object_or_class, string $property): bool` - オブジェクトもしくはクラスにプロパティが存在するか調べる
```php
class Human {
    public int $age;
}

$human = new Human();
echo var_export(property_exists($human, "age")) . PHP_EOL;      // true
echo var_export(property_exists($human, "gender")) . PHP_EOL;   // false
```

<a name="method_exists"></a>

`method_exists(object|string $object_or_class, string $method): bool` - クラスメソッドが存在するか調べる
```php
class Human {
    public function speak() {}
}

$human = new Human();
echo var_export(method_exists($human, "speak")) . PHP_EOL;  // true
echo var_export(method_exists($human, "kill")) . PHP_EOL;   // false
```

<a name="enum_exists"></a>

`enum_exists(string $enum, bool $autoload = true): bool` - 列挙型が定義されているか調べる
```php
enum Outfielder {
    case Left;
    case Center;
    case Right;
}

echo var_export(enum_exists(Outfielder::class));    // true
echo var_export(enum_exists(Infielder::class));     // false
```

<a name="interface_exists"></a>

`interface_exists(string $interface, bool $autoload = true): bool` - インターフェースが宣言されているか調べる
```php
interface Speakable {}

echo var_export(interface_exists(Speakable::class));    // true
echo var_export(interface_exists(Workable::class));     // false
```

<a name="trait_exists"></a>

`trait_exists(string $trait, bool $autoload = true): bool` - トレイトが存在するか調べる
```php
trait Speak {}

echo var_export(trait_exists(Speak::class));    // true
echo var_export(trait_exists(Work::class));     // false
```

[⬆︎目次に戻る](#目次)

## 情報取得

<a name="get_class"></a>

`get_class(object $object = ?): string` - オブジェクトのクラス名を返す
```php
class Human {}

$human = new Human();
echo get_class($human); // "Human"
```

<a name="get_parent_class"></a>

`get_parent_class(object|string $object_or_class = ?): string|false` - オブジェクトの親クラスの名前を返す
```php
class Human {}
class Japanese extends Human {}

$japanese = new Japanese();
echo get_parent_class($japanese); // "Human"
```

<a name="get_class_methods"></a>

`get_class_methods(object|string $object_or_class): array` - クラスメソッドの名前を返す
```php
class Human {
    public function walk() {}
    public function breath() {}
    protected function speak() {}
}

var_export(get_class_methods(Human::class));    // array(0 => 'walk', 1 => 'breath')
```

<a name="get_called_class"></a>

`get_called_class(): string` - "遅延静的束縛"のクラス名を返す
```php
class Human {
    static public function test() {
        var_export(get_called_class());
    }
}

class Japanese extends Human {}

Human::test();      // 'Human'
Japanese::test();   // 'Japanese'
```

<a name="get_class_vars"></a>

`get_class_vars(string $class): array` - クラスのデフォルトプロパティを返す
```php
class Human {
    public $name = "Unknown";
    public $age = 20;
    protected $country = "USA";
}

var_export(get_class_vars(Human::class));   // array('name' => 'Unknown', 'age' => 20)
```

<a name="get_object_vars"></a>

`get_object_vars(object $object): array` - 指定したオブジェクトのプロパティを返す
```php
class Human {
    public string $name = "Unknown";
    public int $age = 20;
    public string $country;
    protected $death;
}

$human = new Human();
var_export(get_object_vars($human));    // array('name' => 'Unknown', 'age' => 20)
```

<a name="get_mangled_object_vars"></a>

`get_mangled_object_vars(object $object): array` - マングリングされたオブジェクトのプロパティを配列で返す
```php
class Human {
    public $a;
    public $b = 20;
    protected $c = 30;
    private $d = 40;
}

$human = new Human();
var_export(get_mangled_object_vars($human));
/*
array (
  'a' => NULL,
  'b' => 20,
  '' . "\0" . '*' . "\0" . 'c' => 30,
  '' . "\0" . 'Human' . "\0" . 'd' => 40,
)
*/
```

<a name="get_declared_classes"></a>

`get_declared_classes(): array` - 定義されているクラス一覧を配列で返す
```php
var_export(get_declared_classes()); // array(0 => 'InternalIterator', 1 => 'Exception', ...
```

<a name="get_declared_interfaces"></a>

`get_declared_interfaces(): array` - 宣言されているインターフェース一覧を配列で返す
```php
var_export(get_declared_interfaces());  // array(0 => 'Traversable', 1 => 'IteratorAggregate', ...
```

<a name="get_declared_traits"></a>

`get_declared_traits(): array` - 宣言されているトレイト一覧を配列で返す
```php
trait Speak {}

var_export(get_declared_traits());  // array(0 => 'Speak')
```

[⬆︎目次に戻る](#目次)
