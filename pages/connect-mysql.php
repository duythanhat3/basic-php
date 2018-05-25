<?php

include_once ('../libraries/Database.php');

$host = 'basicphp_mysql_1:3306';
$db   = 'courses';
$user = 'root';
$pass = 'admin';
$charset = 'utf8';

$database = new Database($host, $db, $user, $pass);

$database->select(['name', 'age'], 'students');
$database->where("`age` = 10");
$result = $database->fetchAll();


foreach($result as $item) {
    echo 'Hoc vien ' . $item['name'] . ' ' . $item['age'] . ' tuoi <br />';
}

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

//$database->insert($dataInsert, 'students');
//$database->execute();

// delete table
//$database->delete('students');
//$database->execute();