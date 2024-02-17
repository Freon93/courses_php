<?php

namespace Classes\Contacts;

class Contact implements ContactInterface
{
    protected User $user;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->user = new User();
    }

    public function name(string $name): ContactInterface
    {
        $this->user->setName($name);

        return $this;
    }

    public function surname(string $surname): ContactInterface
    {
        $this->user->setSurname($surname);

        return $this;
    }

    public function email(string $email): ContactInterface
    {
        $this->user->setEmail($email);

        return $this;
    }

    public function phone(string $phone): ContactInterface
    {
        $this->user->setPhone($phone);

        return $this;
    }

    public function address(string $address): ContactInterface
    {
        $this->user->setAddress($address);

        return $this;
    }

    public function build(): User
    {
        $result = $this->user;
        $this->reset();

        return $result;
    }
}
