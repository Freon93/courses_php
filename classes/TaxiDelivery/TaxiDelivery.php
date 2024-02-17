<?php

namespace Classes\TaxiDelivery;

abstract class TaxiDelivery
{
    abstract public function getCar(): TaxiCar;

    public function getData(): string
    {
        $car = $this->getCar();

        return 'Car model - ' . $car->getModel() . ', price - ' . $car->getPrice();
    }
}