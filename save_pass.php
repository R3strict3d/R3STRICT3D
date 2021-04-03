<?php 
session_start();
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$cpassword = $_POST['cpassword'];
$user = $_SESSION['username'];
$username = $_SESSION['user'];
	$q="SELECT * from users where username='$user' AND password = '$oldpassword' AND email = '$username'";
	$result = mysqli_query($conn,$q) or die("wrong query");
	if ($result->num_rows > 0) {
		$q="UPDATE users SET password = '$newpassword' where username='$user' AND email = '$username'";
		$result = mysqli_query($conn,$q) or die("wrong query"); 
		print_r($result);
	}else{
		print_r("Sorry! invalid password");
	}
	$conn->close();
?>