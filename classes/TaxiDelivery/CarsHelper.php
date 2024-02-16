<?php

namespace Classes\TaxiDelivery;

use Classes\PdoConnector;
use PDO;

abstract class CarsHelper
{
    const string ECONOM_CLASS_LEVEL = 'Econom';
    const string COMFORT_CLASS_LEVEL = 'Comfort';
    const string BUSINESS_CLASS_LEVEL = 'Business';

    protected PDO $_db;
    protected static array $_rawData;
    protected array $carIds;

    public function __construct()
    {
        $this->_db = PdoConnector::getInstance()->connect('taxi_park');
    }

    protected function updateRawData(CarLevels $carLevel): void
    {
        if (!isset(static::$_rawData[$carLevel->value])) {
            $sql = <<<SQL
SELECT c.price, c.model 
FROM cars c 
    JOIN car_level cl on c.car_level_id = cl.id 
WHERE cl.name = :carLevel 
SQL;
            $query = $this->_db->prepare($sql);
            $query->execute(['carLevel' => $carLevel->value]);
            static::$_rawData[$carLevel->value] = $query->fetchAll();
        }
    }

    protected function getCarId(string $carLevel): int
    {
        if (!isset($this->carIds)) {
            $this->carIds[$carLevel] = rand(0, count(static::$_rawData[$carLevel]) - 1);
        }
        return $this->carIds[$carLevel];
    }
}