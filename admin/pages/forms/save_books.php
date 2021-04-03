<?php 
session_start();
  // Configure upload directory and allowed file types 
  $upload_dir = "uploads/";//'uploads'.DIRECTORY_SEPARATOR; 
  $allowed_types = array('jpg', 'png', 'jpeg', 'gif'); 
  $error = "";
  // Define maxsize for files i.e 2MB 
  $maxsize = 5 * 1024 * 1024; 
$a =array();
  // Checks if user sent an empty form 
  if(!empty(array_filter($_FILES['book_cover']))) { 

    // Loop through each file in files[] array 
    foreach ($_FILES['book_cover']['tmp_name'] as $key => $value) { 
      
      $file_tmpname = $_FILES['book_cover']['tmp_name'][$key]; 
      $file_name = $_FILES['book_cover']['name'][$key]; 
      $file_size = $_FILES['book_cover']['size'][$key]; 
      $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 

      // Set upload file path 
      $filepath = $upload_dir.$file_name; 
      // Check file type is allowed or not 
      // Verify file size - 2MB max 
      
      if ($file_size > $maxsize)     
        $error.= "Error: File size is larger than the allowed limit."; 

      // If file with name already exist then append time in 
      // front of name of the file to avoid overwriting of file 
      if(file_exists($filepath)) { 
        $filepath = $upload_dir.time().$file_name; 
        
        if( move_uploaded_file($file_tmpname, $filepath)) { 
          // echo "{$file_name} successfully uploaded <br />"; 
          array_push($a,$filepath);

        } 
        else {           
          $error.= "Error uploading {$file_name} <br />";
        } 
      } 
      else { 
      
        if( move_uploaded_file($file_tmpname, $filepath)) { 
          // echo "{$file_name} successfully uploaded <br />"; 
          array_push($a,$filepath);
        } 
        else {           
          $error.="Error uploading {$file_name} <br />"; 
        } 
      } 
    } 
  } 
  // else { 
    
  //   // If no files selected 
  //   echo "No files selected."; 
  // } 
$_POST['book_cover'] = implode("@@",$a);;
if ($error=="") {
  
// if ($imguploadOk == 1){
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
  $staus = isset($_POST['status'])?$_POST['status']:'HIDE';
  $added_by = "ADMIN";
  $phone = isset($_POST['phone'])?$_POST['phone']:'';
  $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
    $q="INSERT INTO book_details (bookname,book_cover,description,price,published_date,author,publisher,category,createddate,staus,added_by,phone) VALUES ('$bookname','$book_cover','$description','$price','$published_date','$author','$publisher','$category','$date','$staus','$added_by','$phone');";

    $result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
    print_r($result);
    $conn->close();
  // }
}else{
  print_r($error);
}
?>
