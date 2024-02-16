<?php

use Classes\Logger\DeliveryMethods\ByEmail;
use Classes\Logger\DeliveryMethods\BySms;
use Classes\Logger\DeliveryMethods\ToConsole;
use Classes\Logger\Formats\Raw;
use Classes\Logger\Formats\WithDate;
use Classes\Logger\Formats\WithDateAndDetails;
use Classes\Logger\Logger;

require_once './vendor/autoload.php';

echo '<pre>';

$logger = Logger::getInstance();

$logger->log('Emergency error! Please fix me!');
echo "\n";

$logger->changeMessageFormat(WithDate::getInstance());
$logger->changeDeliveryMethod(BySms::getInstance());

$logger->log('Emergency error! Please fix me!');
echo "\n";

$logger2 = Logger::getInstance(WithDateAndDetails::getInstance(), ByEmail::getInstance());

$logger2->log('Emergency error! Please fix me!');
echo "\n";

var_dump($logger);
var_dump($logger2);
