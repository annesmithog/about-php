# CType関数

## 目次

- [ctype_alnum](#ctype_alnum) - 英数字かどうかを調べる
- [ctype_alpha](#ctype_alpha) - 英字かどうかを調べる
- [ctype_cntrl](#ctype_cntrl) - 制御文字かどうかを調べる
- [ctype_digit](#ctype_digit) - 数字かどうかを調べる
- [ctype_graph](#ctype_graph) - 空白以外の印字可能な文字かどうかを調べる
- [ctype_lower](#ctype_lower) - 小文字かどうかを調べる
- [ctype_print](#ctype_print) - 印字可能な文字かどうかを調べる
- [ctype_punct](#ctype_punct) - 空白、英数字以外の出力可能かどうかを調べる
- [ctype_space](#ctype_space) - 空白文字かどうかを調べる
- [ctype_upper](#ctype_upper) - 大文字かどうかを調べる
- [ctype_xdigit](#ctype_xdigit) - 16進数を表す文字かどうかを調べる

[⬆︎目次トップに戻る](#目次)

<a name="ctype_alnum"></a>

`ctype_alnum(mixed $text): bool` - 英数字かどうかを調べる
```php
echo var_export(ctype_alnum("Number1")) . PHP_EOL;  // true
echo var_export(ctype_alnum("Number 1")) . PHP_EOL; // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_alpha"></a>

`ctype_alpha(mixed $text): bool` - 英字かどうかを調べる
```php
echo var_export(ctype_alpha("a")) . PHP_EOL;    // true
echo var_export(ctype_alpha("a1")) . PHP_EOL;   // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_cntrl"></a>

`ctype_cntrl(mixed $text): bool` - 制御文字かどうかを調べる
```php
echo var_export(ctype_cntrl("\r\n")) . PHP_EOL;     // true
echo var_export(ctype_cntrl("\r\na")) . PHP_EOL;    // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_digit"></a>

`ctype_digit(mixed $text): bool` - 数字かどうかを調べる
```php
echo var_export(ctype_digit("1")) . PHP_EOL;    // true
echo var_export(ctype_digit("1a")) . PHP_EOL;   // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_graph"></a>

`ctype_graph(mixed $text): bool` - 空白以外の印字可能な文字かどうかを調べる
```php
echo var_export(ctype_graph("asd")) . PHP_EOL;  // true
echo var_export(ctype_graph("\t")) . PHP_EOL;   // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_lower"></a>

`ctype_lower(mixed $text): bool` - 小文字かどうかを調べる
```php
echo var_export(ctype_lower("a")) . PHP_EOL;    // true
echo var_export(ctype_lower("A")) . PHP_EOL;    // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_print"></a>

`ctype_print(mixed $text): bool` - 印字可能な文字かどうかを調べる
```php
echo var_export(ctype_print("a")) . PHP_EOL;    // true
echo var_export(ctype_print("\t")) . PHP_EOL;   // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_punct"></a>

`ctype_punct(mixed $text): bool` - 空白、英数字以外の出力可能かどうかを調べる
```php
echo var_export(ctype_punct("!")) . PHP_EOL;    // true
echo var_export(ctype_punct("a")) . PHP_EOL;    // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_space"></a>

`ctype_space(mixed $text): bool` - 空白文字かどうかを調べる
```php
echo var_export(ctype_space("\r\n")) . PHP_EOL; // true
echo var_export(ctype_space("|")) . PHP_EOL;    // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_upper"></a>

`ctype_upper(mixed $text): bool` - 大文字かどうかを調べる
```php
echo var_export(ctype_upper("A")) . PHP_EOL;    // true
echo var_export(ctype_upper("a")) . PHP_EOL;    // false
```

[⬆︎目次に戻る](#目次)

<a name="ctype_xdigit"></a>

`ctype_xdigit(mixed $text): bool` - 16進数を表す文字かどうかを調べる
```php
echo var_export(ctype_xdigit("FFFF")) . PHP_EOL;    // true
echo var_export(ctype_xdigit("FFFG")) . PHP_EOL;    // false
```

[⬆︎目次に戻る](#目次)
