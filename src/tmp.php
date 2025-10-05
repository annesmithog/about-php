<?php






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


