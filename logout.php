<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['username']);
header("Location: http://localhost/Erms/login.php",true);
 ?>
