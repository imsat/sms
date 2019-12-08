<?php
$con = mysqli_connect("localhost","root","","form");
if(!$con){
	echo "DB connection Errror". mysqli_error($con);
}
?>