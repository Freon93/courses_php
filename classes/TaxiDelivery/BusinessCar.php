<?php

namespace Classes\TaxiDelivery;

class BusinessCar extends CarsHelper implements TaxiCar
{
    public function getModel(): string
    {
       $this->updateRawData(CarLevels::BUSINESS_CLASS_LEVEL);

       return static::$_rawData[self::BUSINESS_CLASS_LEVEL][$this->getCarId(self::BUSINESS_CLASS_LEVEL)]['model'] ?? 'Model';
    }

    public function getPrice(): float
    {
        $this->updateRawData(CarLevels::BUSINESS_CLASS_LEVEL);

        return static::$_rawData[self::BUSINESS_CLASS_LEVEL][$this->getCarId(self::BUSINESS_CLASS_LEVEL)]['price'] ?? 0;
    }
}