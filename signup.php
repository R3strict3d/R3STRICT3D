<!DOCTYPE html>
<html>
    <head>
        <title>Login Form Design</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body> 
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <div class="logo">
                <img src="logo1.png" alt="ERMS">
                <h1>Educational Resource<br>Management System</h1>   
            </div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.php">About</a></li>
                <!-- <li><a href="browse.php">Browse</a></li> -->
                <li><a href="contact.php">Contact</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="login.php">Sign In</a></li>
                <li><a class="active" href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <div class="image" onclick="closeForm(); return false;">
        </div>
        <!-- <section>
            <video id="myVideo"loop autoplay muted poster="frame1.jpg">
                <source src="bk.mp4" type="video/mp4">
            </video>
        </section> -->
        <div class="container">
            <div class="myCard">
                <div class="row">
                    <div class="col-md-6">
                        <div class="myLeftCtn"> 
                            <form name="form" class="myForm text-center" action="javascript:void(0);" method="POST">
                                <header>Sign Up</header>
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <input name="Username" class="myInput" type="text" placeholder="Username" id="username" required> 
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-envelope"></i>
                                    <input name="Email" class="myInput" placeholder="Email" type="text" id="email" required> 
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-lock"></i>
                                    <input name="Password" class="myInput" type="password" id="password" placeholder="Password" required> 
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-lock"></i>
                                    <input name="Confirm" class="myInput" type="password" id="password" placeholder="Confirm Password" required> 
                                </div>

                                <div class="form-group">
                                    <label>
                                        <input id="check_1" name="check_1"  type="checkbox" required ><small> I read and agree to Terms & Conditions</small></input> 
                                        <div class="invalid-feedback">You must check the box.</div>
                                    </label>
                                </div>

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
                                <input type="submit" class="butt" value="Sign Up" id="popupLink">
                            </form>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="myRightCtn">
                                <div class="box"><header>Welcome Back!</header>
                                
                                <p>Already have an account?
                                    Sign in here.</p>
                                    <a href="Sign_In.html"><input type="button" class="butt_out" value="Sign In"/></a>
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         
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

