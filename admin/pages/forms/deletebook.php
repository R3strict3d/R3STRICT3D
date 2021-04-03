<?php
session_start();
$id = $_POST['book_id'];
$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
  	$q="DELETE FROM book_details WHERE id='$id';";

  	$result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
  	print_r($result);
?>