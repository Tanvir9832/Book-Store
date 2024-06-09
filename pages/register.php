<?php
    include '../db/db.php';
    $errors = array('email'=>'', 'password'=>'', 'name' => '');
    $email="";
    $password="";
    $name="";
    if(isset($_POST['submit'])){

        //!Name validation
        if(empty($_POST['name'])){
            $errors['name'] = "name is required";
        }else{
            $name = $_POST['name'];
        }

        //!Email validation
        if(empty($_POST['email'])){
            $errors['email'] = "email is required";
        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "must be a valid email";
            }
        }

        //!Password validation
        if(empty($_POST['password'])){
            $errors['password'] = "password is required";
        }else{
            $password = $_POST['password'];
            if(strlen($password)<8){
                $errors['password'] = 'password length must be at least 8';
            }
        }

        if(!array_filter($errors)){
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO	User (name, email, password) VALUES ('$name','$email','$hashed_password')";
            $result = mysqli_query($conn,$sql);
            header("location: http://localhost/practice/pages/login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Book Shop</title>
    <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
    <?php include '../components/navbar.php' ?>
    <main class="register-main">
        <section id="register">
            <div class="register-container">
                <h2>Register</h2>
                <form method="POST" action="register.php">
                    <div>
                        <label for="register-name">Name:</label>
                        <input type="text" placeholder="Enter your name" id="register-name" name="name" vlaue="<?=$name?>">
                        <div style="color: red;"><?= $errors['name'] ?></div>
                    </div>
                    <div>
                        <label for="register-email">Email:</label>
                        <input type="text" placeholder="Enter your email" id="register-email" vlaue="<?=$email?>" name="email">
                        <div style="color: red;"><?= $errors['email'] ?></div>
                    </div>
                    <div>
                        <label for="register-password">Password:</label>
                        <input type="password" placeholder="Enter your password" id="register-password" vlaue="<?=$password?>" name="password">
                        <div style="color: red; margin-bottom : 5px;"><?= $errors['password'] ?></div>
                    </div>
                    <button type="submit" name="submit">Register</button>
                </form>
            </div>
        </section>
    </main>
    <?php include '../components/footer.php' ?>
</body>
</html>
