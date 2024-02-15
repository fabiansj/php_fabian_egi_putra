<?php 
$DB_HOST = 'localhost';
$DB_DATABASE = "testdb";
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$con = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);

if(!$con) {
    die("koneksi gagal" . mysqli_connect_error());
}

?>