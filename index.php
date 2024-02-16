<?php

use Classes\Contact;

require_once './vendor/autoload.php';

echo '<pre>';

$contact = new Contact();

try {
    $newContact = $contact->phone('000-555-000')
        ->name("John")
        ->surname("Surname")
        ->email("john@email.com")
        ->address("Some address")
        ->build();
} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($contact);

$contact2 = new Contact();

try {
    $newContact = $contact2->name("John")
        ->email("john@email.com")
        ->build();
} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($contact2);

$contact2 = new Contact();

try {
    $newContact = $contact2->build();
} catch (Exception $e) {
    echo $e->getMessage();
}

var_dump($contact2);