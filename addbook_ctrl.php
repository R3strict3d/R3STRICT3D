<?php 
session_start();
$_POST['book_cover'] = '';
$_POST['book'] = '';
$imgtarget_dir = "admin/pages/forms/uploads/";
$imgtarget_file = $imgtarget_dir .basename($_FILES["book_cover"]["name"]);
$imguploadOk = 1;
$error = "";
$imgFileType = strtolower(pathinfo($imgtarget_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["book_cover"]["tmp_name"]);
  if($check !== false) {
    $imguploadOk = 1;
  } else {
    $imguploadOk = 0;
  }
}
if (file_exists($imgtarget_file)) {
  $error.="please change the book cover name and upload again";
  $imguploadOk = 0;
}
if ($_FILES["book_cover"]["size"] > 50000000) {
  $error.= "Sorry, your file is too large.".$_FILES["book_cover"]["size"];
  $imguploadOk = 0;
}

// Allow certain file formats
if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg"
&& $imgFileType != "gif" ) {
  $error.="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $imguploadOk = 0;
}
// if ($imguploadOk == 0) {
// } else {
//   if (move_uploaded_file($_FILES["book_cover"]["tmp_name"], $imgtarget_file)) {
//     $_POST['book_cover'] =  $imgtarget_file;
//   }
// }
$target_dir = "admin/pages/forms/uploads/books";
$target_file = $target_dir .basename($_FILES["book"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["book"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}
if (file_exists($target_file)) {
  $error.="please change the pdf file name and upload again";
  $uploadOk = 0;
}
if ($_FILES["book"]["size"] > 50000000) {
  $error.= "Sorry, your PDF file is too large.".$_FILES["book"]["size"];
  $uploadOk = 0;
}
if($imageFileType != "pdf") {
  $error.= "Sorry, only PDF files are allowed.";
  $uploadOk = 0;
}
if ($error=="") {
  
if (($uploadOk == 1)&&($imguploadOk == 1)){
  if (move_uploaded_file($_FILES["book"]["tmp_name"], $target_file)) {
    $_POST['book'] =  $target_file;
  }
  if (move_uploaded_file($_FILES["book_cover"]["tmp_name"], $imgtarget_file)) {
    $_POST['book_cover'] =  $imgtarget_file;
  }
  $bookname = isset($_POST['bookname'])?$_POST['bookname']:'';
  $book_cover = isset($_POST['book_cover'])?$_POST['book_cover']:'';
  $book = isset($_POST['book'])?$_POST['book']:'';
  $description = isset($_POST['description'])?$_POST['description']:'';
  $price = isset($_POST['price'])?$_POST['price']:'';
  $free = isset($_POST['isfree'])?$_POST['isfree']:'';
  $ispublished = isset($_POST['ispublished'])?$_POST['ispublished']:'';
  $published_date = isset($_POST['published_date'])?$_POST['published_date']:'';
  $author = isset($_POST['author'])?$_POST['author']:'';
  $publisher = isset($_POST['publisher'])?$_POST['publisher']:'';
  $category = isset($_POST['category'])?$_POST['category']:'';
  $date = date("Y/m/d");
  $staus = isset($_POST['staus'])?$_POST['staus']:'HIDE';
  $added_by = $_SESSION['user'];
  $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
  	$q="INSERT INTO book_details (bookname,book_cover,book,description,price,free,ispublished,published_date,author,publisher,category,createddate,staus,added_by) VALUES ('$bookname','$book_cover','$book','$description','$price','$free','$ispublished','$published_date','$author','$publisher','$category','$date','$staus','$added_by');";

  	$result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
  	print_r($result);
  	$conn->close();
  }
}else{
  print_r($error);
}
?>