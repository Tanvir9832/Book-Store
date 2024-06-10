<?php 
    include '../db/db.php';
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $sql = "SELECT UserID from user where email = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $userID = $row['UserID'];

    $sql = "SELECT Book.BookName, Book.Price , Book.Author, Book.Genre, Book.Description, 
    Book.Image
    FROM User
    LEFT JOIN Book ON $userID = Book.UserID";
    $resultForBooks = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Book Shop</title>
    <link rel="stylesheet" href="../styles/profile.css">
</head>
<body>
    <?php include '../components/navbar.php' ?>
    <main class="profile-main">
        <section class="user-profile">
            <div class="user-details">
                <h2>My Profile</h2>
                <p><strong>Name:</strong> <?=$name?></p>
                <p><strong>Email:</strong> <?=$email?></p>
            </div>
            <div class="user-books">
                <h2>Books Added by <?=$name?></h2>
                <div class="book-grid">
                    <?php 
                        while($rowOfBooks = mysqli_fetch_assoc($resultForBooks)){ ?>
                            <div class="book-card">
                                <img src="../images/<?=$rowOfBooks['Image']?>" alt="Book 1">
                                <h3><?=$rowOfBooks['BookName']?></h3>
                                <p><strong>Author:</strong> <?=$rowOfBooks['Author']?></p>
                                <p><strong>Genre:</strong> <?=$rowOfBooks['Genre']?></p>
                                <p><strong>Price:</strong> <?=$rowOfBooks['Price']?></p>
                                <div>
                                    <button>update</button>
                                    <button>delete</button>
                                </div>
                            </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php include '../components/footer.php' ?>
</body>
</html>
