
<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','userinfo');


    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $query = mysqli_query($conn, "DELETE FROM productsdata WHERE id='$id'");
        if ($query) {
            echo "<script>alert('Delete successful')</script>";
        } else {
            echo "<script>alert('Error in deletion')</script>";
        }
    }

    if(isset($_POST['sub'])){
        $imgname= $_POST['imgname'];  
        $price = $_POST['price'];
        $detale = $_POST['detale'];
        if(isset($_FILES['upload'])){
            $upload = $_FILES['upload']['name'];
            $tmp_upload =$_FILES['upload']['tmp_name'];
            move_uploaded_file($tmp_upload,'upload/'.$upload);
        $qurry = mysqli_query($conn,"INSERT INTO productsdata (item_name,price,image,about) VALUES ('$imgname','$price','$upload','$detale');");
        if($qurry){
            echo "<script>alert('upload scussefull')</script>";
        }
        else{
            echo "<script>alert('Error')</script>";
        }
            }
            else{
                echo "Error";
                }
            
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <header>
        <img src="./Style.png" alt="">
        <nav>
             <a href="Home.php">Home</a>
            <a href="">About</a>
            <a href="">Contact</a>
            <a href="MensProducts.php">All Products</a>
        </nav>
            <button class="additem button "> Add More!
            </button>
    </header>

    <div class="form2">
        <div>
            <form class="form" method="POST" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="username">Image Name:-</label>
                    <input type="text" name="imgname" id="username" placeholder="enter image name">
                </div>
                <div class="input-group">
                    <label for="password">Price:-</label>
                    <input type="text" name="price" id="password" placeholder="enter price">
                </div>
                <div class="input-group">
                    <label for="img">Image detaile:-</label>
                    <textarea name="detale" placeholder="enter image name" rows="10" id="username"></textarea>
                </div>
                <div class="input-group">
                    <label for="img">Image Upload:-</label>
                    <input type="file" name="upload" id="password" placeholder="">
                </div>
                <div class="form-btn">
                    <button class="submit button"  name='sub'>Submit</button>
                </div>
            </form>
    </div>
   </div>
   <div class = 'mensdiv px-10'>
   <?php
   $item = mysqli_query($conn,"select * from productsdata");
   while($items = mysqli_fetch_array($item)){
   ?>
    <div class = 'itemsdiv'>
        <div class="imgdiv"><img src="upload/<?php echo $items['image']?>" alt=""></div>
        <p><?php echo $items['price']?></p>
        <p><?php echo $items['item_name']?></p>
        <p><?php echo $items['about']?></p>
        <form method="POST">
                <button class="delete" type="submit" name="delete" value="<?php echo $items['id']; ?>">Delete</button>
            </form>
    </div>
    <?php
   }
    ?>
   
   </div>
</body>
<!-- <input type="text" value="<?php echo $items['price']?>" name="price">
<input type="submit" name="update" value="<?php echo $items['id']?>"> -->
<script src="index.js"></script>
</html>