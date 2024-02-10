<?php

namespace Classes\Logger\DeliveryMethods;

use Classes\Singleton;

class ToConsole extends Singleton implements DeliveryMethod
{

    public function deliver(string $formattedMessage): void
    {
        echo "Вивід формату ({$formattedMessage}) в консоль";
    }
}