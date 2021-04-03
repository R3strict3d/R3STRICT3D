<?php
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$email = $_POST['email'];
$password = $_POST['password'];
if (!empty($email)&&!empty($password)) {
	$q="select * from users where email='$email' AND password='$password'";
	$result = $conn->query($q);//mysqli_query($conn,$q) or die("wrong query");
	if ($result->num_rows > 0) {
		// $res = reset($result);
		  session_start();
		$_SESSION['user'] = $email;
		
		foreach ($result as $value) {
			$_SESSION['username'] = $value['username'];
		}
		print_r(1);
	} else {
    echo "http://localhost/Erms/login.php?msg=failed";
	  // echo "Invalid Username and Password";
	}
	$conn->close();

}else{
	echo "Please enter Username and Password";
 }
?>
