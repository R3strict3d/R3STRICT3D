<?php 
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$genre = $_POST['genre'];
$q = "INSERT INTO `categories` (`genre`) VALUES ('$genre')";
// print_r($q);
	$result = mysqli_query($conn,$q) or die("wrong query");
	print_r($result);
	$conn->close();
?>