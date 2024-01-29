<?php

namespace Classes;

use Exception;

class CustomException extends Exception
{

    public function __construct(protected string $methodName)
    {
        parent::__construct();

        $this->message = 'There is no such method "' . $methodName . '"';
    }
}