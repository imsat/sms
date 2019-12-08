<?php
$con = mysqli_connect("localhost","root","password","sms");
if(!$con){
	echo "DB connection Errror". mysqli_error($con);
}
?>