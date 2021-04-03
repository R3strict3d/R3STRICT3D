<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Books</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <?php 
  $conn=mysqli_connect("localhost","root","","andrae")or die("Can't Connect...");
    $q="select * from site_details where id=1";
  $result = mysqli_query($conn,$q) or die("wrong query"); //$conn->query($sql);
  // print_r($result);
  if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    // $row = reset($row);
    // print_r($row);
  }
?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- <li class="nav-item"> -->
        <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button"> -->
          <!-- <i class="fas fa-search"></i> -->
        <!-- </a> -->
<!--         <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div> -->
      <!-- </li> -->

      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->

<!--       <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
<!--       <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
<!--       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
<!--       <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="../../dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                  <a href="addcategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="viewgener.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Books
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="addbooks.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viewbooks.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Books</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Site Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="contents.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Contents</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="settings.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Log out
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
          </li>
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
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
              <form name="add_category_form" id="add_category_form" action="" method="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="genre"  name="genre" placeholder="Enter Category Name" required="">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../plugin/tinymce/tinymce.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script type="text/javascript">
   // $(document).ready(function () {
    tinymce.init({
    mode : "specific_textareas",
    editor_selector :'test_new_editor',
    cleanup : true,
    menubar:false,
    statusbar: false,
    draggable_modal: false,
    relative_urls: false,
    remove_script_host : false,
    plugins: 'code preview lists',
    // toolbar: 'code',
    // menubar: 'tools'
    // plugins: "autolink link code",
    default_link_target: "_blank",
    extended_valid_elements: 'a[href|target=_blank]',
    entity_encoding: "numeric",
    skin: 'oxide',
    content_css: 'ncriablue',
    // plugins: 'preview',
    font_formats:
    "Arial=arial,helvetica,sans-serif;"+
    "Arial Black=arial black,avant garde;"+
    "Book Antiqua=book antiqua,palatino;"+
    "Comic Sans MS=comic sans ms,sans-serif;"+
    "Courier New=courier new,courier;"+
    "Georgia=georgia,palatino;"+
    "Helvetica=helvetica;"+
    "Impact=impact,chicago;"+
    "Symbol=symbol;"+
    "Tahoma=tahoma,arial,helvetica,sans-serif;",
    fontsize_formats: '11px 12px 14px 16px 32px',
    toolbar: 'code undo redo | formatselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect | bold | italic | underline strikethrough | link code preview numlist bullist'
    });
    // tinymce.activeEditor.execCommand('mceCodeEditor');
   // });
</script>
    <script type="text/javascript">
      $(document).ready(function (e) {
        // $('#reservationdate').datetimepicker({
        //     format: 'L'
        // });
        $('#isfree').on('change', function() {
          alert( this.value );
          if (this.value==1) {
            $('#price').prop('required',false);
            $('#price_div').css({"display":"none"});
          }else{
            $('#price').prop('required',true);
            $('#price_div').css({"display":"block"});
          }
        });
        $('#ispublished').on('change', function() {
          alert( this.value );
          if (this.value==1) {
            $('#published_date').prop('required',false);
            $('#published_date_div').css({"display":"none"});
          }else{
            $('#published_date').prop('required',true);
            $('#published_date_div').css({"display":"block"});
          }
        });
      $("#add_category_form").submit(function (e) {
          e.preventDefault();
          window.scrollTo(0, 0);
          console.log("add_book_form");
          var data = $("#add_category_form").serialize();
          // var data = new FormData(this);
          console.log(data);
          $.ajax({
              url: "save_category.php",
              type: "POST",
              data: data,
            // processData: false,
            // contentType: false,
              success: function (result)
              {
                if (result==1) {
                  $('#suc_msg').slideDown(2000);
                  setTimeout(function () {
                      $("#suc_msg").slideUp(2000);
                      window.location.href = "http://localhost/Erms/admin/pages/forms/viewgener.php";
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
