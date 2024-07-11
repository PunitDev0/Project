<?php
    session_start();
  $conn = new mysqli("localhost","root","","userinfo");

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login/login.php'); // Redirect to login page if not logged in
        exit();
    }

    if (isset($_POST['add_cart'])) {
        $id = $_POST['id'];
        $item_name = $_POST['item_name'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        

 
        // Add item to cart session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Check if item is already in cart
        $found = false;
        foreach ($_SESSION['cart'] as &$cartItem) {
            if ($cartItem['id'] == $id) {
                $cartItem['quantity']++;
                $found = true;
                break;
            }
        }

        if (!$found) {
            // Add new item to cart
            $newItem = [
                'id' => $id,
                'item_name' => $item_name,
                'price' => $price,
                'img' => $img,
                'quantity' => 1
            ];
            $_SESSION['cart'][] = $newItem;
        }
    }

    header('Location: cart.php'); // Redirect to cart page
    // echo $id;
    // echo $item_name;
    // echo $price;
    exit();
?>
