<?php

namespace Classes\TaxiDelivery;

class EconomDelivery extends TaxiDelivery
{

    public function getCar(): TaxiCar
    {
        return new EconomCar();
    }
}