<?php
session_start();

// if (!isset($_SESSION['username'])) {
//     header("Location: ./login/login.php");
//     exit();
// }

    // $username = $_SESSION['username'];
    $conn = mysqli_connect('localhost','root','','userinfo');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./card/card.css " />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="index.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="maindiv">
      <div class="slidebar">
        <div class="slidemenu">
          <img src="./Style.png" alt="" />

          <div class="category">
            <h3>Category</h3>
            <div class="line"></div>
            <ul>
              <li><a href="">Home</a></li>
              <li><a href="">Shoes</a></li>
              <li><a href="">Jacket</a></li>
              <li><a href="">Slippers</a></li>
            </ul>
          </div>
          <div class="line"></div>

          <div class="range">
            <h4>Filter by Price</h4>
            <form action="" method="POST">
              <input
                type="range"
                min="100"
                max="1000"
                id="range"
                name="range"
                value="1"
              />
              <div class="price">
                <p class="startingrange">100</p>
                <p class="endingrange" id="endingrange">1000</p>
              </div>
              <input
                type="submit"
                name="filter"
                value="filter"
                class="filter"
              />
            </form>
          </div>
          <div class="line"></div>

          <div class="discount">
            <h4>Special Discounts</h4>
            <?php
            $item = mysqli_query($conn,"select * from productsdata LIMIT 10");
            while($items = mysqli_fetch_array($item)){
        ?>
            <div class="disflex">
              <div class="disimage">
                <img src="./upload/<?php echo $items['image']?>" alt="" />
              </div>
              <div class="disprice">
                <p><?php echo $items['item_name']?></p>
                <p><?php echo $items['price']?></p>
              </div>
            </div>
            <?php
            }
                ?>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="header">
          <img src="./Style.png" alt="" />
          <div class="navbar">
            <ul>
              <a href="./Home.php">Home</a>
              <a href="">Contact</a>
              <a href="">All Items</a>
            </ul>
          </div>
          <div class="cart">
            <a href="cart.php"> <i class="bx bxs-cart-alt"></i></a>
            <i class='bx bx-menu'></i>
          </div>
        </div>

        <div class="cardDiv">
          <?php include'./card/card.php'?>
        </div>
      </div>
    </div>
  </body>
  <script>
       Toggle sidebar function
       let menu = document.querySelector(".bx-menu");
        let sidebar = document.querySelector(".sidebar");

        menu.addEventListener("click", () => {
            sidebar.classList.toggle("toggle");
            console.log("hello");
        });

        // Update range value display
        let rangeInput = document.getElementById("range");
        let endingRangeDisplay = document.getElementById("endingrange");

        rangeInput.addEventListener("input", (e) => {
            endingRangeDisplay.innerHTML = e.target.value;
        });

        document.querySelector(".filter").addEventListener("click", (e) => {
            let rangeValue = rangeInput.value;
            console.log("Filter clicked. Current range value:", rangeValue);
        });

  </script>
</html>
