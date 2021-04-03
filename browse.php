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
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
          <script src="plugin/pagination/jquery.simplePagination.js"></script>
          <link rel="stylesheet" href="plugin/pagination/simplePagination.css">
        <title>HOME</title>
                <style type="text/css">
            .logo{
                display: flex;
                float: left;
                /*padding: 0 100px;*/
            }
            .logo img{
                height: 80px;
                width: 65px;
            }
            @media (max-width: 480px){
                .viewclass{
                    display: none;
                }
                .btn {
                  font-size: x-small;
                }
                /*.showclass{
                  display: block;
                }*/
            }
            @media screen and (min-width: 481px) {
                /*.viewclass{
                    display: block;
                }*/
                .showclass{
                  display: none;
                }
            }
        </style>
    </head>
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
              <li><a class="active" href="browse.php">Browse</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a href="contact.php">Contact</a></li>
              <?php 
              session_start();
              if (isset($_SESSION['username']) && !empty($_SESSION['username'])) { ?>
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
              <!-- <li class="showclass"><a href="browse.php">Browse</a></li> -->
              <li class="showclass"><a href="addbook.php">Add BOOK</a></li>
              <li class="showclass"><a href="viewwhish.php">Wishlist</a></li>
              <li class="showclass"><a href="settings.php">Settings</a></li>
              <li class="showclass"><a href="logout.php">Logout</a></li>
              <?php } else {?>
                <li><a href="login.php">Sign in</a></li>
              <?php } ?>
          </ul>
      </nav>
      <?php 
      if (isset($_SESSION['username'])&&!empty($_SESSION['username'])) {
        ?>
      <div class="container-fullwidth" style="background-color: black;color: white;">
        <p style="font-size: 25px;">Welcome <?php echo $_SESSION['username'];?></p>
      </div>
      <?php } ?>
