<?php

$config = [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => ''
];

$mysqli = new mysqli(
    $config['mysql_host'],
    $config['mysql_user'],
    $config['mysql_password']
);
if ($mysqli->connect_error) {
    die($mysqli->connect_error);
}

// Creo il mio DB
$sql = 'CREATE DATABASE IF NOT EXISTS mylibrary;';
if (!$mysqli->query($sql)) {
    die($mysqli->connect_error);
}

// Seleziono il DB
$mysqli->query('USE mylibrary;');

// Creo la tabella
$sql = 'CREATE TABLE IF NOT EXISTS `mylibrary`.`books` (`id` INT NOT NULL AUTO_INCREMENT , `titolo` VARCHAR(50) NOT NULL , `autore` VARCHAR(50) NOT NULL , `anno` INT NOT NULL , `genere` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`));';
if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

?>