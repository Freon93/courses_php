<?php
require_once './vendor/autoload.php';

use Classes\User;

echo '<pre>';

$user1 = new User();

try {
    echo 'User1: ';

    $user1->setLastName('Petrenko');

    echo User::formatInformation($user1->getAll());
} catch (Exception $e) {
    echo $e->getMessage() . '</br>';
}

$user2 = new User();

try {
    echo 'User2: ';

    $user2->setName('Vasyl');
    $user2->setAge(28);

    echo User::formatInformation($user2->getAll());
} catch (Exception $e) {
    echo $e->getMessage() . '</br>';
}

$user3 = new User();

try {
    echo 'User3: ';

    $user3->setName('Ivan');
    $user3->setAge(25);
    $user3->setEmail('example@dot.com');

    echo User::formatInformation($user3->getAll());
} catch (Exception $e) {
    echo $e->getMessage() . '</br>';
}
