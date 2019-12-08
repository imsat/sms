<?php
	session_start();
	$message = "";
 if(isset($_SESSION['message'])){
      $message = $_SESSION['message'];
    }

include_once("connect.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="stylee.css" />
</head>
<body>
<a href="index.php">
<h3 align="center"><span style="color:green; "><?php echo $message; ?></span></h3>
	<table style="width:100%">
  <tr>
    <th>Firstname</th>
    <th>Email</th> 
    <th>Address</th>
    <th>Action</th>
  </tr>
  <?php 
	$query = "SELECT * FROM user";
	if($result =mysqli_query($con, $query)){
		while($row = $result->fetch_assoc()){
			
	
  ?>
  <tr align="center">
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td> 
    <td><?php echo $row['address']; ?></td>
    <td>
	<a href="edit_user.php?id=<?php echo $row['id'];?>">Edit</a>
	<a href="delete_user.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you Sure To Delete!!')">Delete</a>
	</td>
  </tr>
    <?php 	} } ?>
	<?php unset($_SESSION['message']); ?>
</table>

<button type="submit"  class="backbtn" >Go Back</button></a>
</body>
</html>