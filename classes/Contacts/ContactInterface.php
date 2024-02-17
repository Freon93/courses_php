<?php

namespace Classes\Contacts;

interface ContactInterface
{
    public function name(string $name): ContactInterface;

    public function surname(string $surname): ContactInterface;

    public function email(string $email): ContactInterface;

    public function phone(string $phone): ContactInterface;

    public function address(string $address): ContactInterface;
}
