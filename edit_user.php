<?php
session_start();
include_once("connect.php");

$id = $_GET['id'];

$message = "";
$error = "";
if(isset($_POST['submit'])){
	
    $user_id 	 = $_POST['user_id'];
    $name 	 = $_POST['name'];
    $email 	 = $_POST['email'];
    $password 	 = $_POST['password'];
    $address 	 = $_POST['address'];
   
    
        $updateQuery = "UPDATE user SET name = '$name', email = '$email', password = '$password', address = '$address' WHERE id = '$user_id'";
        if(mysqli_query($con, $updateQuery))
        {
	
            $message = "Update Successfully";
			$_SESSION['message']=$message;
			header('Location: user.php');
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
 <?php 
	$query = "SELECT * FROM user WHERE id = '$id'";
	if($result =mysqli_query($con, $query)){
		while($row = $result->fetch_assoc()){
			
	
  ?>
<form  method="post">
<div class="container">
    <h1>Test Form</h1>
  <br />

<h1 align="center"><span style="color:green; "><?php echo $message; ?></span></h1>
    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" value="<?php echo $row['name']; ?>" name="name" >
    <input type="hidden" placeholder="Enter Name" value="<?php echo $row['id']; ?>" name="user_id" >
	
	<label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" value="<?php echo $row['email']; ?>"  name="email" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" >
<label for="psw"><b>Address</b></label><br />
     <textarea name="address" rows="3" placeholder="Enter Address"><?php echo $row['address']; ?></textarea>

      <button type="submit" name="submit" class="signupbtn">UpDate</button>
	
    </div>
  </div>
</form>
      <?php 	} } ?>
</body>
</html>