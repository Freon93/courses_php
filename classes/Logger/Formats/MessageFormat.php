<?php

namespace Classes\Logger\Formats;

interface MessageFormat
{
    public function format(string $string): string;
}