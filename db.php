<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "";

$conn = new mysqli_connect($localhost,$username,$password);
if(!$conn){
    echo "Database connection failed";
}
?>