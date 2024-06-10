<?php 
    include '../db/db.php';
    $userID;
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        $sql = "SELECT * from user where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $userID = $row['UserID'];
    }else{
        header("Location: http://localhost/practice/");
    }
    $errors = array('name'=>'','author'=>'','genre'=>'','price'=>'','description'=>'');
    $name='';
    $author='';
    $genre='';
    $price='';
    $description='';

    if(isset($_POST['submit'])){

        //!Book Name validation
        if(empty($_POST['bookName'])){
            $error['name']='book name is required';
        }else{
            $name = $_POST['bookName'];
        }

        //!Author validation
        if(empty($_POST['author'])){
            $error['author'] = 'author name is required';
        }else{
            $author = $_POST['author'];
        }

        //!Genre validation
        if(empty($_POST['genre'])){
            $error['genre'] = 'genre is required';
        }else{
            $genre = $_POST['genre'];
        }

        //!Price validation
        if(empty($_POST['price'])){
            $error['price'] = 'price is required';
        }else{
            $price = $_POST['price'];
        }

        //!Description validation
        if(empty($_POST['description'])){
            $error['description'] = 'description is required';
        }else{
            $description = $_POST['description'];
        }

        $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
        $tname = $_FILES["file"]["tmp_name"];
        $upload_dir = '../images';
        move_uploaded_file($tname, $upload_dir.'/'.$pname);
        $name = mysqli_real_escape_string($conn, $name);
        $description = mysqli_real_escape_string($conn, $description);
        
        $sql = "INSERT INTO book(BookName, Price, Image, UserID, Author, Genre, Description) 
        values ('$name','$price','$pname', '$userID' , '$author', '$genre', '$description')";
        $result = mysqli_query($conn,$sql);
        if($result){
            header("Location: http://localhost/practice/");
        }else{
            echo "error found";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - Book Shop</title>
    <link rel="stylesheet" href="../styles/addBook.css">
</head>
<body>
    <?php include '../components/navbar.php' ?>
    <main class="add-book-main">
        <section id="addBook">
            <div class="add-book-container">
                <h2>Add a New Book</h2>
                <form method="POST" action="addBook.php" enctype="multipart/form-data">
                    <label for="bookName">Name:</label>
                    <input type="text" id="bookName" name="bookName" required>
                    
                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" required>
                    
                    <label for="genre">Genre:</label>
                    <input type="text" id="genre" name="genre" required>
                    
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" required>
                    
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="5" required></textarea>
                    
                    <label for="cover">Cover Image :</label>
                    <input type="file" id="cover" name="file" required>
                    
                    <button type="submit" name="submit" >Add Book</button>
                </form>
            </div>
        </section>
    </main>
    <?php include '../components/footer.php' ?>
</body>
</html>
