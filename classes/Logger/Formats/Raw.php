<?php

namespace Classes\Logger\Formats;

use Classes\Singleton;

class Raw extends Singleton implements MessageFormat
{

    public function format(string $string): string
    {
        return $string;
    }
}