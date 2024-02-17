<?php

namespace Classes;

use PDO;
use PDOException;

class PdoConnector extends Singleton
{

    const USER_NAME = 'bohdan';
    const PASSWORD = '12345';

    static protected array $_pdoConnections;

    /**
     * @param string $dbName
     * @return PDO
     * @throws PDOException
     */
    public function connect(string $dbName): PDO
    {
        if (!isset(static::$_pdoConnections[$dbName])) {
            static::$_pdoConnections[$dbName] = new PDO('mysql:host=mysql_container;dbname=' . $dbName, static::USER_NAME, static::PASSWORD);
        }

        return static::$_pdoConnections[$dbName];
    }
}