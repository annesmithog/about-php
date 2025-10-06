<?php




echo var_export(strrchr("abc", "b")) . PHP_EOL;  // "bc"
echo var_export(strrchr("abc", "d")) . PHP_EOL;  // false

