<?php

namespace Classes\Logger\DeliveryMethods;

use Classes\Singleton;

class ByEmail extends Singleton implements DeliveryMethod
{
    public function deliver(string $formattedMessage): void
    {
        echo "Вивід формату ({$formattedMessage}) по email";
    }
}