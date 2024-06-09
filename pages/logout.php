<?php
include '../db/db.php';
session_unset();
session_destroy();
header('Location: http://localhost/practice/');
exit();
?>