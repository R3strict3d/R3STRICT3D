<?php
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$id = $_POST['id'];
$date = date("Y/m/d");
session_start();
	$q="select * from whishlist where bookid='$id' AND whishedby='".$_SESSION['user']."'";
	$result = $conn->query($q);//mysqli_query($conn,$q) or die("wrong query");
	if ($result->num_rows > 0) {
		print_r(1);
		exit;
	}
// if (!empty($email)&&!empty($password)) {

	$q = "INSERT INTO whishlist (bookid, whishedby, createddate) VALUES ('$id', '".$_SESSION['user']."', '$date');";	
	// $q="select * from users where email='$email' AND password='$password'";
	 $result = $conn->query($q);//mysqli_query($conn,$q) or die("wrong query");
	if ($result==1) {
		print_r(1);
	} else {
		print_r(0);
	}
	$conn->close();

// }else{
// 	echo "Please enter Username and Password";
//  }
?>
