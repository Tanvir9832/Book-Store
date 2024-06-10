<?php 
    include '../db/db.php';
    $userid = $_GET['userid'];
    $bookid = $_GET['bookid'];
    $sql = "SELECT email FROM user WHERE UserID = '$userid'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $email = $row['email'];
    $sessionEmail = $_SESSION['email'];
    if($email == $sessionEmail){
        $sql = "DELETE from book WHERE BookID = '$bookid'";
        $result=mysqli_query($conn,$sql);
        if($result){
            header("Location : http://localhost/practice/pages/profile.php");
        }
    }else{
        header("Location : http://localhost/practice/");
    }
?>