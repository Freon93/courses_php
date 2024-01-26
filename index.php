<?php
require_once('./classes/Color.php');

use classes\Color;

echo '<pre>';

$c1 = new Color(270, 20, 260);
$c2 = new Color(270, 20, 260);
$c3 = new Color(230, 220, 110);

var_dump($c1->getRed());
var_dump($c1->getGreen());
var_dump($c1->getBlue());

var_dump($c1->equals($c2));
var_dump($c2->equals($c3));

$randomColor = Color::random();

var_dump($randomColor);

$mixedColor = $c3->mix($randomColor);

var_dump($mixedColor->getRed());
var_dump($mixedColor->getGreen());
var_dump($mixedColor->getBlue());