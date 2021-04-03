<?php 
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$faq = base64_encode($_POST['faq']);
$contact = base64_encode($_POST['contact']);
$about = base64_encode($_POST['about']);
// if (!empty($username)&&!empty($password)) {
	$q="UPDATE site_details SET faq = '$faq', contact= '$contact',about = '$about' where id=1";
	// $q="INSERT INTO site_details (faq, contact, about) VALUES ('$faq','$contact','$about');";

	$result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
	print_r($result);
	$conn->close();

// }else{
// 	echo "Please enter Username and Password";
//  }
?>