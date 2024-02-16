<?php

namespace Classes\Logger\Formats;

use Classes\Singleton;

class WithDateAndDetails extends Singleton implements MessageFormat
{

    public function format(string $string): string
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}