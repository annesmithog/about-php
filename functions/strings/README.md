# String関数

## 目次

[出力](#出力)
- [echo](#echo) - 1つ以上の文字列を出力する
- [print](#print) - 文字列を出力する
--------------------------------------------------------------------------------------------------
[比較](#比較)
- [strcmp](#strcmp) - バイナリセーフな文字列比較
- [strcasecmp](#strcasecmp) - バイナリセーフな文字列比較 (大文字小文字区別なし)
- [strnatcmp](#strnatcmp) - "自然順"アルゴリズムにより文字列比較
- [strnatcasecmp](#strnatcasecmp) - "自然順"アルゴリズムにより文字列比較 (大文字小文字区別なし)
- [strncmp](#strncmp) - 最初のn文字に対してバイナリセーフな文字列比較
- [strncasecmp](#strncasecmp) - 最初のn文字に対してバイナリセーフな文字列比較 (大文字小文字区別なし)
--------------------------------------------------------------------------------------------------
[エンコード／デコード](#エンコードデコード)
- [convert_uuencode](#convert_uuencode) - 文字列をuuencodeする
- [convert_uudecode](#convert_uudecode) - uuencodeされた文字列をデコードする
--------------------------------------------------------------------------------------------------
[HTML関連](#html関連)
- [htmlspecialchars](#htmlspecialchars) - 特殊文字をHTMLエンティティに変換する
- [htmlspecialchars_decode](#htmlspecialchars_decode) - 特殊なHTMLエンティティを文字に戻す
- [htmlentities](#htmlentities) - 適用可能な文字を全てHTMLエンティティに変換する
- [strip_tags](#strip_tags) - 文字列からHTMLおよびPHPタグを取り除く
- [addcslashes](#addcslashes) - C言語と同様にスラッシュで文字列をクォートする
- [addslashes](#addslashes) - 文字列をスラッシュでクォートする
- [nl2br](#nl2br) - 改行文字の前にHTMLの改行タグを挿入する
- [quotemeta](#quotemeta) - メタ文字をクォートする
- [stripcslashes](#stripcslashes) - addcslashesでクォートされた文字列をアンクォートする
- [stripslashes](#stripslashes) - クォートされた文字列のクォート部分を取り除く
--------------------------------------------------------------------------------------------------
[文字列分割](#文字列分割)
- [explode](#explode) - 文字列を文字列により分割する
- [str_split](#str_split) - 文字列を配列に変換する
- [wordwrap](#wordwrap) - 指定した文字数で文字列を分割する
- [parse_str](#parse_str) - URLのクエリストリングとして文字列をパースする
- [str_getcsv](#str_getcsv) - CSV文字列をパースして配列に格納する
--------------------------------------------------------------------------------------------------
[文字列置換](#文字列置換)
- [str_replace](#str_replace) - 検索文字列に一致した全ての文字列を置換する
- [str_ireplace](#str_ireplace) - 検索文字列に一致した全ての文字列を置換する (大文字小文字区別なし)
- [substr_replace](#substr_replace) - 文字列の一部を置換する
- [ucfirst](#ucfirst) - 文字列の最初の文字を大文字に置換する
- [lcfirst](#lcfirst) - 文字列の最初の文字を小文字に置換する
- [strtolower](#strtolower) - 文字列を小文字に置換する
- [strtoupper](#strtoupper) - 文字列を大文字に置換する
- [ucwords](#ucwords) - 文字列の各単語の最初の文字を大文字に置換する
- [strtr](#strtr) - 文字の変換あるいは部分文字列の置換
--------------------------------------------------------------------------------------------------
[文字列探索](#文字列探索)
- [strpos](#strpos) - 文字列内の部分文字列が最初に現れる場所を見つける
- [stripos](#stripos) - 文字列内の部分文字列が最初に現れる場所を見つける (大文字小文字区別なし)
- [strstr](#strstr) - 文字列が最初に現れる場所を見つける
- [stristr](#stristr) - 文字列が最初に現れる場所を見つける (大文字小文字区別なし)
- [strchr](#strchr) - strstrのエイリアス
- [strrpos](#strrpos) - 文字列が最後に現れる場所を見つける
- [strripos](#strripos) - 文字列が最後に現れる場所を見つける (大文字小文字区別なし)
- [str_contains](#str_contains) - 文字列に、指定文字列が含まれるか調べる
- [str_starts_with](#str_starts_with) - 文字列が、指定文字列で始まるか調べる
- [str_ends_with](#str_ends_with) - 文字列が、指定文字列で終わるか調べる
- [substr](#substr) - 文字列の一部分を返す
- [strpbrk](#strpbrk) - 文字列の中から任意の文字を探す
- [strspn](#strspn) - 指定したマスク内に含まれる文字からなる文字列の最初のセグメントの長さを探す
- [strrchr](#strrchr) - 文字列中に文字が最後に現れる場所を取得する
--------------------------------------------------------------------------------------------------
[文字列除去](#文字列除去)
- [trim](#trim) - 文字列の先頭及び末尾のホワイトスペースを取り除く
- [ltrim](#ltrim) - 文字列の最初から空白(もしくはその他の文字)を取り除く
- [rtrim](#rtrim) - 文字列の最後から空白(もしくはその他の文字)を取り除く
- [chop](#chop) - rtrimのエイリアス
--------------------------------------------------------------------------------------------------
[その他](#その他)
- [chr](#chr) - 数値から、1バイトの文字列を生成する
- [ord](#ord) - 文字列の先頭バイトを、0 から 255 までの値に変換する
- [similar_text](#similar_text) - 二つの文字列の間の類似性を計算する
- [str_decrement](#str_decrement) - 英数字からなる文字列をデクリメントする
- [str_increment](#str_increment) - 英数字からなる文字列をインクリメントする
- [implode](#implode) - 配列要素を文字列により連結する
- [join](#join) - implode のエイリアス
- [str_pad](#str_pad) - 文字列を固定長の他の文字列で埋める
- [str_repeat](#str_repeat) - 文字列を反復する
- [str_shuffle](#str_shuffle) - 文字列をランダムにシャッフルする
- [str_word_count](#str_word_count) - 文字列に使用されている単語についての情報を返す
- [strlen](#strlen) - 文字列の長さを得る
- [strrev](#strrev) - 文字列を逆順にする
- [substr_count](#substr_count) - 副文字列の出現回数を数える

[⬆︎目次トップに戻る](#目次)

## 出力
<a name="echo"></a>

`echo(string ...$expressions): void` - 1つ以上の文字列を出力する

<a name="print"></a>

`print(string $expression): int` - 文字列を出力する

[⬆︎目次に戻る](#目次)

## 比較
<a name="strcmp"></a>

`strcmp(string $string1, string $string2): int` - バイナリセーフな文字列比較
```php
echo strcmp("a", "a") . PHP_EOL;    // 0
echo strcmp("a", "A") . PHP_EOL;    // 32
echo strcmp("a", "b") . PHP_EOL;    // -1
```

<a name="strcasecmp"></a>

`strcasecmp(string $string1, string $string2): int` - バイナリセーフな文字列比較 (大文字小文字区別なし)
```php
echo strcasecmp("a", "a") . PHP_EOL;    // 0
echo strcasecmp("a", "A") . PHP_EOL;    // 0
echo strcasecmp("a", "b") . PHP_EOL;    // -1
```

<a name="strnatcmp"></a>

`strnatcmp(string $string1, string $string2): int` - "自然順"アルゴリズムにより文字列比較
```php
$arr = ["img10", "img1", "img2"];
usort($arr, "strcmp");
print_r($arr);          // ["img1", "img10", "img2"]
usort($arr, "strnatcmp");
print_r($arr);          // ["img1", "img2", "img10"]
```

<a name="strnatcasecmp"></a>

`strnatcasecmp(string $string1, string $string2): int` - "自然順"アルゴリズムにより文字列比較 (大文字小文字区別なし)
```php
$arr = ["img10", "img1", "Img2"];
usort($arr, "strcmp");
print_r($arr);          // ["Img2", "img1", "img10"]
usort($arr, "strnatcasecmp");
print_r($arr);          // ["img1", "Img2", "img10"]
```

<a name="strncmp"></a>

`strncmp(string $string1, string $string2, int $length): int` - 最初のn文字に対してバイナリセーフな文字列比較
```php
echo strncmp("Hello AAA", "Hello BBB", 5) . PHP_EOL;    // 0
echo strncmp("Hello AAA", "Hello BBB", 8) . PHP_EOL;    // -1
```

<a name="strncasecmp"></a>

`strncasecmp(string $string1, string $string2, int $length): int` - 最初のn文字に対してバイナリセーフな文字列比較 (大文字小文字区別なし)
```php
echo strncasecmp("Hello AAA", "Hello aaa", 5) . PHP_EOL;    // 0
echo strncasecmp("Hello AAA", "Hello aaa", 8) . PHP_EOL;    // 0
echo strncasecmp("Hello AAA", "Hello bca", 8) . PHP_EOL;    // -1
```

[⬆︎目次に戻る](#目次)

## エンコード／デコード

<a name="convert_uuencode"></a>

`convert_uuencode(string $string): string` - 文字列をuuencodeする
```php
echo convert_uuencode("Hello\r\n"); // '2&5L;&\-"@``
```

<a name="convert_uudecode"></a>

`convert_uudecode(string $string): string|false` - uuencodeされた文字列をデコードする
```php
$d = convert_uuencode("Hello\r\n");
echo convert_uudecode($d);          // Hello
```

[⬆︎目次に戻る](#目次)

## HTML関連

<a name="htmlspecialchars"></a>

`htmlspecialchars(string $string, int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, ?string $encoding = null, bool $double_encode = true): string` - 特殊文字をHTMLエンティティに変換する
```php
$s = "<a href='test.com'>Test</a>";
echo htmlspecialchars($s, ENT_QUOTES);  // &lt;a href=&#039;test.com&#039;&gt;Test&lt;/a&gt;
```

<a name="htmlspecialchars_decode"></a>

`htmlspecialchars_decode(string $string, int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401): string` - 特殊なHTMLエンティティを文字に戻す
```php
$s = "&lt;a href=&#039;test.com&#039;&gt;Test&lt;/a&gt;";
echo htmlspecialchars_decode($s);   // <a href='test.com'>Test</a>
```

<a name="htmlentities"></a>

`htmlentities(string $string, int $flags = ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, ?string $encoding = null, bool $double_encode = true): string` - 適用可能な文字を全てHTMLエンティティに変換する
```php
$s = "A 'quote' is <b>bold</b>.";
echo htmlentities($s);  // A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;.
```

<a name="strip_tags"></a>

`strip_tags(string $string, array|string|null $allowed_tags = null): string` - 文字列からHTMLおよびPHPタグを取り除く
```php
$s = "START <br>INTERMISSION <?php echo 'Wow'; ?>END";
echo strip_tags($s);    // START INTERMISSION END
```

<a name="addcslashes"></a>

`addcslashes(string $string, string $characters): string` - C言語と同様にスラッシュで文字列をクォートする
```php
echo addcslashes("Hello, WORLD", "A..Z");   // \Hello, \W\O\R\L\D
```

<a name="addslashes"></a>

`addslashes(string $string): string` - 文字列をスラッシュでクォートする
```php
echo addslashes("'A', " . '"B", ' . "\\, ");
```

<a name="nl2br"></a>

`nl2br(string $string, bool $use_xhtml = true): string` - 改行文字の前にHTMLの改行タグを挿入する
```php
echo nl2br("End.\n- fin.");
/*
End.<br />
- fin.
*/
```

<a name="quotemeta"></a>

`quotemeta(string $string): string` - メタ文字をクォートする
```php
echo quotemeta(". \ + * ? [ ^ ] ( $ )");    // \. \\ \+ \* \? \[ \^ \] \( \$ \)
```

<a name="stripcslashes"></a>

`stripcslashes(string $string): string` - addcslashesでクォートされた文字列をアンクォートする
```php
echo stripcslashes("\H\E\L\L\O");   // HELLO
```

<a name="stripslashes"></a>

`stripslashes(string $string): string` - クォートされた文字列のクォート部分を取り除く
```php
echo "I\'m A Loser" . PHP_EOL;                  // I\'m A Loser
echo stripslashes("I\'m A Loser") . PHP_EOL;    // I'm A Loser
```

[⬆︎目次に戻る](#目次)

## 文字列分割

<a name="explode"></a>

`explode(string $separator, string $string, int $limit = PHP_INT_MAX): array` - 文字列を文字列により分割する
```php
$arr = explode(" ", "10 20 30");    // [10, 20, 30]
$arr = explode("|", "XX|YY|Z Z");   // ["XX", "YY", "Z Z"]
```

<a name="str_split"></a>

`str_split(string $string, int $length = 1): array` - 文字列を配列に変換する
```php
$s = "abcdef";
print_r(str_split($s)) . PHP_EOL;       // ["a", "b", "c", "d", "e", "f"]
print_r(str_split($s, 2)) . PHP_EOL;    // ["ab", "cd", "ef"]
```

<a name="wordwrap"></a>

`wordwrap(string $string, int $width = 75, string $break = "\n", bool $cut_long_words = false): string` - 指定した文字数で文字列を分割する
```php
$s = "I've been in the hills fucking superstar, feelin like a popstar.";
$x = wordwrap($s, 20, "<br />\n");
/*
I've been in the<br />
hills fucking<br />
superstar, feelin<br />
like a popstar.
*/
```

<a name="parse_str"></a>

`parse_str(string $string, array &$result): void` - URLのクエリストリングとして文字列をパースする
```php
$s = "one=1&arr[]=2+3&arr[]=4";
parse_str($s, $output);
echo $output["one"] . PHP_EOL;      // 1
echo $output["arr"][0] . PHP_EOL;   // 2 3
echo $output["arr"][1] . PHP_EOL;   // 4
```

<a name="str_getcsv"></a>

`str_getcsv(string $string, string $separator = ",", string $enclosure = "\"", string $escape = "\\"): array` - CSV文字列をパースして配列に格納する
```php
$s = "id,name,release";
$data = str_getcsv($s, escape: "\\");
```

[⬆︎目次に戻る](#目次)

## 文字列置換

<a name="str_replace"></a>

`str_replace(array|string $search, array|string $replace, string|array $subject, int &$count = null): string|array` - 検索文字列に一致した全ての文字列を置換する
```php
echo str_replace("Hello", "Fuck", "Hello, World!"); // Fuck, World!
```

<a name="str_ireplace"></a>

`str_ireplace(array|string $search, array|string $replace, string|array $subject, int &$count = null): string|array` - 検索文字列に一致した全ての文字列を置換する (大文字小文字区別なし)
```php
echo str_ireplace("hello", "fuck", "HELLO THE WORLD."); // fuck THE WORLD.
```

<a name="substr_replace"></a>

`substr_replace(array|string $string, array|string $replace, array|int $offset, array|int|null $length = null): string|array` - 文字列の一部を置換する
```php
echo substr_replace("123456789", "#", 5, -1) . PHP_EOL; // 12345#9
echo substr_replace("123456789", "#", 5, 0) . PHP_EOL;  // 12345#6789
echo substr_replace("123456789", "#", 5, 1) . PHP_EOL;  // 12345#789
```

<a name="ucfirst"></a>

`ucfirst(string $string): string` - 文字列の最初の文字を大文字に置換する
```php
echo ucfirst("hello, world!");  // Hello, world!
```

<a name="lcfirst"></a>

`lcfirst(string $string): string` - 文字列の最初の文字を小文字に置換する
```php
echo lcfirst("Hello, World!");  // hello, World!
```

<a name="strtolower"></a>

`strtolower(string $string): string` - 文字列を小文字に置換する
```php
echo strtolower("Oh My God");   // oh my god
```

<a name="strtoupper"></a>

`strtoupper(string $string): string` - 文字列を大文字に置換する
```php
echo strtoupper("Oh My God");   // OH MY GOD
```

<a name="ucwords"></a>

`ucwords(string $string, string $separators = " \t\r\n\f\v"): string` - 文字列の各単語の最初の文字を大文字に置換する
```php
echo ucwords("hello, world!");  // Hello, World!
```

<a name="strtr"></a>

`strtr(string $string, string $from, string $to): string` - 文字の変換あるいは部分文字列の置換
```php
$trans = ["fuck" => "f**k", "bitch" => "b***h", "ass" => "a**"];
echo strtr("fuck you bitch ass", $trans);   // f**k you b***h a**
```

[⬆︎目次に戻る](#目次)

## 文字列探索

<a name="strpos"></a>

`strpos(string $haystack, string $needle, int $offset = 0): int|false` - 文字列内の部分文字列が最初に現れる場所を見つける
```php
echo var_export(strpos("abc", "c")) . PHP_EOL;  // 2
echo var_export(strpos("abc", "d")) . PHP_EOL;  // false
```

<a name="stripos"></a>

`stripos(string $haystack, string $needle, int $offset = 0): int|false` - 文字列内の部分文字列が最初に現れる場所を見つける (大文字小文字区別なし)
```php
echo var_export(stripos("xyz", "a")) . PHP_EOL; // false
echo var_export(stripos("abc", "a")) . PHP_EOL; // 0
echo var_export(stripos("cbA", "a")) . PHP_EOL; // 2
```

<a name="strstr"></a>

`strstr(string $haystack, string $needle, bool $before_needle = false): string|false` - 文字列が最初に現れる場所を見つける
```php
echo strstr("What's the fuck", "the") . PHP_EOL;        // the fuck
echo strstr("What's the fuck", "the", true) . PHP_EOL;  // What's
```

<a name="strchr"></a>

strchr: strstrのエイリアス

<a name="stristr"></a>

`stristr(string $haystack, string $needle, bool $before_needle = false): string|false` - 文字列が最初に現れる場所を見つける (大文字小文字区別なし)
```php
echo stristr("What's the fuck", "THE") . PHP_EOL;       // the fuck
echo stristr("What's the fuck", "THE", true) . PHP_EOL; // What's
```

<a name="strrpos"></a>

`strrpos(string $haystack, string $needle, int $offset = 0): int|false` - 文字列が最後に現れる場所を見つける
```php
echo var_export(strrpos("abc", "c")) . PHP_EOL;  // 2
echo var_export(strrpos("abc", "d")) . PHP_EOL;  // false
```

<a name="strripos"></a>

`strripos(string $haystack, string $needle, int $offset = 0): int|false` - 文字列が最後に現れる場所を見つける (大文字小文字区別なし)
```php
echo var_export(strripos("ABC", "c")) . PHP_EOL;  // 2
echo var_export(strripos("ABC", "d")) . PHP_EOL;  // false
```

<a name="str_contains"></a>

`str_contains(string $haystack, string $needle): bool` - 文字列に、指定文字列が含まれるか調べる
```php
echo var_export(str_contains("Swimming", "ing")) . PHP_EOL; // true
echo var_export(str_contains("Swimming", "xxx")) . PHP_EOL; // false
```

<a name="str_starts_with"></a>

`str_starts_with(string $haystack, string $needle): bool` - 文字列が、指定文字列で始まるか調べる
```php
echo var_export(str_starts_with("Swimming", "Swim"));  // true
```

<a name="str_ends_with"></a>

`str_ends_with(string $haystack, string $needle): bool` - 文字列が、指定文字列で終わるか調べる
```php
echo var_export(str_ends_with("Swimming", "ing"));  // true
```

<a name="substr"></a>

`substr(string $string, int $offset, ?int $length = null): string` - 文字列の一部分を返す
```php
// オフセット-1にあたる文字を返す
echo substr("abcdef", -1) . PHP_EOL;    // f
// オフセット-2から最後までを返す
echo substr("abcdef", -2) . PHP_EOL;    // ef
// オフセット-3から1文字だけを返す
echo substr("abcdef", -3, 1) . PHP_EOL; // d
```

<a name="strpbrk"></a>

`strpbrk(string $string, string $characters): string|false` - 文字列の中から任意の文字を探す
```php
echo var_export(strpbrk("Hello", "e")) . PHP_EOL;   // "ello"
echo var_export(strpbrk("Hello", "X")) . PHP_EOL;   // false
```

<a name="strspn"></a>

`strspn(string $string, string $characters, int $offset = 0, ?int $length = null): int` - 指定したマスク内に含まれる文字からなる文字列の最初のセグメントの長さを探す
```php
// subjectの最初の文字がmaskのどの文字とも一致しない
echo strspn("foo", "o") . PHP_EOL;          // 0
// subjectのオフセット1から2文字を調べる
echo strspn("foo", "o", 1, 2) . PHP_EOL;    // 2
// subjectのオフセット1から1文字を調べる
echo strspn("foo", "o", 1, 1) . PHP_EOL;    // 1
```

<a name="strrchr"></a>

`strrchr(string $haystack, string $needle, bool $before_needle = false): string|false` - 文字列中に文字が最後に現れる場所を取得する
```php
echo var_export(strrchr("abc", "b")) . PHP_EOL;  // "bc"
echo var_export(strrchr("abc", "d")) . PHP_EOL;  // false
```

[⬆︎目次に戻る](#目次)

## 文字列除去

<a name="trim"></a>

`trim(string $string, string $characters = " \n\r\t\v\x00"): string` - 文字列の先頭及び末尾のホワイトスペースを取り除く
```php
$s = "  Hello World   ";
echo "`" . trim($s) . "`\n";            // `Hello World`
echo "`" . trim($s, " HWorld") . "`\n"; // `e`
```

<a name="ltrim"></a>

`ltrim(string $string, string $characters = " \n\r\t\v\x00"): string` - 文字列の最初から空白(もしくはその他の文字)を取り除く
```php
$s = "  Hello World   ";
echo "`" . ltrim($s) . "`\n";       // `Hello World   `
echo "`" . ltrim($s, " H") . "`\n"; // `ello World   `
```

<a name="rtrim"></a>

`rtrim(string $string, string $characters = " \n\r\t\v\x00"): string` - 文字列の最後から空白(もしくはその他の文字)を取り除く
```php
$s = "  Hello World   ";
echo "`" . rtrim($s) . "`\n";           // `  Hello World`
echo "`" . rtrim($s, " dlr") . "`\n";   // `  Hello Wo`
```

<a name="chop"></a>

chop - rtrimのエイリアス

[⬆︎目次に戻る](#目次)

## その他

<a name="chr"></a>

`chr(int $codepoint): string` - 数値から、1バイトの文字列を生成する
```php
echo chr(65);   // A
echo chr(90);   // Z
```

<a name="ord"></a>

`ord(string $character): int` - 文字列の先頭バイトを、0 から 255 までの値に変換する
```php
echo ord("A");  // 65
```

<a name="similar_text"></a>

`similar_text(string $string1, string $string2, float &$percent = null): int` - 二つの文字列の間の類似性を計算する
```php
$sim = similar_text("FF10", "FF10", $perc);
echo "類似度: {$sim} ({$perc}%)" . PHP_EOL; // 類似度: 4 (100%)
$sim = similar_text("Final Fantasy VII", "Final Fantasy X", $perc);
echo "類似度: {$sim} ({$perc}%)" . PHP_EOL; // 類似度: 14 (87.5%)
```

<a name="str_decrement"></a>

`str_decrement(string $string): string` - 英数字からなる文字列をデクリメントする
```php
echo str_decrement("ABC");  // ABB
```

<a name="str_increment"></a>

`str_increment(string $string): string` - 英数字からなる文字列をインクリメントする
```php
echo str_increment("ABC");  // ABD
```

<a name="implode"></a>

`implode(string $separator, array $array): string` - 配列要素を文字列により連結する
```php
$artists = ["Post Malone", "Khalid", "Migos"];
echo implode(", ", $artists);   // Post Malone, Khalid, Migos
```

<a name="join"></a>

join - implode のエイリアス

<a name="str_pad"></a>

`str_pad(string $string, int $length, string $pad_string = " ", int $pad_type = STR_PAD_RIGHT): string` - 文字列を固定長の他の文字列で埋める
```php
echo str_pad("1234", 10) . PHP_EOL;                     // "1234      "
echo str_pad("1234", 10, "*", STR_PAD_LEFT) . PHP_EOL;  // "******1234"
echo str_pad("1234", 10, "*", STR_PAD_BOTH) . PHP_EOL;  // "***1234***"
echo str_pad("1234", 10, "*", STR_PAD_RIGHT) . PHP_EOL; // "1234******"
echo str_pad("1234", 10, "______________") . PHP_EOL;   // "1234______"
```

<a name="str_repeat"></a>

`str_repeat(string $string, int $times): string` - 文字列を反復する
```php
echo str_repeat("x", 10);   // xxxxxxxxxx
```

<a name="str_shuffle"></a>

`str_shuffle(string $string): string` - 文字列をランダムにシャッフルする
```php
echo str_shuffle("12345");  // 34152
```

<a name="str_word_count"></a>

`str_word_count(string $string, int $format = 0, ?string $characters = null): array|int` - 文字列に使用されている単語についての情報を返す
```php
$s = "Hello muhfucka fuck u bih.";

print_r(str_word_count($s, 1));
/*
[0] => Hello
[1] => muhfucka
[2] => fuck
[3] => u
[4] => bih
*/

print_r(str_word_count($s, 2));
/*
[0] => Hello
[6] => muhfucka
[15] => fuck
[20] => u
[22] => bih
*/
```

<a name="strlen"></a>

`strlen(string $string): int` - 文字列の長さを得る
```php
echo strlen("ABCD");    // 4
```

<a name="strrev"></a>

`strrev(string $string): string` - 文字列を逆順にする
```php
echo strrev("yagami");  // imagay
```

<a name="substr_count"></a>

`substr_count(string $haystack, string $needle, int $offset = 0, ?int $length = null): int` - 副文字列の出現回数を数える
```php
$s = "I been livin' fast, fast, fast, fast.";
echo substr_count($s, "fast");          // 4
echo substr_count($s, "fast", 25);      // 2
echo substr_count($s, "fast", 25, 4);   // 0
```

[⬆︎目次に戻る](#目次)

