<?php
require_once('./classes/Color.php');

use classes\Color;

echo '<pre>';

try {
    $c1 = new Color(220, 20, 230);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

try {
    $c2 = new Color(220, 20, 230);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

try {
    $c3 = new Color(230, 220, 110);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

var_dump($c1->getRed());
var_dump($c1->getGreen());
var_dump($c1->getBlue());

var_dump($c1->equals($c2));
var_dump($c2->equals($c3));

try {
    $randomColor = Color::random();
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

var_dump($randomColor);

try {
    $mixedColor = $c3->mix($randomColor);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

var_dump($mixedColor->getRed());
var_dump($mixedColor->getGreen());
var_dump($mixedColor->getBlue());