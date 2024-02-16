<?php

namespace Classes;

class Mysql implements Db
{
    public function getData(): string
    {
        return 'some data from database';
    }
}