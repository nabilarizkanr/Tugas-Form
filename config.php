<?php
/** Using mysqli_connect for database connection **/

$databaseHost = 'localhost';
$databaseName = 'tugas_mini';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
?>