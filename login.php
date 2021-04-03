<!DOCTYPE html>
<?php session_start();
        if (isset($_SESSION['user'])) {
            # code...
            header("Location: http://localhost/Erms/home.php",true);
        };
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles2.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/cc2994c6f2.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
        <title>Sign In $ Sign Up Form</title>
        <style type="text/css">
            .sub:hover {background-color: #3e8e41;}
        </style>
    </head>
    <body>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <div class="logo">
                <img src="images/logo1.png" alt="ERMS">
                <h1>Educational Resource<br>Management System</h1>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a class="active" href="login.php">Sign In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <section>
            <div class="cont">
                <div class="form">
                    <h2>Sign In</h2>
                    <form class="float_form" id="login_form" style="padding-left: 40px">
                    <label>
                        <span>E-mail Id</span>
                        <input type="email" name="email" required>
                    </label>
                    <label>
                        <span>Password</span>
                        <input type="password" name="password" required>
                    </label>
                      <?php
                        if(isset($_GET['msg']) && $_GET['msg']=='failed')
                        {
                            echo "<label>
                                      <span style='color:red;'>Invalid Username/Password</span>
                                  </label>";
                        }
                    ?>
                    <div id="err_msg" style="text-align: center;color: green;"></div>
                    <input type="submit" name="Login" value="Login" class="forgot-pass">
                    <p class="forgot-pass"><a href="signup.php">Sign Up</a></p><br>
                    <!-- <p class="forgot-pass">Forgot Password ?</p> -->
                    </form>
                    <div class="social-media">
                        <ul>
                            <li><img src="images/facebook.png"></li>
                            <li><img src="images/google.png"></li>
                        </ul>
                    </div>
                </div>
                <div class="sub-cont">
                    <div class="img">
                        <div class="img-text">
                            <h2>Hello, Friend!</h2>
                            <p>Enter your details to start a journey with us.</p>
                        </div>
                        <div class="img-text">
                            <h2>Welcome Back!</h2>
                            <p>Login to continue your journey with us. We missed you.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function (e) {
      $("#login_form").submit(function (e) {
        // alert()
          e.preventDefault();
          // window.scrollTo(0, 0);
          // alert();
          // $('#userloginwait_msg').slideDown(1000);
          var data = $("#login_form").serialize();
          // console.log(data);
          $.ajax({
              url: "login_ctrl.php",
              type: "POST",
              // dataType: "json",
              data: data,
              success: function (result)
              {
                console.log(result);
                if (result==1) {
                    $('#err_msg').html('You are successfully logged in');
                    setTimeout(function(){ window.location = "http://localhost/Erms/home.php"; }, 3000);
                }else{
                    window.location = result;
                }
              },
          });
      })
    });
    </script>
    </body>
</html>
