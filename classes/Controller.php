<?php

namespace Classes;

class Controller
{
    protected Db $adapter;

    public function __construct(Db $db)
    {
        $this->adapter = $db;
    }

    function getData(): void
    {
        $this->adapter->getData();
    }
}