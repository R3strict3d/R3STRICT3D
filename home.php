<!DOCTYPE html>
<?php session_start();
 if (!isset($_SESSION['user'])) {
    header("Location: http://localhost/Erms/login.php",true);
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
              <li><a class="active" href="index.php">Home</a></li>
              <li><a href="browse.php">Browse</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li class="viewclass">
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <a>Menu</a>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="align-items: center;background: #007fed;">
                      <a style="margin-left: 25px;" href="addbook.php">Add BOOK</a><br>
                      <a style="margin-left: 25px;" href="viewbooks.php">View BOOK</a><br>
                      <a style="margin-left: 25px;" href="viewwhish.php">Wishlist</a><br>
                      <a style="margin-left: 25px;" href="settings.php">Settings</a><br>
                      <a style="margin-left: 25px;" href="logout.php">Logout</a><br>
                  </div>
                </div>
              </li>
              <!-- <li class="showclass"><a href="browse.php">Browse</a></li> -->
              <li class="showclass"><a href="addbook.php">Add BOOK</a></li>
              <li class="showclass"><a href="viewbooks.php">View BOOK</a></li>
              <li class="showclass"><a href="viewwhish.php">Wishlist</a></li>
              <li class="showclass"><a href="settings.php">Settings</a></li>
              <li class="showclass"><a href="logout.php">Logout</a></li>
          </ul>
      </nav>
      <div class="container-fullwidth" style="background-color: black;color: white;">
        <p style="font-size: 25px;">Welcome <?php echo $_SESSION['username']?></p>
      </div>
        <?php
          $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
          $q="select * from book_details WHERE staus = 'ACTIVE'";
          $result = $conn->query($q);
          $sql="SELECT * FROM `whishlist` WHERE whishedby = '".$_SESSION['user']."'";
          $res = $conn->query($sql);;
          $sql="SELECT * FROM `interestlist` WHERE interestedby = '".$_SESSION['user']."'";
          $r = $conn->query($sql);
        ?>
        <div class="container">
            <div class="row">
                <div class="card">
                  <div class="card-body">
                    <div class="col-sm-12">
                      <div class="list-wrapper">
                          <?php if ($result->num_rows > 0) {
                              foreach ($result as $value) {
                              ?>
                            <div class="col-sm-12">
                              <div class="list-item">
                                <div class="col-sm-4">
                                    <div style="padding: 5px;">
                                      <?php $pic = explode("@@",$value['book_cover'])?>
                                        <a href="bookview.php?book=<?php echo $value['id'];?>"><img src="<?php echo 'admin/pages/forms/'. str_replace("admin/pages/forms/", '', $pic[0]);?>" width="200px" height="250px"></a>
                                    </div>
                                </div>
                                <div class="col-sm-8" style="">
                                    <p>TITTLE : <?php echo $value['bookname'];?></p>
                                    <p>AUTHOR : <?php echo $value['author'];?></p>
                                    <p>PRICE : <?php echo $value['free']?$value['price']:"FREE";?></p>
                                    <p>DESCRIPTION : <?php echo $value['description'];?></p>
                                    <div style="align-items: flex-start;justify-content: space-between;">
                                      <?php if ($r->num_rows > 0) {
                                        $i = 0;
                                        foreach ($r as $val) { 
                                          if (($val['interestedby']==$_SESSION['user'])&&($val['bookid']==$value['id'])) { 
                                            $i=$i+1;?>
                                            <button class="btn btn-primary"  style="margin-right: 5px;">Expressed Interest</button>
                                        <?php 
                                          }
                                        }
                                        if ($i == 0) { ?>
                                          <button  id="int<?php echo $value['id'];?>"class="btn btn-primary"  style="margin-right: 5px;" onclick="addinterest('<?php echo $value['id'];?>')">I am Interested</button>
                                          <?php }
                                      }else{?>
                                          <button  id="int<?php echo $value['id'];?>"class="btn btn-primary"  style="margin-right: 5px;" onclick="addinterest('<?php echo $value['id'];?>')">I am Interested</button>
                                        <?php
                                      }?>
                                      <?php if ($res->num_rows > 0) {
                                        $j = 0;
                                        foreach ($res as $val) { 
                                          if (($val['whishedby']==$_SESSION['user'])&&($val['bookid']==$value['id'])) { 
                                            $j=$j+1;?>
                                            <button class="btn btn-warning"  style="margin-right: 5px;">Added to whishlist</button>
                                        <?php 
                                          }
                                        }if($j==0){?>
                                            <button id="whish<?php echo $value['id'];?>" class="btn btn-warning"  style="margin-right: 5px;" onclick="addwhish('<?php echo $value['id'];?>')">Add to whishlist</button>
                                       <?php 
                                            }
                                      }else{?>
                                        <button id="whish<?php echo $value['id'];?>" class="btn btn-warning"  style="margin-right: 5px;" onclick="addwhish('<?php echo $value['id'];?>')">Add to whishlist</button>
                                      <?php
                                      }?>
                                      <button  id="int<?php echo $value['id'];?>"class="btn btn-primary viewclass"  style="margin-right: 5px;" onclick="bookview('<?php echo $value['id'];?>')">View</button>
                                      </div>
                                </div>
                              </div>
                            </div><br><br>
                          <?php
                              }
                           }
                           ?>
                      </div>
                    </div>
                  </div>
                  <div class="float-right">
                    <div id="pagination-container" style="margin-top: 30px;float: right;"></div>
                  </div>
                </div>

            </div>

        </div>
        <script type="text/javascript">
          if (screen.width>=850) {
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
          window.onresize = function() {
            if (screen.width>=850) {
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
          }
          // console.log()
            function addwhish(id) {
              var selector = "#whish"+id;
              $.ajax({
                  url: "addwish.php",
                  type: "POST",
                  // dataType: "json",
                  data: {id:id},
                  success: function (result)
                  {
                    console.log(result);
                    if (result==1) {
                      // alert(selector);
                       $(selector).html("Added to whishlist");
                    }else{
                        // window.location = result;
                        // alert(result);
                    }
                  },
              });
            }
            function addinterest(id) {
              var selector = "#int"+id;
              $.ajax({
                  url: "addinterest.php",
                  type: "POST",
                  // dataType: "json",
                  data: {id:id},
                  success: function (result)
                  {
                    console.log(result);
                    if (result==1) {
                      // alert(selector);
                       $(selector).html("Expressed Interest");
                    }else{
                        // window.location = result;
                        // alert(result);
                    }
                  },
              });
            }
          function bookview(id) {
            window.location = 'http://localhost/Erms/bookview.php?book='+id;
          }
        </script>
    </body>
</html>
