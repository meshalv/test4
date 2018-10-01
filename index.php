<?php

include_once __DIR__.'/src/Calculator.php';

use src\Calculator;

$first = '10000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
$second ='90000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';

$calculator = new Calculator($first, $second);
$sum = $calculator->sum();

echo $sum;