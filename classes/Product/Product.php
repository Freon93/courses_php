<?php

namespace Classes\Product;

use Exception;

class Product
{
    protected array $values = [];

    public function set($name, $value): void
    {
        $this->values[$name] = $value;
    }

    /**
     * @throws Exception
     */
    public function get($name)
    {
        if (!isset($this->values[$name])) {
            throw new Exception('No such product');
        }

        return $this->values[$name];
    }

    public function getValues(): array
    {
        return $this->values;
    }
}