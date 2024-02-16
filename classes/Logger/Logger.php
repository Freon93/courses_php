<?php

namespace Classes\Logger;

use Classes\Logger\DeliveryMethods\DeliveryMethod;
use Classes\Logger\DeliveryMethods\ToConsole;
use Classes\Logger\Formats\MessageFormat;
use Classes\Logger\Formats\Raw;
use Classes\Singleton;

class Logger extends Singleton
{
    protected MessageFormat $messageFormat;
    protected DeliveryMethod $deliveryMethod;

    protected function __construct(MessageFormat|null $messageFormat = null, DeliveryMethod|null $deliveryMethod = null)
    {
        parent::__construct();
        $this->messageFormat = $messageFormat ?? Raw::getInstance();
        $this->deliveryMethod = $deliveryMethod ?? ToConsole::getInstance();
    }

    public function log($string): void
    {
        $this->deliveryMethod->deliver($this->messageFormat->format($string));
    }

    public function changeMessageFormat(MessageFormat $messageFormat): void
    {
        $this->messageFormat = $messageFormat;
    }

    public function changeDeliveryMethod(DeliveryMethod $deliveryMethod): void
    {
        $this->deliveryMethod = $deliveryMethod;
    }

    public static function getInstance(MessageFormat|null $messageFormat = null, DeliveryMethod|null $deliveryMethod = null): static
    {
        $cls = static::class;

        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static($messageFormat, $deliveryMethod);
        }

        if (isset($messageFormat)) {
            self::$instances[$cls]->changeMessageFormat($messageFormat);
        }

        if (isset($deliveryMethod)) {
            self::$instances[$cls]->changeDeliveryMethod($deliveryMethod);
        }

        return self::$instances[$cls];
    }
}