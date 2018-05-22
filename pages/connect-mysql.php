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

