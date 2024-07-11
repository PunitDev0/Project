<?php
    session_start();

    $conn = mysqli_connect('localhost','root','','userinfo');

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login/login.php'); // Redirect to login page if not logged in
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiper Slider</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/Home.css">
    <link rel="stylesheet" href="./navbar/navbar.css">
</head>
<style>
    #img{

    }
</style>
<body>
    <?php include './navbar/navbar.php';  ?>
<div class="swiper-container my-36">
    <div class="swiper-wrapper">
        <?php
            $item = mysqli_query($conn,"select * from productsdata");
            while($items = mysqli_fetch_array($item)){
        ?>
        <div class="swiper-slide imgdiv flex flex-col">
                <a href="details.php?id=<?php echo $items['id']; ?>">
                    <img src="upload/<?php echo $items['image']; ?>" alt="" id="img">
                </a>
               <div class="iteminfo" style="display:none;">
                      <h1 class="price"><?php echo $items['item_name']; ?></h1>
                       <h1 class="name">$<?php echo $items['price']; ?></h1>
               </div>

        </div>
    <?php
   }
    ?>
    </div>
</div>

<div class="buttons">
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> 
</div>
<div id="active-item-info" style="display:none;">
        <h2 id="active-item-name"></h2>
        <h3 id="active-item-price"></h3>
    </div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="Swiper.js"></script>
</body>
</html>
