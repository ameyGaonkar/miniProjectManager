<?php
$host = 'sql201.infinityfree.com';
$db = 'if0_36994628_mpm';
$user = 'if0_36994628';
$pass = 'J2LxjQioVC2pThP';

// $host = 'localhost';
// $db = 'mpm';
// $user = 'root';
// $pass = '';

try {
    $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
