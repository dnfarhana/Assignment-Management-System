<!DOCTYPE html>
<?php
    include('connectDB.php');
    include('session-lecturer.php');
    $id = $_GET['noteid'];
    $showsql = "SELECT * FROM notes WHERE note_id = '$id'";
    $resultstud = mysqli_query($conn,$showsql);
    $row = mysqli_fetch_array($resultstud,MYSQLI_ASSOC);
    if($_SERVER["REQUEST_METHOD"] == "POST") {

      $comment = $_POST['notecomment'];
      $date = date('Y-m-d');
      $id = $_POST['noteid'];
      $namee = $_POST['fname'];
      $lectid = $_POST['lect_id'];
      
      //upload file
       // name of the uploaded file
        $filename = $_FILES['myfile']['name'];

        // destination of the file on the server
        $destination = 'uploads/' . $filename;
        $directory = 'uploads/';

        // get the file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];

        if (!in_array($extension, ['zip', 'pdf', 'docx','pptx','jpeg','jpg','png'])) {
            echo "You file extension must be .zip, .pdf, .docx, .pptx, .jpeg, or .png";
        } elseif ($_FILES['myfile']['size'] > 5000000) { // file shouldn't be larger than 1Megabyte
            echo "File too large!";
        } else {
            unlink($directory,$namee); //remove previous file
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) {
                $sql = "UPDATE notes SET note_name = '$filename', note_size = '$size', note_comment = '$comment', note_create = '$date', lect_id = '$lectid' WHERE note_id = '$id'";
                if (mysqli_query($conn, $sql)) {
                    echo "File uploaded successfully";
                    echo '<script>';
                    echo 'alert("Successfully updated!");';
                    echo 'location="lecturer-notes.php";';
                    echo '</script>';
                }else{
                    die(mysqli_error($conn));
                }
            } else {
                echo "Failed to upload file.";
            }
        }
  }  
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>AMS Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/ams.png">
    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elegant admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo.png" alt="homepage" class="light-logo" />
                        </b>
                    </a>
                </div>
                <div class="ml-4">
                    <span class="text-success">Assignment Management System (AMS)</span>
                </div>
                <div class="ml-auto px-3">
                    <a href="logout.php"><span class="text-danger">Logout </span><i class="fa fa-sign-out text-danger"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex block nav-text-box align-items-center">
                <span><img src="../assets/images/logo.png" alt="ams template"></span>
                <span class="ml-4 text-light">AMS</span>
                
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i
                        class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                            <a class="waves-effect waves-dark" href="lecturer-profile.php" aria-expanded="false">
                                <i class="fa fa-user-circle"></i><span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="lecturer-classroom.php" aria-expanded="false">
                                <i class="fa fa-group"></i><span class="hide-menu">Class</span>
                            </a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="lecturer-notes.php" aria-expanded="false">
                                <i class="fa fa-book"></i><span class="hide-menu">Notes</span>
                            </a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="lecturer-assignment.php" aria-expanded="false">
                                <i class="fa fa-book"></i><span class="hide-menu">Assignment</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Notes</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="lecturer-notes.php">Notes</a></li>
                                <li class="breadcrumb-item active">Update Notes</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update Notes</h4><hr>
                                <form action="updatenotes.php" method="post" enctype="multipart/form-data" >
<<<<<<< Updated upstream
                                <form action="lecturer-update-notes.php" method="post" enctype="multipart/form-data" >
=======
<<<<<<< HEAD
                                <div class="form-group">
                                      <label>Name</label>
                                      <input type="text" class="form-control" id="note-name" name="note-name" value="<?php echo $row['note_name']; ?>" readonly>
                                    </div>
=======
                                <form action="lecturer-update-notes.php" method="post" enctype="multipart/form-data" >
>>>>>>> 2ee9511f9f9882f310d2da9c4867ca74af4fab54
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control" rows="3" id="note-comment" name="note-comment" ><?php echo $row['note_comment']; ?></textarea>
                                    </div>
>>>>>>> Stashed changes
                                    <div class="form-group">
                                        <label>Class</label>
                                        <input type="text" class="form-control" id="code" name="code" value="<?php echo $row['class_code']; ?>" readonly>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary" name="save">Update Notes</b> 
                                    </div>
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
                                    <input type="file" name="myfile"><br>
                                    <input type="hidden" name="noteid" value="<?php echo $row['note_id'];?>">
=======
>>>>>>> Stashed changes
                                        <input type="file" name="myfile"><br>
                                        <input type="hidden" name="noteid" value="<?php echo $row['note_id'];?>">
                                        <input type="hidden" name="fname" value="<?php echo $row['note_name'];?>">
                                        <input type="hidden" name="lectid" value="<?php echo $row['lect_id'];?>">
<<<<<<< Updated upstream
=======
>>>>>>> 2ee9511f9f9882f310d2da9c4867ca74af4fab54
>>>>>>> Stashed changes
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2022 AMS by NerdTech</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
</body>
</html>