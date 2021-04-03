<?php 
session_start();
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
// print_r($_POST);
$phone = $_POST['phone'];
$username = $_SESSION['user'];
$user = $_SESSION['username'];
	// $q="SELECT * from users where username='$user' AND email = '$oldpassword'";
	// $result = mysqli_query($conn,$q) or die("wrong query");
	// if ($result->num_rows > 0) {
		$q="UPDATE users SET phone = '$phone' where username='$user' AND email = '$username'";
		// print_r($q);
		// exit;
		$result = mysqli_query($conn,$q) or die("wrong query"); 
		print_r($result);
	// }else{
	// 	print_r("Sorry! invalid password");
	// }
	$conn->close();
?>