<?php
    session_start();
    $conn = mysqli_connect('localhost','root','','userinfo');
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $password= $_POST["password"];

        $query = mysqli_query($conn,"select * from admininfo where username = '$name' and password = '$password'");
        $query2 = mysqli_query($conn,"select * from users where username = '$name' and password = '$password'");

        if($query2){
          if($fetch = mysqli_fetch_array($query2)){
              $_SESSION['username'] = $fetch['username'];
              $_SESSION['user_id'] = $fetch['ID'];
              $_SESSION['loggedin'] = true;
              header("location: /project/home.php");
          }
        }

        if($query){
          if($fetch = mysqli_fetch_array($query)){
              $_SESSION['adminuser'] = $fetch['name'];
              $_SESSION['loggedin'] = true;
              header("location: /project/admin.php");
          }
        }


        // if($query2 && $query){
        //     if($fetch = mysqli_fetch_array($query)){
        //         $_SESSION['adminuser'] = $fetch['name'];
        //         header("location: admin.php");
        //     }else{
        //         $_SESSION['username'] = $fetch['name'];
        //         $_SESSION['loggedin'] = true;
        //         header("location: /project/Home.php");
        //     }
        // }else{

        // }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/SIgn-up.css">
    <title>Document</title>
</head>
<body>
   <div class="main">
   <div class="container">
    <div class="heading">Login</div>
    <form action="" class="form" method = "POST">
      <input required="" class="input" type="text" name="name" id="name" placeholder="Username">
      <input required="" class="input" type="password" name="password" id="password" placeholder="Password">
      <span class="forgot-password"><a href="#">Forgot Password ?</a></span>
      <input class="login-button" type="submit" value="Log in">
      
    </form>
    <div class="social-account-container">
        <span class="title">Or Sign in with</span>
        <div class="social-accounts">
          <button class="social-button google">
            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
              <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
            </svg></button>
          <button class="social-button apple">
            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
              <path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"></path>
            </svg>
          </button>
          <button class="social-button twitter">
            <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
              <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
            </svg>
          </button>
        </div>
      </div>
      <span class="agreement"><a href="#">Learn user licence agreement</a></span>
  </div>
   </div>

</body>
<script>
</script>
</html>