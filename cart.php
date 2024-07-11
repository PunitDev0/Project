<?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login/login.php'); // Redirect to login page if not logged in
        exit();
    }

    // Handle removing items from cart
    if (isset($_POST['remove_from_cart'])) {
        $id = $_POST['id'];

        foreach ($_SESSION['cart'] as $key => $cartItem) {
            if ($cartItem['id'] == $id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }

        header('Location: cart.php'); // Redirect to refresh the cart page
        exit();
    }

    // Function to calculate total cart amount
    function calculateTotal() {
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cartItem) {
                $total += $cartItem['price'] * $cartItem['quantity'];
            }
        }
        return $total;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Shopping Cart</h2>
            <?php if (!empty($_SESSION['cart'])): ?>
                <?php foreach ($_SESSION['cart'] as $cartItem): ?>
                    <div class="flex justify-between items-center border-b py-2">
                        <div>
                        <img src="upload/<?php echo $cartItem['img']; ?>" alt="Product Image" class="w-full h-64 object-cover mb-4 rounded-lg">
                            <h3 class="text-xl font-semibold"><?php echo $cartItem['item_name']; ?></h3>
                            <p class="text-gray-600">Price: $<?php echo $cartItem['price']; ?></p>
                        </div>
                        <div>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $cartItem['id']; ?>">
                                <button type="submit" name="remove_from_cart" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Remove All</button>
                            </form>
                            <p class="text-gray-600">Quantity: <?php echo $cartItem['quantity']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="mt-4">
                    <h3 class="text-xl font-semibold">Total: $<?php echo calculateTotal(); ?></h3>
                    <a href="#" class="block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mt-4">Checkout</a>
                </div>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
