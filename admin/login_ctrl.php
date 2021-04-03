<?php 
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$username = $_POST['username'];
$password = $_POST['password'];
if (!empty($username)&&!empty($password)) {
	$q="select * from admindetails where username='$username' AND password='$password'";
	// $sql = "SELECT * FROM admindetails WHERE username='".$username."' AND password = '".$password."'";

	$result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
// print_r($sql);
// print_r($result);
	if ($result->num_rows > 0) {
		  session_start();
		$_SESSION['adminuser'] = $username;
	  // output data of each row
	  // while($row = $result->fetch_assoc()) {
	  //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	  // }
		print_r(1);
	} else {
	  echo "Invalid Username and Password";
	}
	$conn->close();

}else{
	echo "Please enter Username and Password";
 }
?>