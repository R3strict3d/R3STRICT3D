<!DOCTYPE html>
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
        <title>Sign Up</title>
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
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="login.php">Sign In</a></li>
                <li><a class="active" href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <section>
            <div class="row">
                <div class="col-sm-12">
                    <div class="cont">
                        <div class="form">
                            <h2>Sign Up</h2>
                            <form class="float_form" id="signup_form" style="padding-left: 40px">
                            <label>
                                <span>Username</span>
                                <input type="text" name="username" required="">
                            </label>
                            <label>
                                <span>E-mail Id</span>
                                <input type="email" name="email" required="">
                            </label>
                            <label>Phone Number
                                <input type="text" data-inputmask='"mask": "(999) 999-9999"' data-mask id="phone" name="phone" required="">
                            </label>
                            <label>
                                <span>Password</span>
                                <input type="password" id="password" name="password" required="">
                            </label>
                            <label>
                                <span>Confirm Password</span>
                                <input type="password" id="cpassword" name="cpassword" required="">
                            </label>
                              <?php
                                if(isset($_GET['msg']) && $_GET['msg']=='failed')
                                {
                                    echo "<label><strong style='color:red'>Invalid Username/Password</strong></label>";
                                }if(isset($_GET['msg']) && $_GET['msg']=='exists')
                                {
                                    echo "<label><strong style='color:red'>User already exists</strong></label>";
                                }
                            ?>
                            <label style="display: none;color:red;" id="pass_err">Passwords does not match</label>
                            <input type="submit" name="Login" value="Sign Up">
                            <p class="forgot-pass"><a href="login.php">Login</a></p>
                            <!-- <button class="submit" type="button">Sign In</button> -->
                            <p class="forgot-pass">Forgot Password ?</p>
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
                </div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="admin/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script type="text/javascript">
        $('[data-mask]').inputmask()
      $(document).ready(function (e) {
      $("#signup_form").submit(function (e) {
        var pass = $('#password').val();
        var cpass = $('#cpassword').val();
        if (pass!=cpass) {
            $('#pass_err').css({"display":"block"});
            return false;
        }else{
            $('#pass_err').css({"display":"none"});
        }
        // alert()
          e.preventDefault();
          // window.scrollTo(0, 0);
          // alert();
          // $('#userloginwait_msg').slideDown(1000);
          var data = $("#signup_form").serialize();
          // console.log(data);
          $.ajax({
              url: "signup_ctrl.php",
              type: "POST",
              // dataType: "json",
              data: data,
              success: function (result)
              {
                console.log(result);
                if (result==1) {
                  window.location = "http://localhost/Erms/login.php";
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
