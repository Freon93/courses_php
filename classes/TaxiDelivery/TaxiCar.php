<?php

namespace Classes\TaxiDelivery;

interface TaxiCar
{

    public function getModel(): string;

    public function getPrice(): float;
}