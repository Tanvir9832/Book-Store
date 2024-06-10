<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<header>
        <h1>Welcome to the Book Shop</h1>
        <nav>
            <ul>
                <li style="cursor: pointer;" id="home">Home</li>
                <li style="cursor: pointer;" id="books">Books</li>
                <li style="cursor: pointer;" id="contact">Contact</li>
                <?php 
                if(!isset($_SESSION['name'])){ ?>
                   <li style="cursor: pointer;" id="login">Login</li>
                   <li style="cursor: pointer;" id="register">Register</li>
                <?php }else{ ?>
                    <li style="cursor: pointer;" id="profile"><?=$_SESSION['name']?></li>
                    <li><a href="http://localhost/practice/pages/logout.php">Logout </a></li>
                <?php }  ?> 
            </ul>
        </nav>
    </header>
    <script>
        function selectById(id){
            return document.getElementById(id);
        }
        const login = selectById("login");
        const register = selectById("register");
        const home = selectById("home");
        const contact = selectById("contact");
        const books = selectById("books");
        const addBook = selectById("add-book");
        const profile = selectById("profile");

        login?.addEventListener("click",function(){
            window.location = `/practice/pages/login.php`;
        })

        register?.addEventListener("click",function(){
            window.location = `/practice/pages/register.php`;
        })
        home.addEventListener("click",function(){
            window.location = `/practice`;
        })
        books.addEventListener("click",function(){
            window.location = `/practice/pages/book.php`;
        })
        contact.addEventListener("click",function(){
            window.location = `/practice/pages/contact.php`;
        })
        addBook?.addEventListener("click",function(){
            window.location = `/practice/pages/addBook.php`;
        })
        profile?.addEventListener("click",function(){
            window.location = `/practice/pages/profile.php`;
        })
    </script>
</body>
</html>