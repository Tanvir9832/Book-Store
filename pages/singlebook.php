<?php 
    include '../db/db.php';
    $bookID = $_GET['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details - Book Shop</title>
    <link rel="stylesheet" href="../styles/single.css">
</head>
<body>

    <?php include '../components/navbar.php' ?>
    <main class="book-main">
        <section class="book-details">
            <?php 
                $sql = "SELECT * from book where BookID = '$bookID'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
            ?>

            <div class="book-image">
                <img src="../images/<?=$row['Image']?>" alt="Book Image">
            </div>

            <div class="book-info">
                <h2><?=$row['BookName']?></h2>
                <p><strong>Author:</strong> <?=$row['Author']?></p>
                <p><strong>Genre:</strong> <?=$row['Genre']?></p>
                <p><strong>Price:</strong> $<?=$row['Price']?></p>
                <p><strong>Description:</strong></p>
                <p><?=$row['Description']?></p>
                <button>Buy now</button>
            </div>
        </section>
    </main>
    <?php include '../components/footer.php' ?>
</body>
</html>


