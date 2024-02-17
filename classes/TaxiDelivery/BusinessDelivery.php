<?php

namespace Classes\TaxiDelivery;

class BusinessDelivery extends TaxiDelivery
{

    public function getCar(): TaxiCar
    {
        return new BusinessCar();
    }
}