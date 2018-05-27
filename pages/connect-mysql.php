<?php

include_once ('../libraries/Database.php');

$host = 'basicphp_mysql_1:3306';
$db   = 'courses';
$user = 'root';
$pass = 'admin';
$charset = 'utf8';

$database = new Database($host, $db, $user, $pass);

// $result = $database->select(['name', 'age'], 'students')->where("`age` = 10")->fetchAll();

// foreach($result as $item) {
//     echo 'Hoc vien ' . $item['name'] . ' ' . $item['age'] . ' tuoi <br />';
// }

// update
//$database->update('time', '10', 'subjects');

// insert
$dataInsert = [
    'fields' => 'name,age,phone',
    'values' => [
        ['Diep An', 10, '094343977'],
        ['Hanh', 11, '048357435'],
        ['Dat', 12, '095374853']
    ]
];

//$database->insert($dataInsert, 'students')->execute();

$database->delete('students')->where('age = 10')->execute();