<!--       <nav>
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
              <li><a class="active" href="browse.php">Browse</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a href="logout.php">Logout</a></li>
          </ul>
      </nav> -->
        <?php
          $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
          $q="select * from book_details";
          $result = $conn->query($q);// $result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
          $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
          $q="select * from categories";
          $catresult = $conn->query($q);
        ?>

        <div class="container" >
          <div class="row">
            <!-- <div class="col-sm-12"> -->
              <!-- <div class="col-sm-3" style="position: fixed;"></div> -->
              <form name="browse" id="browse">
                <div class="col-sm-6 form-group">
                  <div class="search-box" style="align-content: center;">
                    <!-- <label>Book name</label> -->
                      <input type="text" class="search form-control" placeholder="Search for book..." name="search" id="search"   />
                  </div>
                </div>
                <div class="col-sm-6 form-group">
                  <div class="search-box" style="align-content: center;">
                    <!-- <label>Book name</label> -->
                      <input type="text" class="search form-control" placeholder="Search author name" name="author" id="author"/>
                  </div>
                </div>
                <div class="col-sm-6 form-group">
                  <div class="search-box" style="align-content: center;">
                    <!-- <label>Book name</label> -->
                    <select class="form-control select2" style="width: 100%;" id="category" name="category">
                      <option value="">--Select All--</option>
                      <?php foreach ($catresult as $value) { ?>
                        <option value="<?php echo $value['genre']?>"><?php echo $value['genre']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6 form-group">
                  <div class="search-box" style="align-content: center;">
                    <!-- <label>Book name</label> -->
                    <select class="form-control select2" style="width: 100%;" id="rec" name="rec" >
                      <option value="">--Select--</option>
                      <option value="DESC">Recent</option>
                      <option value="ASC">Old</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 form-group"></div>
                  <div class="col-sm-4 form-group">
                    <div class="search-box">
                      <button type="submit" class="form-control search-btn btn btn-success">Search <i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  <div class="col-sm-4 form-group"></div>
                </div>
              </form>
              <!-- <div class="col-sm-3"></div> -->
            <!-- </div> -->
          </div>
        </div><br><br>
        <div class="container">
            <div class="row">
                <div class="card">
                  <div class="card-body">
                    <div class="col-sm-12">
                      <div class="list-wrapper">
                        <div class="col-sm-12 result"><div class="list-item">Search results</div></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer clearfix float-right">
                    <div id="pagination-container" style="margin-top: 30px;float: right;"></div>
                  </div>
                </div>

            </div>

        </div>
        <script type="text/javascript">
            var items = $(".list-wrapper .list-item");
            var numItems = items.length;
            var perPage = 4;

            items.slice(perPage).hide();

            $('#pagination-container').pagination({
                items: numItems,
                itemsOnPage: perPage,
                prevText: "&laquo;",
                nextText: "&raquo;",
                onPageClick: function (pageNumber) {
                    var showFrom = perPage * (pageNumber - 1);
                    var showTo = showFrom + perPage;
                    items.hide().slice(showFrom, showTo).show();
                }
            });
        </script>
        <script type="text/javascript">
          $(document).ready(function (e) {
            search = '<?php echo isset($_GET['search'])?$_GET['search']:""; ?>';
            if (search != "") {
              console.log(search);
              $('#search').val(search);
              $.ajax({
                  url: "browse_ctrl.php",
                  type: "POST",
                  // dataType: "json",
                  data: {search:search},
                  success: function (result)
                  {
                    res = JSON.parse(result);
                    if(res['status']==1){
                      $('.result').remove("div");
                      data = '';
                      $(res['data']).each(function(value) {
                          console.log(res);
                          var str = res['data'][value]['book_cover'];
                            var book = str.replace("admin/pages/forms/", "");
                            console.log(str)
                            console.log(book)
                          price = "FREE";
                          if (res['data'][value]['price']!=0) {
                            price = res['data'][value]['price'];
                          }
                          book = book.split("@@");
                          data += ' <div class="col-sm-12 result"><div class="list-item"><div class="col-sm-4"><div style="padding: 5px;"><a href="bookview.php?book='+res['data'][value]['id']+'"><img src="admin/pages/forms/'+book[0]+'" width="200px" height="200px"></a></div></div><div class="col-sm-8"><p>TITTLE : '+res['data'][value]['bookname']+'</p><p>AUTHOR :'+res['data'][value]['author']+' </p><p>PRICE :'+price+' </p><p>DESCRIPTION :'+res['data'][value]['description']+' </p><button onclick="bookview('+res['data'][value]['id']+')" class="btn btn-primary">View</button></div></div></div>';
                          // console.log(data);
                      });
                      $('.list-wrapper').html(data);
                      console.log();
                    }else{
                      // $('.list-item').remove("div");
                      data = '<div class="col-sm-12 result"><div class="list-item">No results</div></div>';
                      $('.list-wrapper').html(data);
                    }

                  },
              });
              var items = $(".list-wrapper .list-item");
              var numItems = items.length;
              var perPage = 4;

              items.slice(perPage).hide();

              $('#pagination-container').pagination({
                  items: numItems,
                  itemsOnPage: perPage,
                  prevText: "&laquo;",
                  nextText: "&raquo;",
                  onPageClick: function (pageNumber) {
                      var showFrom = perPage * (pageNumber - 1);
                      var showTo = showFrom + perPage;
                      items.hide().slice(showFrom, showTo).show();
                  }
              });
            }

          $("#browse").submit(function (e) {
            // alert()
              e.preventDefault();
              // window.scrollTo(0, 0);
              // console.log("dchjb");
              // alert();
              // $('#userloginwait_msg').slideDown(1000);
              // if ($("#search").val()=='') {
              //   return false;
              // }
              var data = $("#browse").serialize();
              console.log(data);
              $.ajax({
                  url: "browse_ctrl.php",
                  type: "POST",
                  // dataType: "json",
                  data: data,
                  success: function (result)
                  {
                    res = JSON.parse(result);
                    if(res['status']==1){
                      // $('.list-wrapper').remove("div");
                      // $('.list-item').remove("div");
                      data = '';
                      $(res['data']).each(function(value) {
                          console.log(res);
                          var str = res['data'][value]['book_cover'];
                            var book = str.replace("admin/pages/forms/", "");
                            console.log(str)
                            console.log(book)
                          price = "FREE";
                          if (res['data'][value]['price']!=0) {
                            price = res['data'][value]['price'];
                          }
                          book = book.split("@@");
                          data += ' <div class="col-sm-12 result"><div class="list-item"><div class="col-sm-4"><div style="padding: 5px;"><a href="bookview.php?book='+res['data'][value]['id']+'"><img src="admin/pages/forms/'+book[0]+'" width="200px" height="200px"></a></div></div><div class="col-sm-8"><p>TITTLE : '+res['data'][value]['bookname']+'</p><p>AUTHOR :'+res['data'][value]['author']+' </p><p>PRICE :'+price+' </p><p>DESCRIPTION :'+res['data'][value]['description']+' </p><button onclick="bookview('+res['data'][value]['id']+')" class="btn btn-primary">View</button></div></div></div><br><br>';
                          // console.log(data);
                      });
                      $('.list-wrapper').html(data);
                    }else{
                      // $('.list-wrapper').remove("div");
                      // $('.list-item').remove("div");
                      data = '<div class="col-sm-12 result"><div class="list-item">No results</div></div>';
                      $('.list-wrapper').html(data);
                    }

                  },
              });
              var items = $(".list-wrapper .list-item");
              var numItems = items.length;
              var perPage = 4;

              items.slice(perPage).hide();

              $('#pagination-container').pagination({
                  items: numItems,
                  itemsOnPage: perPage,
                  prevText: "&laquo;",
                  nextText: "&raquo;",
                  onPageClick: function (pageNumber) {
                      var showFrom = perPage * (pageNumber - 1);
                      var showTo = showFrom + perPage;
                      items.hide().slice(showFrom, showTo).show();
                  }
              });
          })
        });
          function bookview(id) {
            window.location = 'http://localhost/Erms/bookview.php?book='+id;
          }

        </script>
    </body>
</html>
