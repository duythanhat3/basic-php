<?php

include_once ('../libraries/Database.php');

$host = 'basicphp_mysql_1:3306';
$db   = 'courses';
$user = 'root';
$pass = 'admin';
$charset = 'utf8';

$database = new Database($host, $db, $user, $pass);
$result = $database->select(['name', 'time'], 'subjects');

foreach($result as $item){
    echo 'Mon ' . $item['name'] . ' hoc trong ' . $item['time'] . ' ngay <br />';
}

// update
//$database->update('time', '10', 'subjects');

// insert
$dataInsert = [
    'fields' => 'name,age,phone',
    'values' => [
        ['Diep An', 10, '0843757843545'],
        ['Hanh', 11, '048357435'],
        ['Dat', 12, '095374853']
    ]
];
//$database->insert($dataInsert, 'students');

// delete table
$database->delete('trainers');