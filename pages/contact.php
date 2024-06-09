<?php 
    include '../db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Book Shop</title>
    <link rel="stylesheet" href="../styles/contact.css">
</head>
<body>
    <?php include '../components/navbar.php' ?>
    <main class="contact-main">
        <section id="contact">
            <div class="contact-container">
                <h2>Contact Us</h2>
                <form>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                    
                    <button type="submit">Send</button>
                </form>
            </div>
        </section>
    </main>
    <?php include '../components/footer.php' ?>
</body>
</html>
