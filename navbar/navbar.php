<?php
    // session_start();
    // echo $_SESSION['username']


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./navbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>
<body>
<div class="header ">
        <img src="./Style.png" alt="">
        <nav class="">
            <a href="Home.php">Home</a>
            <a href="">Contact</a>
            <a href="index.php">All Products</a>
        </nav>
        <div class="user">
            <?php echo $_SESSION['username']?>
        </div>
        <div class="cart">
           <a href="cart.php"> <i class='bx bxs-cart-alt'></i></a>
        </div>
    </div>
</body>
</html>