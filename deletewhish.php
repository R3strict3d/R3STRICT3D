<?php
session_start();
$id = $_POST['book_id'];
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
  	$q="DELETE FROM whishlist WHERE id='$id' AND whishedby='".$_SESSION['user']."';";
  	// print_r($q);
  	$result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
  	print_r($result);
?>