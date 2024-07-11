<?php
  //  session_start();

   $conn = mysqli_connect('localhost','root','','userinfo');

  //  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  //      header('Location: login/login.php'); // Redirect to login page if not logged in
  //      exit();
  //  }
    $priceFilter = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filter'])) {
        $priceFilter = $_POST['range'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="card.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
    <?php 
             if ($priceFilter) {
              // Get products within the specified price range
              $item = mysqli_query($conn,
               "SELECT * FROM productsdata WHERE price >= $priceFilter  ORDER BY price ASC"
              );

          } else {
              // Get all products
              $item = mysqli_query($conn, "SELECT * FROM productsdata");
          }
            while($items = mysqli_fetch_array($item)){
        ?>
    <div class="container noselect">
        <div class="canvas">
          <div class="tracker tr-1"></div>
          <div class="tracker tr-2"></div>
          <div class="tracker tr-3"></div>
          <div class="tracker tr-4"></div>
          <div class="tracker tr-5"></div>
          <div class="tracker tr-6"></div>
          <div class="tracker tr-7"></div>
          <div class="tracker tr-8"></div>
          <div class="tracker tr-9"></div>
          <div class="tracker tr-10"></div>
          <div class="tracker tr-11"></div>
          <div class="tracker tr-12"></div>
          <div class="tracker tr-13"></div>
          <div class="tracker tr-14"></div>
          <div class="tracker tr-15"></div>
          <div class="tracker tr-16"></div>
          <div class="tracker tr-17"></div>
          <div class="tracker tr-18"></div>
          <div class="tracker tr-19"></div>
          <div class="tracker tr-20"></div>
          <div class="tracker tr-21"></div>
          <div class="tracker tr-22"></div>
          <div class="tracker tr-23"></div>
          <div class="tracker tr-24"></div>
          <div class="tracker tr-25"></div>
          <div id="card">
            <div class="img">
               <a href="details.php?id=<?php echo $items['id']; ?>">
                    <img src="upload/<?php echo $items['image']; ?>" alt="">
                </a></div>
          <!-- <p id="prompt">HOVER OVER :D</p> -->
            <div class="title">Price,<br>$<?php echo $items['price']?></div>
            <div class="buttons">
              <!-- <p><?php echo $items['item_name']?></p> -->
                <a href="details.php?id=<?php echo $items['id']; ?>">
                <button type="submit" class="add_cart subtitle" name="add_cart" id = 
                "" value="2">Add to Cart</button>
                </a>
                <button class="buy_now  subtitle" id = 
                "">Buy Now</button>

            </div>
          </div>
        </div>
      </div>
      <?php
   }
    ?>
    </div>
</body>
</html>