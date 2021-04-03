<?php
session_start();
    require("./PHPMailer/src/PHPMailer.php");
    require("./PHPMailer/src/SMTP.php");
    require("./PHPMailer/src/Exception.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();

$conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
$id = $_POST['id'];
$date = date("Y/m/d");
$author = "";
$bookname = "";
	$q="select * from book_details where id='$id' ";
	$result = $conn->query($q);
	if ($result->num_rows > 0) {
		foreach ($result as $value) {
            if ($value['added_by']=="ADMIN") {
            $author = "andrae.pcrepairs@gmail.com";
            }else{
                $author = $value['added_by'];
            }
			$bookname = $value['bookname'];
		}
	}
$mail->isSMTP();
    // $mail->SMTPDebug  = 1;  
    $mail->Host = "smtp.gmail.com"; // GMail
    $mail->SMTPAuth = true;
    $mail->Username = "erms.connect@gmail.com"; // your GMail user name
    $mail->Password = 'lyyfjhpmttnueuby';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->From = 'erms.connect@gmail.com';
    $mail->FromName = 'Educational System';
    $mail->addAddress($author, 'Author');
    $mail->isHTML(true);
    $mail->Subject = 'Using PHPMailer';
    $mail->Body    = 'Hi '.$author.'<br>The person '.$_SESSION['user'].' expressed interest in your book '.$bookname.'';
    if(!$mail->send()) {
      echo 'Message could not be sent.';
	  echo 'Mailer Error: ' . $mail->ErrorInfo;
	  exit;
    }
	$q = "INSERT INTO interestlist (bookid, interestedby, createddate) VALUES ('$id', '".$_SESSION['user']."', '$date');";
	 $result = $conn->query($q);
	if ($result==1) {
		print_r(1);
	} else {
		print_r(0);
	}
	$conn->close();
?>
