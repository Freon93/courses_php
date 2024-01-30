<?php

namespace Classes;

use Exception;

class User
{
    private string  $name;
    private int $age;
    private string $email;

    /**
     * @throws CustomException
     */
    public function __call(string $name, array $arguments)
    {
        if(!method_exists($this, $name)) {
            throw new CustomException($name);
        }

        call_user_func_array([$this, $name] , $arguments);
    }

    /**
     * @throws Exception
     */
    public function getAll(): array
    {
        if (!isset($this->name) || !isset($this->age) || !isset($this->email)) {
            throw new Exception('No full information about this user');
        }

        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email,
        ];
    }

    public static function formatInformation(array $info): string
    {
        return implode(', ', array_map(
            function ($k, $v) { return sprintf("%s - %s", $k, $v); },
            array_keys($info),
            $info
        ));
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
