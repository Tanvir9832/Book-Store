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
            <h2>Our Collection</h2>
            <p>Discover a wide range of books from various genres.</p>
        </section>

        <section id="books">
            <h2>Books</h2>
            <div class="book-list">
                <div class="book">
                    <img src="book1.jpg" alt="Book 1">
                    <h3>Book Title 1</h3>
                    <p>Author 1</p>
                    <p class="price">$10.99</p>
                </div>
                <div class="book">
                    <img src="book2.jpg" alt="Book 2">
                    <h3>Book Title 2</h3>
                    <p>Author 2</p>
                    <p class="price">$12.99</p>
                </div>
                <!-- Add more books as needed -->
            </div>
        </section>
    </main>
    <?php include 'components/footer.php' ?>
</body>
</html>
