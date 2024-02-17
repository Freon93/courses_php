<?php

namespace Classes\TaxiDelivery;

class ComfortDelivery extends TaxiDelivery
{

    public function getCar(): TaxiCar
    {
        return new ComfortCar();
    }
}