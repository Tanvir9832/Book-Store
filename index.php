<?php 
    include './db/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Shop</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <?php include 'components/navbar.php' ?>
    <main>
        <section id="home">
            <div>
                <h1>Our Collection</h1>
                <p>Discover a wide range of books from various genres.</p>
            </div>
        </section>

        <section id="books">
            <h1>Books</h1>
            <div class="book-list">
                <?php 
                    $sql = "SELECT * from book";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)){ ?>
                        <div class="book">
                            <img src="images/<?=$row['Image']?>" alt="Book 1">
                            <h3><?=$row['BookName']?></h3>
                            <p><?=$row['Author']?></p>
                            <p class="price">$<?=$row['Price']?></p>
                            <a style="text-decoration : none; color : white;" href="http://localhost/practice/pages/singlebook.php?userid=<?=$row['BookID']?>">
                                <button style="border-radius: 25px; margin-top : 5px">
                                see more
                                </button>
                            </a>
                        </div>

                <?php }
                ?>
                <!-- Add more books as needed -->
            </div>
        </section>
    </main>
    <?php include 'components/footer.php' ?>
</body>
</html>
