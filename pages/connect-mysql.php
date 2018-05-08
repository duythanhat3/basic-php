<?php

$dbhost = 'localhost:8183';
$dbuser = 'root';
$dbpass = 'admin';
$con = @mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}
echo 'Connected to MySQL';
