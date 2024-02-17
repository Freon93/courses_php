<?php

namespace Classes\TaxiDelivery;

class EconomCar extends CarsHelper implements TaxiCar
{

    public function getModel(): string
    {
        $this->updateRawData(CarLevels::ECONOM_CLASS_LEVEL);

        return static::$_rawData[self::ECONOM_CLASS_LEVEL][$this->getCarId(self::ECONOM_CLASS_LEVEL)]['model'] ?? 'Model';
    }

    public function getPrice(): float
    {
        $this->updateRawData(CarLevels::ECONOM_CLASS_LEVEL);

        return static::$_rawData[self::ECONOM_CLASS_LEVEL][$this->getCarId(self::ECONOM_CLASS_LEVEL)]['price'] ?? 0;
    }
}