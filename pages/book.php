<?php 
    include '../db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Book Shop</title>
    <link rel="stylesheet" href="../styles/book.css">
</head>
<body>
    <?php include '../components/navbar.php' ?>
    <main class="books-main">
        <section id="books">
            <div class="books-container">
                <h2>Our Books Collection</h2>
                <div class="book-grid">
                <?php 
                    $sql = "SELECT * from book";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){ ?>
                        <div class="book-card">
                            <img src="../images/<?=$row['Image']?>" alt="Book 1">
                            <h3><?=$row['BookName']?></h3>
                            <p><strong>Author: <?=$row['Author']?></p>
                            <p><strong>Genre:</strong> <?=$row['Genre']?></p>
                            <p><strong>Price:</strong> $<?=$row['Price']?></p>
                            <a style="text-decoration : none; color : white;" href="http://localhost/practice/pages/singlebook.php?userid=<?=$row['BookID']?>">
                                <button style="border-radius: 25px; margin-top : 5px">
                                see more
                                </button>
                            </a>
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
