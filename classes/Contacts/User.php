<?php

namespace Classes\Contacts;

class User
{
    protected string $name;
    protected string $surname;
    protected string $email;
    protected string $phone;
    protected string $address;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}