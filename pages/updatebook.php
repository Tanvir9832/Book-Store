<?php
include '../db/db.php';
$userid = $_GET['userid'];
$bookid = $_GET['bookid'];
$sql = "SELECT email FROM user WHERE UserID = '$userid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$email = $row['email'];
$sessionEmail = $_SESSION['email'];
$bookName;
$author;
$genre;
$price;
$description;
$pname;

$bookSql= "SELECT * FROM book where BookID = '$bookid'";
$resultBook = mysqli_query($conn,$bookSql);
$rowBook = mysqli_fetch_assoc($resultBook);

if($email == $sessionEmail){
    if(isset($_POST['submit'])){
        $bookName = isset($_POST['bookName']) ? $_POST['bookName'] : $rowBook['BookName'];
        $author = isset($_POST['author'])? $_POST['author'] : $rowBook['Author']; 
        $genre = isset($_POST['genre']) ? $_POST['genre'] : $rowBook['Genre'];
        $price = isset($_POST['price']) ? $_POST['price'] : $rowBook['Price'];
        $description = isset($_POST['description']) ? $_POST['description'] : $rowBook['Description'];
        $pname;
        if(isset($_FILES["file"]["name"])){
            $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
            $tname = $_FILES["file"]["tmp_name"];
            $upload_dir = '../images';
            move_uploaded_file($tname, $upload_dir.'/'.$pname);
        }else{
            $pname = $rowBook['Image'];
        }
        $sql = " UPDATE book SET BookName='$bookName', Description='$description', Author='$author',
         Genre='$genre', Price='$price', Image = '$pname'  WHERE BookID='$bookid'";

        $result= mysqli_query($conn,$sql);
        if($result){
            header("Location : http://localhost/practice/pages/profile.php");
        }
    }
     
}else{
    header("Location : http://localhost/practice/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book - Book Shop</title>
    <link rel="stylesheet" href="../styles/updatebook.css">
</head>
<body>
    <?php 
        include '../components/navbar.php';
    ?>
    <main class="update-book-main">
        <section class="update-book-section">
            <h2>Update Book Details</h2>
            <form action="updatebook.php?userid=<?=$userid?>&bookid=<?=$bookid?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="bookTitle">Book Title:</label>
                    <input type="text" id="bookTitle" value=<?=$rowBook['BookName']?> name="bookName">
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" id="author" value=<?=$rowBook['Author']?> name="author">
                </div>
                <div class="form-group">
                    <label for="genre">Genre:</label>
                    <input type="text" id="genre" value=<?=$rowBook['Genre']?> name="genre">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" id="price" value=<?=$rowBook['Price']?> name="price">
                </div>
                <div class="form-group">
                    <label for="imageUrl">Image:</label>
                    <input type="file" id="image" name="file">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" value=<?=$rowBook['Description']?> rows="5"></textarea>
                </div>
                <button type="submit" name="submit">Update Book</button>
            </form>
        </section>
    </main>
    <?php 
        include '../components/footer.php';
    ?>
</body>
</html>
