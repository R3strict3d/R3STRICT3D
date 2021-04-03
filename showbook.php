<?php
$id = $_POST['id'];
$staus = $_POST['staus'];
$status = "ACTIVE";
// print_r($staus);
if ($staus=="ACTIVE") {
	$status = "HIDE";
}
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
  	$q="UPDATE book_details  SET staus='$status' WHERE id='$id';";
  	// print_r($q);
  	$result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
  	print_r($result);
?>