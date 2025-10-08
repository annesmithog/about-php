# SOLID原則

## 目次

- [単一責任原則](#単一責任原則-srp) - １つのクラスは１つの責務だけを持つべき
- [開放閉鎖原則](#開放閉鎖原則-ocp) - クラスは拡張に対してオープンであるべきだが、変更に対してはクローズであるべき
- [リスコフの置換原則](#リスコフの置換原則-lsp) - 派生クラスは基本クラスと置き換え可能であるべき
- [インターフェース分離の原則](#インターフェース分離の原則-isp) - クライアントは自分が使わないメソッドに依存してはいけない
- [依存性逆転の原則](#依存性逆転の原則-dip) - 高レベルモジュールは低レベルモジュールに依存してはならない

[⬆︎目次トップに戻る](#目次)

## SOLID原則

### 単一責任原則 (SRP)

１つのクラスは１つの責務だけを持つべきという考え方です。

以下に`Mail`クラスがあります。

```php
use FFI\Exception;

class Mail {
    private $to;
    private $subject;

    public function __construct($to, $subject) {
        $this->to = $to;
        $this->subject = $subject;
    }

    public function validate() {
        if (!filter_var($this->to, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("無効なメールアドレスです。");
        }
    }

    public function send() {
        $this->validate();
        echo "{$this->to}にメールを送信。内容: {$this->subject}";
    }
}
```

単一責任原則を遵守したコードに修正します。

```php
use FFI\Exception;

class Mail {
    public $to;
    public $subject;

    public function __construct($to, $subject) {
        $this->to = $to;
        $this->subject = $subject;
    }
}

class MailValidator {
    public function validate(Mail $mail) {
        if (!filter_var($mail->to, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("無効なメールアドレスです。");
        }    
    }
}

class MailSender {
    public function send(Mail $mail) {
        echo "{$mail->to}にメールを送信。内容: {$mail->subject}";
    }
}

try {
    $mail = new Mail("xxxxxxxx@example.com", "Hello, XXXXXXXXX");
    $validator = new MailValidator();
    $sender = new MailSender();

    $validator->validate($mail);
    $sender->send($mail);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

[⬆︎目次に戻る](#目次)

### 開放閉鎖原則 (OCP)

クラスは拡張に対してオープンであるべきだが、変更に対してはクローズであるべきという考え方です。

以下に`PriceCalculator`クラスがあります。

```php
class PriceCalculator {
    public function calculate($price, $type) {
        return match ($type) {
            "senior"    => $price * 0.7,    // シニア割
            "student"   => $price * 0.8,    // 学割
            "employee"  => $price * 0.9,    // 社員割
            default     => $price,
        };
    }
}

$priceCalculator = new PriceCalculator();
echo $priceCalculator->calculate(1000, "student");  // 800
```

開放閉鎖原則を遵守したコードに修正します。

```php
interface DiscountRule {
    public function apply($price): float;
}
class SeniorDiscount implements DiscountRule {
    public function apply($price): float {
        return $price * 0.7;
    }
}
class StudentDiscount implements DiscountRule {
    public function apply($price): float {
        return $price * 0.8;
    }
}
class EmployeeDiscount implements DiscountRule {
    public function apply($price): float {
        return $price * 0.9;
    }
}
class PriceCalculator {
    private $discountRule;

    public function __construct(DiscountRule $discountRule) {
        $this->discountRule = $discountRule;
    }

    public function calculate($price): float {
        return $this->discountRule->apply($price);
    }
}

$priceCalculator = new PriceCalculator(new StudentDiscount);
echo $priceCalculator->calculate(1000); // 800
```

[⬆︎目次に戻る](#目次)

### リスコフの置換原則 (LSP)

派生クラスは基本クラスと置き換え可能であるべきという考え方です。

以下に`Rectangle`クラスとそこから派生した`Square`クラスがあります。例として、`Square`クラスを`Rectangle`クラスとして扱うと、`setWidth`及び`setHeight`の振る舞いが期待とズレます。親クラスとの契約である「幅と高さは独立に設定できる」が守られていません。

```php
class Rectangle {
    protected $width;
    protected $height;
    public function setWidth($width) {
        $this->width = $width;
    }
    public function setHeight($height) {
        $this->height = $height;
    }
    public function getArea() {
        return $this->width * $this->height;
    }
}

class Square extends Rectangle {
    public function setWidth($width) {
        $this->width = $width;
        $this->height = $width;
    }
    public function setHeight($height) {
        $this->height = $height;
        $this->width = $height;
    }
}

function printArea(Rectangle $rect) {
    $rect->setWidth(4);
    $rect->setHeight(5);
    echo $rect->getArea() . PHP_EOL;
}

printArea(new Rectangle()); // 20
printArea(new Square());    // 25
```

リスコフの置換原則を遵守したコードに修正します。

```php
interface Shape {
    public function getArea(): float;
}

class Rectangle implements Shape {
    private $width;
    private $height;
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }
    public function getArea(): float {
        return $this->width * $this->height;
    }
}

class Square implements Shape {
    private $side;
    public function __construct($side) {
        $this->side = $side;
    }
    public function getArea(): float {
        return $this->side * $this->side;
    }
}

function printArea(Shape $shape) {
    echo $shape->getArea() . PHP_EOL;
}

printArea(new Rectangle(4, 5)); // 20
printArea(new Square(5));       // 25
```

[⬆︎目次に戻る](#目次)

### インターフェース分離の原則 (ISP)

クライアントは自分が使わないメソッドに依存してはいけないという考え方です。

以下に機能を詰め込みすぎた`Printer`インターフェースと、それを実装した`SimplePrinter`があります。

```php
use FFI\Exception;

interface Printer {
    public function printDocument($doc);
    public function scanDocument($doc);
    public function faxDocument($doc);
}

class SimplePrinter implements Printer {
    public function printDocument($doc) {
        echo "プリント" . PHP_EOL;
    }

    // スキャン機能がない
    public function scanDocument($doc) {
        throw new Exception("スキャンがサポートされていません。");
    }

    // ファックス機能がない
    public function faxDocument($doc) {
        throw new Exception("ファックスがサポートされていません。");
    }
}
```

インターフェース分離の原則を遵守したコードに修正します。

```php
interface Printer {
    public function printDocument($doc); 
}

interface Scanner {
    public function scanDocument($doc);
}

class SimplePrinter implements Printer {
    public function printDocument($doc) {
        echo "プリント" . PHP_EOL;
    }
}

class ComplicatedPrinter implements Printer, Scanner {
    public function printDocument($doc) {
        echo "プリント" . PHP_EOL;
    }
    public function scanDocument($doc) {
        echo "スキャン" . PHP_EOL;
    }
}
```

[⬆︎目次に戻る](#目次)

### 依存性逆転の原則 (DIP)

高レベルモジュールは低レベルモジュールに依存してはならないという考え方です。

高レベルモジュールとは「料金計算」や「通知処理」などのビジネスロジックで、低レベルモジュールは「割引ルールの具体クラス」や「SMTPメール送信」などの実装の詳細のことです。

以下に具体的な割引クラスに直接依存した`PriceCalculator`クラスがあります。

```php
class StudentDiscount {
    public function apply($price) {
        return $price * 0.8;
    }
}

class PriceCalculator {
    public function calculate($price) {
        return new StudentDiscount()->apply($price);
    }
}

$priceCalculator = new PriceCalculator();
echo $priceCalculator->calculate(1000); // 800
```

依存性逆転の原則に遵守したコードに修正します。

```php
interface DiscountRule {
    public function apply($price): float;
}

class StudentDiscount implements DiscountRule {
    public function apply($price): float {
        return $price * 0.8;
    }
}

class PriceCalculator {
    private $discountRule;

    public function __construct(DiscountRule $discountRule) {
        $this->discountRule = $discountRule;
    }

    public function calculate($price): float {
        return $this->discountRule->apply($price);
    }
}

$priceCalculator = new PriceCalculator(new StudentDiscount());
echo $priceCalculator->calculate(1000); // 800
```

[⬆︎目次に戻る](#目次)
