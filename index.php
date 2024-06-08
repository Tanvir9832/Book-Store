<?php
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
            if(strlen($password)<8){
                $errors['password'] = 'password length must be at least 8';
            }
        }

        if(!array_filter($errors)){
            header('Location: form.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
        .login-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #666;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .login-btn {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .login-btn:hover {
            background-color: #0056b3;
        }
        .extra-links {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }
        .extra-links a {
            color: #007bff;
            text-decoration: none;
        }
        .extra-links a:hover {
            text-decoration: underline;
        }
        .red{
            color : #FF5733;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="index.php">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value=<?= $email?>>
                <div class="red"><?= $errors['email'] ?></div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value=<?= $password?>>
                <div class="red" ><?= $errors['password'] ?></div>
            </div>
            <button type="submit" name="submit" class="login-btn">Login</button>
            <div class="extra-links">
                <a href="#">Forgot password?</a>
                <a href="#">Sign up</a>
            </div>
        </form>
    </div>
</body>
</html>
