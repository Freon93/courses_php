<?php

namespace Classes;

use Exception;

class Contact {
    protected string $name;
    protected string $surname;
    protected string $email;
    protected string $phone;
    protected string $address;


    /**
     * @throws Exception
     */
    public function __call(string $name, array $arguments)
    {
        if (!property_exists($this, $name)) {
            throw new Exception("No method $name in " . $this::class);
        }

        $this->$name = $arguments[0];
        return $this;
    }

    public function build(): self
    {
        return $this;
    }
}