<?php
session_start();

$hostname = 'localhost';
$username = 'root';
$password = '191491TTss@';
$database = 'bookShop';

$conn = mysqli_connect($hostname,$username,$password,$database);
if(!$conn){
    echo "Database connection failed";
}

?>