<?php

use Classes\Contacts\Contact;

require_once '../vendor/autoload.php';

echo '<pre>';

$contact = new Contact();

try {
    $newContact = $contact->phone('000-555-000')
        ->name("John")
        ->surname("Surname")
        ->email("john@email.com")
        ->address("Some address")
        ->build();

    var_dump($newContact);
} catch (Exception $e) {
    echo $e->getMessage();
}


try {
    $newContact = $contact->name("John")
        ->email("john@email.com")
        ->build();

    var_dump($newContact);
} catch (Exception $e) {
    echo $e->getMessage();
}


try {
    $newContact = $contact->build();

    var_dump($newContact);
} catch (Exception $e) {
    echo $e->getMessage();
}