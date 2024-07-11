<?php
    session_start();

    $conn = mysqli_connect('localhost', 'root', '', 'userinfo');

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('Location: login/login.php'); // Redirect to login page if not logged in
        exit();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productsdata WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $item = mysqli_fetch_assoc($result);
    } else {
        header('Location: index.php'); // Redirect to home page if no ID is provided
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <form action="manage_cart.php" method = "POST">
        <div class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="upload/<?php echo $item['image']; ?>" alt="Product Image" class="w-full h-64 object-cover mb-4 rounded-lg">
                <h2 class="text-2xl font-bold mb-2"><?php echo $item['item_name']; ?></h2>
                <p class="text-xl text-gray-700 mb-4">Price: $<?php echo $item['price']; ?></p>
                <p class="text-gray-700 mb-4"><?php echo $item['about']; ?></p>
                <div class="flex space-x-4">
                    <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Buy Now</button>
                    <input type="hidden" value= "<?php echo $item['id']?>" name="id">
                    <input type="hidden" value= "<?php echo $item['item_name']?>" name="item_name">
                    <input type="hidden" value = "<?php echo $item['price']?>" name="price">
                    <input type="hidden" value = "<?php echo $item['image']; ?>" name="img">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" name = "add_cart" value="<?php echo $item['id']?>">Add to Cart</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
