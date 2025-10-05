<?php

spl_autoload_register(function ($class_name) {
    $filename = __DIR__ . "/models/" . $class_name . ".php";
    if (is_file($filename)) {
        require_once $filename;
    }
});

$human = new Human("Anne", 20, "USA");
echo $human->introduce() . PHP_EOL;     // Hi, I'm Anne.
