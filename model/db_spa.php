<?php

//connection to guitar1 database

$server = 'localhost';
$username = 'anielgr2_iClient';
$password = '30n%Eq%{4%.D';
$database = 'anielgr2_spanish';
//if we were using an oracle database, replace mysql in the line below with oracle.
$dsn = "mysql:host=$server;dbname=$database";
try {
    //php data object
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $exc) {
    //echo $exc->getTraceAsString();
    //echo 'There was an error';
    $message = 'Sorry, the database server encountered an error';
    include '../errordocs/500.php';
    exit;
}
