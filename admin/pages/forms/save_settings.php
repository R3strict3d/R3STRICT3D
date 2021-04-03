<?php 
session_start();
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$cpassword = $_POST['cpassword'];
$user = $_SESSION['adminuser'];
	$q="SELECT * from admindetails where username='$user' AND password = '$oldpassword'";
	$result = mysqli_query($conn,$q) or die("wrong query");
	if ($result->num_rows > 0) {
		$q="UPDATE admindetails SET password = '$newpassword' where username='$user'";
		$result = mysqli_query($conn,$q) or die("wrong query"); 
		print_r($result);
	}else{
		print_r("Sorry! invalid password");
	}
	$conn->close();
?>