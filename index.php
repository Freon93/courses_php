<?php
require_once './vendor/autoload.php';

use Classes\Test;

echo '<pre>';

$test = new Test();

echo $test->getSum();