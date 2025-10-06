# 数学関数

## 目次

- [abs](#abs) - 絶対値
- [ceil](#ceil) - 端数の切り上げ
- [floor](#floor) - 端数の切り捨て
- [fmod](#fmod) - 引数で除算した際の剰余を返す
- [intdiv](#intdiv) - 整数値の除算
- [max](#max) - 最大値を返す
- [min](#min) - 最小値を返す
- [pi](#pi) - 円周率の値を返す
- [round](#round) - 浮動小数点数を丸める
------------------------------------------------------------
- [bindec](#bindec) - 2進数を10進数に変換する
- [decbin](#decbin) - 10進数を2進数に変換する
- [dechex](#dechex) - 10進数を16進数に変換する
- [decoct](#decoct) - 10進数を8進数に変換する
- [hexdec](#hexdec) - 16進数を10進数に変換する
- [octdec](#octdec) - 8進数を10進数に変換する

## abs
`abs(int|float $num): int|float` - 絶対値
```php
echo abs(-2);   // 2
```

## ceil
`ceil(int|float $num): float` - 端数の切り上げ
```php
echo ceil(3.01); // 4
```

## floor
`floor(int|float $num): float` - 端数の切り捨て
```php
echo floor(9.999);  // 9
```

## fmod
`fmod(float $num1, float $num2): float` - 引数で除算した際の剰余を返す
```php
echo fmod(11, 3);    // 2
```

## intdiv
`intdiv(int $num1, int $num2): int` - 整数値の除算
```php
echo intdiv(11, 3); // 3
```

## max
`max(mixed $value, mixed ...$values): mixed` - 最大値を返す
```php
echo max(50, 49, 0, 51, 48);    // 51
```

## min
`min(mixed $value, mixed ...$values): mixed` - 最小値を返す
```php
echo min(3, 1, 2);  // 1
```

## octdec
`octdec(string $octal_string): int|float` - 8進数を10進数に変換する
```php
echo octdec("10");  // 8
```

## round
`round(int|float $num, int $precision = 0, int|RoundingMode $mode = RoundingMode::HalfAwayFromZero): float` - 浮動小数点数を丸める
```php
echo round(4.55, 1) . PHP_EOL;  // 4.6
echo round(4.55, 0) . PHP_EOL;  // 5
```

## bindec
`bindec(string $binary_string): int|float` - 2進数を10進数に変換する
```php
echo bindec("0011");    // 3
```

## decbin
`decbin(int $num): string` - 10進数を2進数に変換する
```php
echo decbin(8); // 1000
```

## dechex
`dechex(int $num): string` - 10進数を16進数に変換する
```php
echo dechex(15);    // f
```

## decoct
`decoct(int $num): string` - 10進数を8進数に変換する
```php
echo decoct(8); // 10
```

## hexdec
`hexdec(string $hex_string): int|float` - 16進数を10進数に変換する
```php
echo hexdec("A");   // 10
```

## octdec
`octdec(string $octal_string): int|float` - 8進数を10進数に変換する
```php
echo octdec("10");  // 8
```
