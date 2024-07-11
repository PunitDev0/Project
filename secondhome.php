<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/secondhome.css">
    <link rel="stylesheet" href="./navbar/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Document</title>
</head>
<body>
    <div class="mainBox">
    <?php include'./navbar/navbar.php'; ?>
    <div class="categorys">
        <div class="images">
         <div><img src="./Images/$5 off $50 Sale Special for New Users_Solid Color Ripped Decorated Denim Jacket.png" alt=""></div>
         <p>Shirts</p>
        </div>
        <div class="images">
         <div><img src="./Images/Men Dragon & Japanese Letter Graphic Drawstring Waist Joggers (1).png" alt=""></div>
         <p>Jeans</p>
        </div>
        <div class="images">
         <div><img src="./Images/Men Letter & Cartoon Graphic Kangaroo Pocket Drawstring Hoodie.png" alt=""></div>
         <p>Hoodie</p>
        </div>
        <div class="images">
         <div><img src="./Images/T- SHIRT.png" alt=""></div>
         <p>T-Shirts</p>
        </div>
        <div class="images">
         <div><img src="./Images/brown-leather-shoes.png" alt=""></div>
         <p>Shoes</p>
        </div>

    </div>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://rukminim2.flixcart.com/fk-p-flap/1600/270/image/d9dde41bdb228ea8.jpg?q=20" alt=""></div>
            <div class="swiper-slide"><img src="https://rukminim2.flixcart.com/fk-p-flap/1600/270/image/9e9aa250dfecdbc3.jpg?q=20" alt=""></div>
            <div class="swiper-slide"><img src="https://rukminim2.flixcart.com/fk-p-flap/1600/270/image/354cde8026deab5a.jpg?q=20" alt=""></div>
            <div class="swiper-slide"><img src="https://rukminim2.flixcart.com/fk-p-flap/1600/270/image/1e513363d2412d0a.jpg?q=20" alt=""></div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="products">
            <?php
                // session_start();
                $conn = mysqli_connect('localhost','root','','userinfo'); 

                $result = mysqli_query($conn,"SELECT * FROM productsdata ORDER BY RAND() LIMIT 10");
                
                while($row = mysqli_fetch_assoc($result)){          
            ?>
                <div class="data">
                    <div class="img"><img src="./upload/<?php echo $row['image']?>" alt=""></div>
                    <div class="name"><?php echo $row['item_name']?></div>
                    <div class="price">$<?php echo $row['price']?></div>

                </div>




                <?php
                }
                ?>
        </div>



    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            scrollbar: {
            el: ".swiper-scrollbar",
            hide: true,
        },
        loop: true,
        autoplay:{
        delay:1000,
        disableOnInteraction: false,
      },
        });
    </script>
    </html>