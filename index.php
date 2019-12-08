<?php
session_start();
include_once("connect.php");

$message = "";
$error = "";
if(isset($_POST['submit'])){
	
    $name 	 = $_POST['name'];
    $email 	 = $_POST['email'];
    $password 	 = $_POST['password'];
    $address 	 = $_POST['address'];
   
    if(strlen($name) < 3){
        $error = "Whoops Name is too short!";
    }else if(strlen(!filter_var($email, FILTER_VALIDATE_EMAIL))){
        $error = "Whoops Email is not valid!!";
    }else if(strlen($address) < 1){
        $error = "Whoops You Have to Input your Address!!";
    }else{
        $insQuery = "INSERT INTO user(name, email, password, address)  VALUES ('$name ', '$email', '$password', '$address')";
        if(mysqli_query($con, $insQuery))
        {
	
            $message = "Successfully";
			$_SESSION['message']=$message;
			header('Location: user.php');
        }
		}
    
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="stylee.css" />
</head>
<body>
<form  method="post" >
<div class="container">
    <h1>Test Form</h1>
  <br />

<h3 align="center"><span style="color:green; "><?php echo $message; ?></span></h3>
<h3 align="center"><span style="color:red; "><?php echo $error; ?></span></h3>

    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" >
	
	<label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" >
<label for="psw"><b>Address</b></label><br />
     <textarea name="address"
                              rows="3" placeholder="Enter Address"></textarea>

	  
      <button type="submit" name="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>