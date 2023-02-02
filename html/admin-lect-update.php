<!DOCTYPE html>
<?php
    include('connectDB.php');
    include('session.php');
    if(!isset($_SESSION['login_user'])){
    header('location:login.php');
     } 
    $lectId = $_GET['id'];

    $sqllect = "SELECT * FROM lecturers where lect_id='$lectId'";
    
    $resultLect = mysqli_query($conn,$sqllect);
    $row = mysqli_fetch_array($resultLect,MYSQLI_ASSOC);
     
    $lectid = $row['lect_id'];
    $lectname = $row['lect_name'];
    $lectemail = $row['lect_email'];
    $lectphone = $row['lect_phone'];
    $lectpass = $row['password'];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $lid = $_POST['id'];
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Phone = $_POST['phone'];
        $Pass = $_POST['pass'];

        $sqlupdate = "UPDATE lecturers set lect_name='$Name', lect_phone='$Phone', password='$Pass', lect_email='$Email' where lect_id = '$lid'";

        $resultupdate = mysqli_query($conn,$sqlupdate);

        if(isset($resultupdate)){
            echo "User success updated";
            echo '<script>';
            echo 'alert("Successfully update!");';
            //echo 'location="admin-lecturer.php";';
            echo '</script>';
            header("location: admin-lecturer.php");
        }
        else{
            echo "User failed updated";
            echo '<script>';
            echo 'alert("Fail to update!");';
            echo 'location="admin-lect-update.php";';
            echo '</script>';
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
                            <a class="waves-effect waves-dark" href="admin-profile.php" aria-expanded="false">
                                <i class="fa fa-user-circle"></i><span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="admin-student.php" aria-expanded="false">
                                <i class="fa fa-child"></i><span class="hide-menu">Student</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="admin-lecturer.php" aria-expanded="false">
                                <i class="fa fa-user"></i><span class="hide-menu">Lecturer</span>
                            </a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="admin-class.php" aria-expanded="false">
                                <i class="fa fa-group"></i><span class="hide-menu">Class</span>
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
                        <h4 class="text-themecolor">Lecturer</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="admin-home.php">Home</a></li>
                                <li class="breadcrumb-item">Lecturer</li>
                                <li class="breadcrumb-item active">Edit Lecturer</li>
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
                                <!--Starting-->
                                <form method="POST" action="admin-lect-update.php">
                                <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <label>ID: </label>
                                                <input type="text" class="form-control" name="id" id="id" value="<?php echo $lectId; ?>" readonly>
                                                <label>Name: </label>
                                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $lectname; ?>">
                                                <label>Email: </label>
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $lectemail; ?>">
                                                <label>Phone: </label>
                                                <input type="text" class="form-control" name="phone" id="phone"value="<?php echo $lectphone; ?>">
                                                <label>Password: </label>
                                                <input type="text" class="form-control" name="pass" id="pass" value="<?php echo $lectpass; ?>">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
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