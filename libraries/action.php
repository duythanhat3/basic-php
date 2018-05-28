<?php

// get email of guest
$email = $_POST['email'];

$insertEmail = false;
if (!empty($email)) {
    $database->insert([
        'fields' => 'email',
        'values' => [
            [$email]
        ]
    ], 'emails')->execute();
    $insertEmail = true;
}
