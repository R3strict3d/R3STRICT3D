<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Educational Resource Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/cc2994c6f2.js" crossorigin="anonymous"></script>
    </head>
    <body>
      <?php session_start();
 if (isset($_SESSION['user'])) {
    header("Location: http://localhost/Erms/login.php",true);
};
?>
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
                <li><a class="active" href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <!-- <li><a href="browse.php">Browse</a></li> -->
                <li><a href="contact.php">Contact</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="login.php">Sign In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
        <section>
            <div class="image">
            </div>
            <div>
                <h1 style="font-size: 2.5vmin;" class="hy">
                     Donating and selling books have never been easier!
                <h1>
                <p style="font-size: 2vmin;" class="py">
                    You can donate or sell textbooks.
                </p>
                <p style="font-size: 2vmin;" class="py2">
                    Search for the books you need.
                </p>
            </div>
        </section>
        <div class="container">
            <form name="browse" id="browse" novalidate="">
                <div class="search-box">
                    <input type="text" class="search"
                    placeholder="Search for book..." name="search" id="search" />
                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button><br>
                </div>
            </form>
            <div id="res" style="margin-top: 52px;color: #fff;margin-left: 13%;"></div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function (e) {
      $("#browse").submit(function (e) {
        // alert()
          e.preventDefault();
          window.location = "http://localhost/Erms/browse.php?search="+$('#search').val();
          // var data = $("#browse").serialize();
          // console.log(data);
          // $.ajax({
          //     url: "browse_ctrl.php",
          //     type: "POST",
          //     dataType: "json",
          //     data: data,
          //     success: function (result)
          //     {
          //       // console.log(result['data'].length);
          //       console.log(result['status']);
          //       if (result['status']==1) {
          //         document.getElementById("res").innerHTML = result['data'].length+" matching results for your search please login to view those books";
          //         // window.location = "http://localhost/Andrae/home.php";
          //       }else{
          //         document.getElementById("res").innerHTML = "0 matching results for your search please come again after some time";
          //       }
          //     },
          // });
      })
    });
      function loginpage() {
        window.location = "http://localhost/Erms/login.php"
      }
    </script>
    </body>
</html>
