<?php 
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$createddate = date('Y/m/d');
$email = $_POST['email'];
	$q="select * from users where email='$email'";
	$result = mysqli_query($conn,$q) or die("wrong query");
	if ($result->num_rows > 0) {
		echo "http://localhost/Erms/signup.php?msg=exists";
		exit;
	} else {
	  $q="INSERT INTO users (username, email, password,createddate,phone) VALUES ('$username','$email','$password','$createddate','$phone');";
	  $result = mysqli_query($conn,$q) or die("wrong query");
	  if ($result==1) {
	  	print_r(1);
	  }
	}
	$conn->close();
?>