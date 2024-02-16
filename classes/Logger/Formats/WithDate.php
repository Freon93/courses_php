<?php

namespace Classes\Logger\Formats;

use Classes\Singleton;

class WithDate extends Singleton implements MessageFormat
{

    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string;
    }
}