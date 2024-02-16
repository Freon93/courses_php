<?php

namespace Classes\Logger\DeliveryMethods;

interface DeliveryMethod
{
    public function deliver(string $formattedMessage): void;
}