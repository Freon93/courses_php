<?php

require_once './vendor/autoload.php';

use Classes\TaxiDelivery\BusinessDelivery;
use Classes\TaxiDelivery\ComfortDelivery;
use Classes\TaxiDelivery\EconomDelivery;

$economDelivery = new EconomDelivery();
$comfortDelivery = new ComfortDelivery();
$businessDelivery = new BusinessDelivery();

echo '</pre>';
echo $economDelivery->getData() . '<br>';
echo $comfortDelivery->getData() . '<br>';
echo $businessDelivery->getData() . '<br>';