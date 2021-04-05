<!DOCTYPE html>
<?php session_start();
        if (isset($_SESSION['user'])) {
            # code...
            header("Location: http://localhost/Erms/home.php",true);
        };
?>
<html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
        <link rel="stylesheet" href="style2.css">
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
                    <img src="logo1.png" alt="ERMS">
                    <h1>Educational Resource<br>Management System</h1>   
                </div>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <!-- <li><a href="browse.php">Browse</a></li> -->
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a class="active" href="login.php">Sign In</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                </ul>
            </nav>
            
            <div class="image">
        </div>
        <div class="container">
            <div class="myCard">
                <div class="row">
                    <div class="col-md-6">
                        <div class="myRightCtn">
                                <div class="box"><header>Hey, There!</header>
                                
                                <p>Not yet a member?
                                    Sign up here.</p>
                                    <a href="Sign_Up.html"><input type="button" class="butt_out" onclick="Sign_Up.html" value="Sign Up"/></a>
                                </div>
                                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="myLeftCtn"> 
                            <form class="myForm text-center" action="Dashboard.html"
                            method="POST">
                                <header>Sign In</header>
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <input class="myInput" type="text" placeholder="Username" id="username" required> 
                                </div>

                                <div class="form-group">
                                    <i class="fas fa-lock"></i>
                                    <input class="myInput" type="password" id="password" placeholder="Password" required> 
                                </div>
                                <?php
                                    if(isset($_GET['msg']) && $_GET['msg']=='failed')
                                    {
                                        echo "<label>
                                        <span style='color:red;'>Invalid Username/Password</span>
                                        </label>";
                                    }
                                ?>
                                
                                <div id="err_msg" style="text-align: center;color: green;"></div>
                                <div class="for">
                                    <a class="forgot" href="#">Forgot Password?</a>
                                </div>

                                <input type="submit" class="butt" value="Sign In">
                                
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
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
    
           