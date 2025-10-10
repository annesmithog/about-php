# about-php

## 目次

- [前提](#前提)
- [変数](#変数)
- [定数](#定数)
- [式](#式)
- [演算子](#演算子)
- [制御構造](#制御構造)
- [型](#型)
- [配列](#配列)
- [列挙型](#列挙型)
- [関数](#関数)
- [クラスとオブジェクト](#クラスとオブジェクト)
- [プロパティフック](#プロパティフック)
- [名前空間](#名前空間)
- [例外](#例外)
- [ジェネレータ](#ジェネレータ)
- [Extra](#extra)
- [データ構造](#データ構造)
- [アルゴリズム](#アルゴリズム)

[⬆︎目次トップに戻る](#目次)

## 前提

PHP8で動作確認しています。

PHPは開始タグ(`<?php`)と終了タグ(`?>`)の間にコードを記載します。
ファイルがPHPコードで終わる場合、終了タグを省略します。
```php
<?php 
// Code
?>
```

このリポジトリでは、説明のため出力を多用します。
```php
echo "Hello" . PHP_EOL;
```

[⬆︎目次に戻る](#目次)

## 変数

**変数**: 一般的な変数です。
```php
$name = "Anne";
```

**静的変数**: 最初のコール時のみ初期化します。
```php
function count_up() {
    static $count = 0;
    echo ++$count . PHP_EOL;
}

echo count_up();    // 1
echo count_up();    // 2
```

**可変変数**: 変数名を動的にセットして使用できます。
```php
$platform = "ps5";
$$platform = "Sony";    // $ps5 = "Sony"と同義
echo $ps5;              // "Sony"
```

HTMLのフォームからは、name属性を使用した以下の方法で取得します。
```php
$username = $_POST["username"];
$formId = $_GET["form_number"];
```

再訪ユーザー追跡用のCookieは`setcookie()`でセットできます。
```php
setcookie("count", $count, time()+3600);
```

[⬆︎目次に戻る](#目次)

## 定数

定数はスクリプト実行中に変更できない値です。慣習的に全て大文字で表記します。
`define()`または`const`で定義できます。
```php
define("TAX", 1.1);
const PI = 3.14;
```

[⬆︎目次に戻る](#目次)

## 式

**三項演算子**: 式を簡略化したものです。
```php
$isGood = true;
echo $isGood ? "Good!" : "Nah." . PHP_EOL;  // Good!
```

[⬆︎目次に戻る](#目次)

## 演算子

<details><summary>ビット演算子</summary>

- ビット積: `$a & $b`
- ビット和: `$a | $b`
- 排他的論理和: `$a ^ $b`
- 否定: `~ $a`
- 左シフト: `$a << $b`
- 右シフト: `$a >> $b`
</details>

<details><summary>論理演算子</summary>

- 論理積: `$a and $b`, `$a && $b`
- 論理和: `$a or $b`, `$a || $b`
- 排他的論理和: `$a xor $b`
- 否定: `! $a`
</details>

<details><summary>配列演算子</summary>

- 結合: `$a + $b`
- 同等: `$a == $b` (キー/値のペアが等しいか)
- 同一: `$a === $b` (キー/値のペア、並び順、データ型が等しいか)
</details>

[⬆︎目次に戻る](#目次)

## 制御構造

`if`, `elseif`, `else`
```php
$num = 0;

if ($num === 0) {
    echo "A";
} elseif ($num > 0) {
    echo "B";
} else {
    echo "C";
}
```

`while`
```php
$i = 0;

while ($i < 5) {
    echo ++$i . PHP_EOL;
}
```

`do-while`
```php
$i = 0;

do {
    echo ++$i . PHP_EOL;
} while ($i < 5);
```

`for`
```php
for ($i = 1; $i <= 5; ++$i) {
    echo $i . PHP_EOL;
}
```

`foreach`
```php
$numbers = ["one", "two", "three"];

foreach ($numbers as $number) {
    echo $number . PHP_EOL;
}
```

`break`: 繰り返し処理の終了ができます。`break 2`にすると直近２つの処理から抜け出すことができます。

`continue`: 繰り返し処理のスキップができます。`continue 2`にすると直近２つの処理をスキップできます。

`switch`
```php
$score = 5;

switch ($score) {
    case 1:
    case 2:
        echo "Low" . PHP_EOL;
        break;
    case 3:
        echo "Mid" . PHP_EOL;
        break;
    case 4:
    case 5:
        echo "High" . PHP_EOL;
        break;
    default:
        echo "Dunno" . PHP_EOL;
        break;
}
```

`match`
```php
$score = 5;

$message = match ($score) {
    1, 2    => "Low",
    3       => "Mid",
    4, 5    => "High",
    default => "Dunno",
};

echo $message . PHP_EOL;
```

`declare`: 実行ディレクティブ(`ticks`, `encoding`, `strict_types`)を設定できます。

`include`, `require`: ファイルを取り込みます。`require`は失敗時にエラーを出力します。
```php
require "test1.php";
require("test2.php");
```

`include_once`, `require_once`: 既に取り込んでいるか確認した上でファイルを取り込みます。`require_once`は失敗時にエラーを出力します。
```php
require_once "test3.php";
require_once("test4.php");
```

[⬆︎目次に戻る](#目次)

## 型

**10進数**
```php
$num = 1234;    // 1234
$num = 1_234;   // 1234
```

**16進数**
```php
$num = 0x1A;    // 26
```

**8進数**
```php
$num = 0123;    // 83
$num = 0o123;   // 83
```

**2進数**
```php
$num = 0b1111;  // 15
```

[⬆︎目次に戻る](#目次)

## 配列

**宣言**
```php
// 基本
$arr1 = array("one" => 1, "two" => 2, "three" => 3);

// 短縮構文
$arr2 = ["one" => 1, "two" => 2, "three" => 3];

// キー省略
$arr3 = [
    "one",  // 0 => "one"
    "two",  // 1 => "two"
    "three" // 2 => "three"
];

// 一部キー指定
$arr4 = [
    "one",          // 0 => "one"
    "two",          // 1 => "two"
    5 => "three",   // 5 => "three"
    "four"          // 6 => "four"
];
```

**要素へのアクセス**
```php
$arr1 = ["John", "Paul"];
echo $arr1[0] . PHP_EOL;    // John

$arr2 = [
    "a" => [
        "b" => [
            "c" => "END."
        ]
    ]
];
echo $arr2["a"]["b"]["c"] . PHP_EOL;    // END.
```

**要素の追加**
```php
$arr = [10];
$arr[] = 15;
$arr[1] = 20;
$arr["x"] = 30;

echo var_export($arr);  // 0 => 10, 1 => 20, 'x' => 30
```

**要素の削除**
```php
$arr = [10, 20, 'x' => 30];

unset($arr[0]);     // 0 => 10 を削除
unset($arr['x']);   // 'x' => 30 を削除
unset($arr);        // 配列自体を削除
```

**要素の出力**
```php
$arr = [10, 20, 'x' => 30];

echo $arr[0] . PHP_EOL; // 10

foreach ($arr as $key => $value) {
    echo "{$key} => {$value}" . PHP_EOL;
}
/*
0 => 10
1 => 20
x => 30
*/
```

**要素の分解**
```php
$arr = [10, 20, 30];

[$a, $b, $c] = $arr;
echo "{$a} {$b} {$c}" . PHP_EOL;    // 10 20 30

[, , $d] = $arr;
echo $d . PHP_EOL;  // 30

[$a, $b] = [$b, $a];
echo "{$a} {$b}" . PHP_EOL; // 20 10
```

**ループ内での要素の変更と注意点**
```php
$colors = ["red", "blue", "yellow"];

foreach ($colors as &$color) {
    $color = mb_strtoupper($color);
}

unset($color);  // これをすることで、以降に$colorへの書き込みを禁止する。

echo var_export($colors);   // 0 => 'RED', 1 => 'BLUE', 2 => 'YELLOW'
```

[⬆︎目次に戻る](#目次)

## 列挙型

**列挙型**は、取りうる型を限定した独自の型を定義できます。これにより、不正な状態が表現できなくなるので、ドメインモデルを定義する時に役立ちます。列挙型そのものはクラスで、定義されるcaseはそのクラスのインスタンスです。
```php
enum Suit {
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

echo Suit::Clubs->name; // Clubs
```

**値依存の列挙型**(Baked Enum)は、スカラー値を持つ列挙型のことです。
```php
enum Gender: string {
    case Male = "男";
    case Female = "女";
}

echo Gender::Male->name . PHP_EOL;      // Male
echo Gender::Female->value . PHP_EOL;   // 女
```

**インターフェース**も使用できます。
```php
interface Colorful {
    public function color(): string;
}

enum Suit implements Colorful {
    case Hearts; case Diamonds; case Clubs; case Spades;

    public function color(): string {
        return match($this) {
            Suit::Hearts, Suit::Diamonds => "Red",
            Suit::Clubs, Suit::Spades => "Black",
        };
    }
}
```

**トレイト**も使用できます。
```php
trait SuitInfo {
    public function suitDetail(): string {
        return "This is Suit";
    }
}

enum Suit {
    use SuitInfo;

    case Hearts; case Diamonds; case Clubs; case Spades;

    public function info() {
        echo $this->suitDetail() . PHP_EOL;
    }
}
```

[⬆︎目次に戻る](#目次)

## 関数

**ユーザー定義関数**
```php
function sum($a, $b) {
    return $a + $b;
}

echo sum(10, 20) . PHP_EOL; //30
```

**デフォルトのパラメータ値**も指定できます。
```php
function greet($name = "Unknown") {
    echo "Hello, {$name}" . PHP_EOL;
}

greet();        // Hello, Unknown
greet("Anne");  // Hello, Anne
```

**リファレンス渡し**: 関数にそのまま配列を渡すことができます。
```php
function add_year(&$title, $releaseYear) {
    $title .= " ({$releaseYear})";
}

$title = "Final Fantasy VII";
add_year($title, 1997);
echo $title;    // Final Fantasy VII (1997)
```

**複数値の受け取り**もできます。
```php
function get_numbers() {
    return [10, 20, 30];
}

[$x, $y, $z] = get_numbers();
```

**可変変数**: 変数を関数として認識し、実行することができます。
```php
function talk() {
    echo "Blah" . PHP_EOL;
}

$speak = "talk";
$speak();       // Blah
```

**無名関数**(クロージャ): 関数名を指定せずに関数を作成することができます。
```php
$explicit = function($name) {
    return "{$name} [Explicit]";
};

$song = "White Iverson";
echo $explicit($song) . PHP_EOL;    // White Iverson [Explicit]
```

**アロー関数**: 無名関数を簡潔に書けます。
```php
$explicit = fn($name) => "{$name} [Explicit]";
$song = "White Iverson";
echo $explicit($song) . PHP_EOL;    // White Iverson [Explicit]
```

[⬆︎目次に戻る](#目次)

## クラスとオブジェクト

**定義**
```php
class Human {
    public string $name = "";
    public function introduce(): string {
        return "Hello, I'm " . $this->name;
    }
}
```

**インスタンス生成**
```php
$human = new Human();
$human->name = "Anne";
echo $human->introduce() . PHP_EOL; // Hello, I'm Anne
```

**継承**: 親クラスのメソッド、プロパティを継承できます。
```php
class Animal {
    public string $name;
    function speak() {
        echo "私の名前は{$this->name}です。" . PHP_EOL;
    }
}

class Dog extends Animal {
    function speak() {
        parent::speak();
        echo "犬です。" . PHP_EOL;
    }
}

$dog = new Dog();
$dog->name = "ドギー";
$dog->speak();
/*
私の名前はドギーです。
犬です。
*/
```

**プロパティフック**: 簡潔にオブジェクトプロパティへのアクセスをラップするメソッドを書けます。今までのように`getName`, `setName`など用意する必要がありません。

```php
class Animal {
    public string $name {
        get { 
            return $this->name;
        }
        set(string $name) {
            if (strlen($name) === 0) {
                throw new ValueError("\$nameは1文字以上である必要があります。");
            }
            $this->name = $name;
        }
    }
}

$animal = new Animal();
$animal->name = "anne";
echo $animal->name;
```

**クラス定数**: クラスでも定数が使用できます。`self::定数名`で参照できます。
```php
class MathTest {
    const PI = 3.14;
    function displayPI() {
        echo self::PI . PHP_EOL;
    }
}
```

**クラスのオートローディング**: 一般的にはクラス定義毎にPHPファイルを1つ用意しますが、各スクリプトの先頭で読み込む処理を記述するのは面倒です。以下のコードでは任意の数のオートローダーを読み込むことができ、クラスやインターフェース等が定義されていなくても自動的に読み込むことができます。
```php
spl_autoload_register(function ($class_name) {
    $filename = __DIR__ . "/models/" . $class_name . ".php";
    if (is_file($filename)) {
        require_once $filename;
    }
});

$human = new Human("Anne", 20, "USA");
echo $human->introduce() . PHP_EOL;     // Hi, I'm Anne.
```

**コンストラクタ**: 初期化時に実行されます。
```php
class Animal {
    public string $name;
    public int $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$animal = new Animal("Aaron", 32);
```

**デストラクタ**: 消滅時に実行されます。
```php
class Animal {
    public function __destruct() {
        echo "Gone." . PHP_EOL;
    }
}
```

**アクセス修飾子**: `public`, `protected`, `private`の3つが使えます。

- `public`: どこからでもアクセス可能
- `protected`: そのクラス自身、継承クラス、親クラスからアクセス可能
- `private`: そのクラス自身のみからアクセス可能

**staticキーワード**: インスタンス化なしでアクセス可能にできます。
```php
class Game {
    public static $gameType = "Video Game";
}

echo Game::$gameType;
```

**抽象クラス**: 1クラスが定義すべきメソッドやプロパティ等の宣言を行うことができます。`abstract メソッド名`とマークされたメソッドは、子クラスで定義される必要があります。どのアクセス修飾子の指定も可能で、メソッド・戻り値の値・引数を指定できます。
```php
abstract class JapaneseBeing {
    protected $name;
    abstract public function __construct(string $name);
    abstract public function speak(): string;
    abstract public function feelShiki(): string;
}

class Japanese extends JapaneseBeing {
    public function __construct(string $name) {
        $this->name = $name;
    }
    public function speak(): string {
        return "こんにちは、{$this->name}です。";
    }
    public function feelShiki(): string {
        return "四季を感じる。";
    }
}
```

**インターフェース**: クラスが実装すべきメソッドやプロパティの宣言が行えます。メソッドは`public`の宣言に限定されます。
```php
interface Talkable {
    public function sayHello(): string;
}

interface EatInterface {
    public function eat(): string;
}

class Human implements Talkable, EatInterface {
    public string $name;
    public function sayHello(): string { return "HELLO"; }
    public function eat(): string { return "(食事)"; }
}

class Insect implements EatInterface {
    public string $name;
    public function eat(): string { return "(食事)"; }
}
```

**トレイト**: コードの再利用性を高める仕組みです。「トレイトのメンバーの抽象化」、「staticメンバー(変数、メソッド、プロパティ)の使用」、「プロパティの定義」、「定数の定義」、「Finalメソッド」等が使用可能です。
```php
trait Greet {
    public function englishGreet(): void {
        echo "Hello" . PHP_EOL;
    }
}

class Person {
    use Greet;

    public function greet(): void {
        $this->englishGreet();
    }
}
```

**オブジェクトの反復処理**
```php
class Number {
    public int $num1 = 1;
    protected int $num2 = 2;
    private int $num3 = 3;

    function iterateVisible() {
        foreach ($this as $key => $value) {
            echo "{$key} => {$value}" . PHP_EOL;
        }
    }
}

$number = new Number();
echo $number->iterateVisible();
```

**finalキーワード**: 子クラスから上書きできなくさせます。
```php
final Tsuchinoko {
    final public const ID = 9999;
    final public int $rest = 1;
    final public function speak() {
        echo "Hello" . PHP_EOL;
    }
}
```

[⬆︎目次に戻る](#目次)

## プロパティフック

**プロパティフック**では、`set`で`$value`を使って簡略化できます。
```php
set {
    $this->name = $value;
}
```

**プロパティフック**は、**アロー構文**でさらに簡略化することもできます。
```php
public string $name {
    get => $this->name;
    set => $this->name = $value;
}
```

**仮想プロパティ**: 値を保持しないプロパティです。値の代入はもちろんできません。
```php
class Rectangle {
    public int $area {
        get => $this->h * $this->w;
    }

    public function __construct(public int $h, public int $w) {}
}

$r = new Rectangle(4, 5);
echo $r->area . PHP_EOL;    // 20
```

**finalフック**: フックにも`final`は使用可能です。オーバーライド不可になります。
```php
class User {
    public string $name {
        final set => strtolower($value);
    }
}

class Manager extends User {
    public string $name {
        get => $this->name;         // OK.
        set => strtolower($value);  // NG!!!
    }
}
```

[⬆︎目次に戻る](#目次)

## 名前空間

**名前空間**: 一言で言うと項目をカプセル化する仕組みです。OSがディレクトリでファイルをグループ化するようなものです。
```php
namespace App\Models;

class Human {}
```

```php
namespace App\Controllers;

use App\Models\Human;

$human = new Huuman();
```

**エイリアス／インポート**: 別の名前空間のものを使う方法です。
```php
use App\Models\Human;           // クラスHumanをインポート
use App\Models\Human as Person; // クラスHumanをPersonとしてインポート
use function App\Models\hello;  // 関数helloをインポート
use const App\Models\PI;        // 定数をインポート
```

[⬆︎目次に戻る](#目次)

## 例外

`try`, `catch`, `finally`
```php
function throw_error() {
    throw new Exception("なんかエラー");
}

try {
    throw_error();
} catch (Exception $e) {
    echo "例外: " . $e->getMessage() . PHP_EOL;
} finally {
    echo "終わり" . PHP_EOL;
}
```

**複数の例外ハンドリング**もできます。
```php
try {
    throw new DateException("エラー");
} catch (DateException | RangeException $e) {
    echo $e->getMessage() . PHP_EOL;
}
```

[⬆︎目次に戻る](#目次)

## ジェネレータ

シンプルなイテレータを簡単に実装できます。`yield`キーワードで、必要に応じて何度も`return`するイメージです。

**サンプル: `xrange()`**: `range(0, 10000000)`は100MB超えのメモリを消費しますが、以下の`xrange`は1KB未満に収まるほど節約できます。
```php
function xrange($start, $limit, $step = 1) {
    if ($start <= $limit) {
        if ($step <= 0) throw new LogicException("\$stepが1以上である必要があります。");
        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) throw new LogicException("\$stepが-1以下である必要があります。");
        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

foreach (xrange(0, 1000, 50) as $number) {
    echo $number . ", ";
}
```

[⬆︎目次に戻る](#目次)

## Extra

- [応用](/advanced/README.md) - SOLID原則、デザインパターン、CRUD、DBなど
- [定義済み](/predefined/README.md) - 定義済みの変数、例外、インターフェース／クラスなど
- [関数](/functions/README.md) - 数学関数、String関数、配列関数など

[⬆︎目次に戻る](#目次)

## データ構造

- [SplDoublyLinkedList](/datastructures/spldoublelinkedlist/README.md) - 双方向リンクリスト
- [SplStack](/datastructures/splstack/README.md) - スタック
- [SplQueue](/datastructures/splqueue/README.md) - キュー
- [SplPriorityQueue](/datastructures/splpriorityqueue/README.md) - 優先順位付きキュー
- [SplHeap](/datastructures/splheap/README.md) - ヒープ
- [SplMaxHeap](/datastructures/splmaxheap/README.md) - 最大値を先頭に保つヒープ
- [SplMinHeap](/datastructures/splminheap/README.md) - 最小値を先頭に保つヒープ
- [SplFixedArray](/datastructures/splfixedarray/README.md) - 手動リサイズ必須且つ整数値で指定した範囲内の添字しか使用できない配列
- [ArrayObject](/datastructures/arrayobject/README.md) - 配列
- ~~[SplObjectStorage]() - オブジェクトをデータに対応させ、データを渡さずにオブジェクトセットとして使用できるデータ構造~~

[⬆︎目次に戻る](#目次)

## アルゴリズム

探索
- [線形探索](/src/algorithms/search/linear_search.php) - 配列を先頭から順番に調べて目的の要素を探す
- [二分探索](/src/algorithms/search/binary_search.php) - ソート済みの配列を二分しながら効率的に要素を探す
- [指数探索](/src/algorithms/search/exponential_search.php) - ソート済みの配列で範囲を指数的に広げながら二分探索し要素を探す
- [貪欲法 (例: コイン問題)](/src/algorithms/search/greedy_coin_change.php) - その場で最適な選択を繰り返し解を求める
--------------------------------------------------------------------------------------------------
ツリー
- [幅優先探索 (BFS)](/src/algorithms/tree/bfs.php) - キューを使い、根から近い順に探索する
- [深さ優先探索 (DFS)](/src/algorithms/tree/dfs.php) - スタックや再帰を使い、できる限り深く探索する
--------------------------------------------------------------------------------------------------
グラフアルゴリズム
- [BFSを使用した迷路探索](/src/algorithms/graph/bfs_maze.php) - BFSを使い、最短経路を見つける
- [DFSを使用した迷路探索](/src/algorithms/graph/dfs_maze.php) - DFSを使い、到達可能な経路を見つける
- [ダイクストラ法](/src/algorithms/graph/dijkstra.php) - 単一の始点から各頂点への最短経路を求める (負の辺がない場合のみ)
- [ベルマンフォード法](/src/algorithms/graph/bellman_ford.php) - 単一の始点から各頂点への最短経路を求める (負の辺があっても問題ないが、負閉路は不可)
- [ワーシャル–フロイド法](/src/algorithms/graph/floyd_warshall.php) - 全ての頂点間の最短経路を求める
- [プリム法](/src/algorithms/graph/prim.php) - 貪欲方で最小全域木を求める
- [クラスカル法](/src/algorithms/graph/kruskal.php) - 辺が小さい順に選び最小全域木を求める
- [トポロジカルソート](/src/algorithms/graph/topological_sort.php) - 有向非巡回グラフのノードを依存関係に従って並べる
--------------------------------------------------------------------------------------------------
ソート
- [バブルソート](/src/algorithms/sorting/bubble_sort.php) - 隣り合う要素を比較し、必要に応じて入れ替えを繰り返すソート
- [選択ソート](/src/algorithms/sorting/selection_sort.php) - 未ソート部分から最小または最大の要素を選び、先頭と交換するソート
- [挿入ソート](/src/algorithms/sorting/insertion_sort.php) - 適切な位置を見つけて要素を挿入し、部分的に整列させるソート
- [ヒープソート](/src/algorithms/sorting/heap_sort.php) - ヒープ構造を利用し、効率的に整列させるソート
- [マージソート](/src/algorithms/sorting/merge_sort.php) - 分割統治法を使用した安定ソート
- [クイックソート](/src/algorithms/sorting/quick_sort.php) - 分割統治法を使用した不安定だが高速なソート
- [シェルソート](/src/algorithms/sorting/shell_sort.php) - 挿入ソートを改良し、間隔を縮めながら整列させるソート
- [カウントソート](/src/algorithms/sorting/counting_sort.php) - 値の範囲が限られている時に有効な非比較ソート
- [基数ソート](/src/algorithms/sorting/radix_sort.php) - 整数の各桁ごとに処理する安定ソート
--------------------------------------------------------------------------------------------------

[⬆︎目次に戻る](#目次)
