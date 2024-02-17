<?php

namespace Classes\TaxiDelivery;

class ComfortCar extends CarsHelper implements TaxiCar
{

    public function getModel(): string
    {
        $this->updateRawData(CarLevels::COMFORT_CLASS_LEVEL);

        return static::$_rawData[self::COMFORT_CLASS_LEVEL][$this->getCarId(self::COMFORT_CLASS_LEVEL)]['model'] ?? 'Model';
    }

    public function getPrice(): float
    {
        $this->updateRawData(CarLevels::COMFORT_CLASS_LEVEL);

        return static::$_rawData[self::COMFORT_CLASS_LEVEL][$this->getCarId(self::COMFORT_CLASS_LEVEL)]['price'] ?? 0;
    }
}