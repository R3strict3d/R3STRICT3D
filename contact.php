<!DOCTYPE html>
<html lang="en">
<head>
  <title>About</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles2.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
      @media (max-width: 480px){
          .viewclass{
              display: none;
          }
          .btn {
            font-size: x-small;
          }
      }
      @media screen and (min-width: 481px) {
          .showclass{
            display: none;
          }
      }
  </style>
</head>
  <?php 
  $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
  $q="select * from site_details where id=1";
  $result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
  }
?>
<body>  
<nav>
          <input type="checkbox" id="check">
          <label for="check" class="checkbtn" style="width: 30px;">
              <i class="fas fa-bars"></i>
          </label>
          <div class="logo">
              <img src="images/logo1.png" alt="ERMS">
              <h1>Educational Resource<br>Management System</h1>
          </div>
          <ul style="margin-right: 6%;">
              <li><a href="index.php">Home</a></li>
              <li><a href="browse.php">Browse</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a class="active" href="contact.php">Contact</a></li>
              <?php 
                session_start();
                 if (!isset($_SESSION['user'])) {?>
                <li><a href="login.php">Sign In</a></li>
                <li><a href="signup.php">Sign Up</a></li>                    
                <?php } else{ ?>
                <li class="viewclass">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <a>Menu</a>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="align-items: center;background: #007fed;">
                        <a style="margin-left: 25px;" href="addbook.php">Add BOOK</a><br>
                        <a style="margin-left: 25px;" href="viewwhish.php">Wishlist</a><br>
                      <a style="margin-left: 25px;" href="settings.php">Settings</a><br>
                        <a style="margin-left: 25px;" href="logout.php">Logout</a><br>
                    </div>
                  </div>
                </li>
                <?php } ?>
              <!-- <li class="showclass"><a href="browse.php">Browse</a></li> -->
              <li class="showclass"><a href="addbook.php">Add BOOK</a></li>
              <li class="showclass"><a href="viewwhish.php">Wishlist</a></li>
              <li class="showclass"><a href="settings.php">Settings</a></li>
              <li class="showclass"><a href="logout.php">Logout</a></li>
          </ul>
      </nav>
      <?php 
      // session_start();
      if (isset($_SESSION['username'])&&!empty($_SESSION['username'])) {
        ?>
      <div class="container-fullwidth" style="background-color: black;color: white;">
        <p style="font-size: 25px;">Welcome <?php echo $_SESSION['username'];?></p>
      </div>
      <?php } ?>
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6"><?php echo base64_decode($row['contact']); ?></div>
    <div class="col-sm-3"></div>
  </div>
</div>
</body>
</html>
