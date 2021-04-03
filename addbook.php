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
            input {
              text-align: left;
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
                      <a style="margin-left: 25px;" class="active" href="addbook.php">Add BOOK</a><br>
                      <a style="margin-left: 25px;" href="viewbooks.php">View BOOK</a><br>
                      <a style="margin-left: 25px;" href="viewwhish.php">Wishlist</a><br>
                      <a style="margin-left: 25px;" href="settings.php">Settings</a><br>
                      <a style="margin-left: 25px;" href="logout.php">Logout</a><br>
                  </div>
                </div>
              </li>
              <!-- <li class="showclass"><a href="browse.php">Browse</a></li> -->
              <li class="showclass"><a class="active" href="addbook.php">Add BOOK</a></li>
              <li class="showclass"><a href="viewbooks.php">View BOOK</a></li>
              <li class="showclass"><a href="viewwhish.php">Wishlist</a></li>
              <li class="showclass"><a href="settings.php">Settings</a></li>
              <li class="showclass"><a href="logout.php">Logout</a></li>
          </ul>
      </nav>
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
              <li><a href="browse.php">Browse</a></li>
              <li><a class="active" href="addbook.php">Add Book</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a href="logout.php">Logout</a></li>
          </ul>
      </nav> -->
      <?php 
      if (isset($_SESSION['username'])&&!empty($_SESSION['username'])) {
        ?>
      <div class="container-fullwidth" style="background-color: black;color: white;">
        <p style="font-size: 25px;">Welcome <?php echo $_SESSION['username'];?></p>
      </div>
      <?php } ?>
        <div class="container">
          <?php 
            $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
            $q="select * from categories";
            $result = $conn->query($q);
          ?>
            <div class="row">
              <div class="col-sm-12">
                  
                    <div class="col-md-6  col-sm-6">
                      <div id='suc_msg' class="alert alert-success no-border" style="display:none;">
                          <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                          <span class="text-semibold"><b>Successfully Added</b></span><span id="suc_content"></span>
                      </div>
                      <div id='error_msg' class="alert alert-danger no-border" style="display:none;">
                          <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                          <span class="text-semibold"><b>Sorry! </b></span><span id="error_content"></span>
                      </div>
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Add Books</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form name="add_book_form" id="add_book_form" action="" method="" enctype="multipart/form-data">
                          <div class="card-body">
                            <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Book Name</label> -->
                              <h5><b>Book Name</b></h5>
                              <input type="text" class="form-control" id="bookname"  name="bookname" placeholder="Enter Book Name" required="">
                            </div>
                            <div class="form-group">
                              <h5 for="exampleInputEmail1"><b>Book Cover</b></h5>
                              <input type="file" class="form-control" id="book_cover"  name="book_cover[]" placeholder="Upload Picture" accept="image/jpeg,image/gif,image/png" required="" multiple="">
                            </div>
                            <div class="form-group">
                              <h5 for="exampleInputPassword1"><b>Category</b></h5>
                                <select class="form-control select2" style="width: 100%;" id="category" name="category" required="">
                                  <?php foreach ($result as $value) { ?>
                                  <option value="<?php echo $value['genre']?>"><?php echo $value['genre']?></option>
                                  <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <h5 for="exampleInputFile"><b>Author name</b></h5>
                              <input type="text" class="form-control" id="author"  name="author" placeholder="Enter Author name" required="">
                            </div>
                            <div class="form-group">
                              <h5 for="exampleInputFile"><b>Description</b></h5>
                              <textarea class="form-control" placeholder="Enter Description" id="description" name="description" maxlength="500"  required=""></textarea>
                            </div>
                            <div class="form-group">
                              <h5 for="exampleInputPassword1"><b>Is free</b></h5>
                                <select class="form-control select2" style="width: 100%;" id="isfree" name="isfree"  required="">
                                  <option value="1">Free</option>
                                  <option value="0" selected="">Paid</option>
                                </select>
                            </div>
                            <div class="form-group" id="price_div">
                              <h5 for="exampleInputFile"><b>Price</b></h5>
                              <input type="number" class="form-control" id="price"  name="price" min="1" placeholder="Enter Price" required="">
                            </div>
                          <div class="form-group" id="published_date_div">
                            <h5 for="exampleInputFile"><b>Show</b></h5>
                              <select class="form-control select2" style="width: 100%;" id="status" name="status" required="">
                                <option value="ACTIVE" selected>Show</option>
                                <option value="HIDE">Hide</option>
                              </select>
                          </div>
                          <div class="form-group" id="published_date_div">
                            <h5 for="exampleInputFile"><b>Publish Date</b></h5>
                            <input type="text" class="form-control" id="published_date"  name="published_date" placeholder="Enter Date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required="">
                          </div>
                          <div class="form-group">
                            <h5 for="exampleInputFile"><b>Publisher</b></h5>
                            <input type="text" class="form-control" id="publisher"  name="publisher" placeholder="Enter Publisher" required="">
                          </div>
                          <div class="form-group">
                            <h5 for="exampleInputFile"><b>Phone Number</b></h5>
                            <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask id="phone" name="phone">
                          </div>
                        </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  <div class="col-md-3 col-sm-3"></div>
                  <div class="col-md-3 col-sm-3"></div>
                </div>
            </div>
        </div>
        <script src="admin/plugins/inputmask/jquery.inputmask.min.js"></script>
        <script type="text/javascript">
          $('#published_date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          $('[data-mask]').inputmask()
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
                       $(selector).html("Added to whishlist");
                    }else{
                        // window.location = result;
                        // alert(result);
                    }
                  },
              });
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function (e) {
              $('#isfree').on('change', function() {
                // alert( this.value );
                if (this.value==1) {
                  $('#price').prop('required',false);
                  $('#price_div').css({"display":"none"});
                }else{
                  $('#price').prop('required',true);
                  $('#price_div').css({"display":"block"});
                }
              });
              $('#ispublished').on('change', function() {
                // alert( this.value );
                if (this.value==1) {
                  $('#published_date').prop('required',false);
                  $('#published_date_div').css({"display":"none"});
                }else{
                  $('#published_date').prop('required',true);
                  $('#published_date_div').css({"display":"block"});
                }
              });
            $("#add_book_form").submit(function (e) {
                e.preventDefault();
                window.scrollTo(0, 0);
                console.log("add_book_form");
                // var data = $("#add_book_form").serialize();
                var data = new FormData(this);
                console.log(data);
                $.ajax({
                    url: "save_books.php",
                    type: "POST",
                    data: data,
                  processData: false,
                  contentType: false,
                    success: function (result)
                    {
                      // alert(result);
                      if (result==1) {
                        // document.getElementById('suc_content').innerHTML = result;
                        $('#suc_msg').slideDown(2000);
                        setTimeout(function () {
                            $("#suc_msg").slideUp(2000);
                            window.location.href = "http://localhost/Erms/viewbooks.php";
                        }, 2000);
                      }else{
                        document.getElementById('error_content').innerHTML = result;
                        $('#error_msg').slideDown(2000);
                        setTimeout(function () {
                            $("#error_msg").slideUp(2000);
                        }, 2000);
                      }
                    },
                });
            })
          });
          </script>
    </body>
</html>
