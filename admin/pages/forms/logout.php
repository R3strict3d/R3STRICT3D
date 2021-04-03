<?php
session_start();
unset($_SESSION['adminuser']);
header("Location: http://localhost/Erms/admin/index.php",true);
 ?>
