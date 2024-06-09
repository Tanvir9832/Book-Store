<?php
    include '../db/db.php';
    $errors = array('email'=>'', 'password'=>'');
    $email="";
    $password="";
    if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
            $errors['email'] = "email is required";
        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "must be a valid email";
            }
        }


        if(empty($_POST['password'])){
            $errors['password'] = "password is required";
        }else{
            $password = $_POST['password'];
        }

        if(!array_filter($errors)){
            $sql = "SELECT * from user where email = '$email'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];
            if ($hashed_password && password_verify($password, $hashed_password)){
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header("Location: http://localhost/practice/");
            }else{
                $errors['password'] = 'wrong credentials';
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Shop</title>
    <link rel="stylesheet" href="../styles/auth.css">
</head>
<body>
    <?php include '../components/navbar.php' ?>
    <main class="login-main">
        <section id="login">
            <div class="login-container">
                <h2>Login</h2>
                <form method="POST" action="login.php">
                    <div>
                        <label for="login-email">Email:</label>
                        <input placeholder="Enter your email" id="login-email" name="email" required>
                        <div style="color: red;"><?= $errors['email'] ?></div>
                    </div>

                    <div>
                        <label for="login-password">Password:</label>
                        <input placeholder="Enter your password" type="password" id="login-password" name="password" required>
                        <div style="color: red; margin-bottom : 5px;" ><?= $errors['password'] ?></div>
                    </div>
                    <button type="submit" name="submit">Login</button>
                </form>
            </div>
        </section>
    </main>
    <?php include '../components/footer.php' ?>
</body>
</html>


