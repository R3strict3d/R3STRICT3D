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
          <!-- <link rel="stylesheet" href="admin/dist/css/adminlte.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.jqueryui.min.css">  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.jqueryui.min.css">  
        <title>Wishlist</title>
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
                      <a style="margin-left: 25px;" href="logout.php">Logout</a><br>
                  </div>
                </div>
              </li>
              <!-- <li class="showclass"><a href="browse.php">Browse</a></li> -->
              <li class="showclass"><a href="addbook.php">Add BOOK</a></li>
              <li class="showclass"><a href="viewbooks.php">View BOOK</a></li>
              <li class="showclass"><a href="viewwhish.php">Wishlist</a></li>
              <li class="showclass"><a href="logout.php">Logout</a></li>
          </ul>
      </nav>
      <div class="container-fullwidth" style="background-color: black;color: white;">
        <p style="font-size: 25px;">Welcome <?php echo $_SESSION['username']?></p>
      </div>
      <!-- <nav>
          <input type="checkbox" id="check">
          <label for="check" class="checkbtn">
              <i class="fas fa-bars"></i>
          </label>
          <div class="logo">
              <img src="images/logo1.png" alt="ERMS">
              <h1>Educational Resource<br>Management System</h1>
          </div>
          <ul>
              <li><a class="active" href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="browse.php">Browse</a></li>
              <li><a href="addbook.php">Browse</a></li>
              <li><a href="faq.php">FAQ</a></li>
              <li><a href="logout.php">Logout</a></li>
          </ul>
      </nav> -->
        <div class="container" >
            <div class="row" >
              <div class="col-sm-12" >
                <div class="content-wrapper">
                <?php 
                  $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
                  $q = "SELECT whishlist.id,book_details.bookname,book_details.category,book_details.author,book_details.price,book_details.added_by  FROM whishlist  INNER JOIN book_details ON whishlist.bookid=book_details.id where whishedby='".$_SESSION['user']."';";
                  // print_r($q);
                  // $q="select * from whishlist where whishedby='".$_SESSION['user']."'";
                  $result = $conn->query($q);//mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
                ?>
              <!-- Main content -->
              <div class="content" >
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12" >
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Whishlist</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example" class="display" style="width:100%">
                              <thead>
                                  <tr>
                                      <th>Boook Name</th>
                                      <th>category</th>
                                      <th>Author</th>
                                      <th>Price</th>
                                      <th>Posted By</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                if ($result->num_rows > 0) {
                                  foreach ($result as $value) {
                                    // print_r($value);
                                  ?>
                                <tr>
                                    <td><?php print_r($value['bookname']) ;?></td>
                                    <td><?php print_r($value['category']) ;?></td>
                                    <td><?php print_r($value['author']) ;?></td>
                                    <td><?php print_r($value['price']==0?"Free":$value['price']) ;?></td>
                                    <td><?php print_r($value['added_by']) ;?></td>
                                    <td><button class="btn btn-danger" onclick="deletebook('<?php print_r($value['id']) ;?>')" data-toggle="modal" data-target="#myModal">Delete</button></td>
                                </tr>
                                <?php 
                                }
                              }
                                ?>
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
              <!-- /.content -->
            </div>
                </div>
            </div>
        </div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="height: 50px;">
          <p> DELETE BOOKS FROM WISHLIST</p>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
          <form name="deletebook_form" id="deletebook_form">
            <input type="text" id="book_id" name="book_id" hidden="">
            <div style="display: inline-flex;">
            <input type="submit" name="submit" class="btn btn-primary "  value="Yes">
            <button type="button" class="btn btn-default " style="float: right;" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.jqueryui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
      responsive: true,
      "scrollX": true,
        order: [[2, 'asc']],
        // rowGroup: {
        //     dataSrc: 2
        // }
    } );
    $("#deletebook_form").submit(function (e) {
      e.preventDefault();
      window.scrollTo(0, 0);
      console.log("add_book_form");
      var data = $("#deletebook_form").serialize();
      // var data = new FormData(this);
      console.log(data);
      $.ajax({
          url: "deletewhish.php",
          type: "POST",
          data: data,
          success: function (result)
          {
            // alert(result);
            if (result==1) {
              // window.location.href = "http://localhost/Andrae/admin/pages/forms/viewbooks.php";
              location.reload();
            }else{
            }
          },
      });
    })
  });
  function deletebook(id) {
    $('#book_id').val(id);
  }
</script>
    </body>
</html>
