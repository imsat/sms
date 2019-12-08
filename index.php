<?php
session_start();
include_once("connect.php");

//if session has user redirect to target page.
if(isset($_SESSION['user'])){
  header("location: user.php");
}

$message = "";
$error = "";
if(isset($_POST['submit'])){
    
    $email   = $_POST['email'];
    $password    = $_POST['password'];
   
    if(strlen($email) < 1){
        $error = "The email field required";
    }else if(strlen(!filter_var($email, FILTER_VALIDATE_EMAIL))){
        $error = "Whoops Email is not valid!!";
    }else if(strlen($password) < 1){
        $error = "The password field required";
    }else{
        $query = "SELECT * FROM user WHERE email='$email' AND password='$password' LIMIT 1";
        $results = mysqli_query($con, $query);


            if (mysqli_num_rows($results) == 1) { // user found
            // check if user is valid user.
            $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['message']  = "You are now logged in";
            header('Location: user.php');    
        }else{
              $error  = "Email or password invalid!!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylee.css">
</head>
<body>

<section class="login-area">

    <h3 align="center"><span style="color:green; "><?php echo $message; ?></span></h3>
    <h3 align="center"><span style="color:red; "><?php echo $error; ?></span></h3>

      <form class="login-content animate" method="post">
    <div class="imgcontainer">
      <img src="./img/login-img.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" >

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" >
         
     <label>
        <input type="checkbox" name="remember"> Remember me
      </label>
      <button type="submit" name="submit">Login</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <span class="psw ">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</section>

</body>
</html>
