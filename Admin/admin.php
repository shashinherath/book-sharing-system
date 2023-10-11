<?php
    session_start();

    include ('database.php');

    if (isset($_POST['signin'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password)) {
            $querylogin = "SELECT * FROM admin WHERE email = '$email' LIMIT 1";
            $resultlogin = mysqli_query($con, $querylogin);

            if ($resultlogin) {
                if ($resultlogin && mysqli_num_rows($resultlogin) > 0) {
                    $admin_data = mysqli_fetch_assoc($resultlogin);
                    if ($admin_data['password'] == $password) {
                        $_SESSION['adlogin'] = true;
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $admin_data['name'];
                        header("location:admin.php");
                    }
                }

            }
            echo "<script type='text/javascript'> alert('Wrong user name or password')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Wrong user name or password')</script>";
        }

    }

    $menu = isset($_GET['menu']) ? $_GET['menu'] : null;

    if (isset($_GET['logout'])) {
        session_destroy();
        header("location:admin.php");
    }

?>

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Dashboard | Book Bridge</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- jquery.vectormap css -->
        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">

    <?php

    switch (isset($_SESSION['adlogin']) ? $_SESSION['adlogin'] : null) {

        default:
            echo '<div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="#" class="auth-logo">
                                    <img src="assets\images\logo\logo.png" height="50" class="logo-light mx-auto" alt="Book Bridge">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Admin</b></h4>
    
                        <div class="p-3">
                            <form class="form-horizontal mt-3" method="post">
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" name="email" type="text" required="" placeholder="Email">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" name="signin" type="submit">Log In</button>
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row mt-2">
                                    <div class="col-sm-7 mt-3">
                                        <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                    <div class="col-sm-5 mt-3">
                                        <a href="#" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>';
            break;

        case true:
            echo '
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header" style="background-color: #0f9cf3 !important;">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="admin.php" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo/logo.png" alt="logo-sm" height="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo/logo.png" alt="logo-dark" height="50">
                                </span>
                            </a>

                            <a href="admin.php" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo/logo.png" alt="logo-sm-light" height="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo/logo.png" alt="logo-light" height="50">
                                </span>
                            </a>
                        </div>

                  
                  
                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                <span class="d-none d-xl-inline-block ms-1">' . $_SESSION['name'] . '</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                               
                                <a class="dropdown-item text-danger" href="admin.php?logout"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                   
            
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <!-- <div class="">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                        </div> -->
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="admin.php" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>Dashboard
                                </a>
                            </li>
                        
<!--                 
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Books</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="">Add Books</a></li>
                                    <li><a href="">Read Email</a></li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="admin.php?menu=users" class="waves-effect">
                                    <i class="ri-user-line"></i>Users
                                </a>
                            </li>
                        
                            <li>
                                <a href="admin.php?menu=books" class="waves-effect">
                                    <i class="ri-book-line"></i>Books
                                </a>
                            </li>
                        
                            <li>
                                <a href="admin.php?menu=organizations" class="waves-effect">
                                    <i class="ri-building-line"></i>Organizations
                                </a>
                            </li>
                        
                            <li>
                                <a href="admin.php?menu=contact" class="waves-effect">
                                    <i class="ri-contacts-line"></i>Contact
                                </a>
                            </li>
                        
                           

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">';


            switch ($menu) {

                default:
                    $queryucount = "SELECT COUNT(email) as ucount FROM user";
                    $resultucount = mysqli_query($con, $queryucount);
                    $rowucount = mysqli_fetch_assoc($resultucount);

                    $queryadmin = "SELECT COUNT(email) as admin FROM admin";
                    $resultadmin = mysqli_query($con, $queryadmin);
                    $rowadmin = mysqli_fetch_assoc($resultadmin);

                    $querysales = "SELECT SUM(total_price) as sales FROM donations";
                    $resultsales = mysqli_query($con, $querysales);
                    $rowsales = mysqli_fetch_assoc($resultsales);

                    $querydcount = "SELECT COUNT(id) as dcount FROM donations";
                    $resultdcount = mysqli_query($con, $querydcount);
                    $rowdcount = mysqli_fetch_assoc($resultdcount);

                    $querybcount = "SELECT COUNT(isbn) as bcount FROM books";
                    $resultbcount = mysqli_query($con, $querybcount);
                    $rowbcount = mysqli_fetch_assoc($resultbcount);

                    $queryocount = "SELECT COUNT(org_name) as ocount FROM organizations";
                    $resultocount = mysqli_query($con, $queryocount);
                    $rowocount = mysqli_fetch_assoc($resultocount);

                    $querydbcount = "SELECT SUM(total_donations) as dbcount FROM organizations";
                    $resultdbcount = mysqli_query($con, $querydbcount);
                    $rowdbcount = mysqli_fetch_assoc($resultdbcount);

                    echo '
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Dashboard</h4>
                        </div>

                    <div class="row" style="display: flex; justify-content: center; align-items: center;">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                            <h4 class="mb-2">' . $rowucount['ucount'] . '</h4>
                                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-user-3-line font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total Admins</p>
                                            <h4 class="mb-2">'.$rowadmin['admin'].'</h4>
                                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-admin-line font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div>
                    
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total Donations</p>
                                            <h4 class="mb-2">'.$rowdcount['dcount'].'</h4>
                                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-gift-2-line font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div>
                    </div>

                        <div class="row" style="display: flex; justify-content: center; align-items: center;">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Organizations</p>
                                                <h4 class="mb-2">'.$rowocount['ocount'].'</h4>
                                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-building-line font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total Donated Books</p>
                                                <h4 class="mb-2">'.$rowdbcount['dbcount'].'</h4>
                                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-book-3-line font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Available Books</p>
                                                <h4 class="mb-2">'.$rowbcount['bcount'].'</h4>
                                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-book-2-line font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div>
                        </div>
                        
                    <div class="row" style="display: flex; justify-content: center; align-items: center;">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <p class="text-truncate font-size-14 mb-2">Total Sales(Rs)</p>
                                            <h4 class="mb-2">'.$rowsales['sales'].'</h4>
                                            <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                                        </div>
                                        <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="mdi mdi-currency-usd font-size-24"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div>
                    </div>';

                    break;

                case "users":
                    if (isset($_POST['user_add'])) {
                        $uname = $_POST['uname'];
                        $uemail = $_POST['uemail'];
                        $uphone = $_POST['uphone'];
                        $upassword = $_POST['upassword'];
                        $ucpassword = $_POST['ucpassword'];

                        if (!empty($uemail) && !empty($upassword) && $upassword == $ucpassword) {
                            $queryaddu = "INSERT INTO user (name, email, phone, password, cpassword) VALUES ('$uname','$uemail','$uphone','$upassword','$ucpassword')";
                            if (mysqli_query($con, $queryaddu)) {

                            } else {
                                echo "<script type='text/javascript'> alert('Error: " . mysqli_error($con) . "' ) </script>";
                            }
                        } else {
                            echo "<script type='text/javascript'> alert('Please enter some valid information')</script>";
                        }
                    }

                    if (isset($_POST['delete_user'])) {
                        $user_id = $_POST['user_id'];

                        $querydeleteu = "DELETE FROM user WHERE id = $user_id";

                        if (mysqli_query($con, $querydeleteu)) {

                        } else {
                            echo "Error: " . mysqli_error($con);
                        }
                    }

                    echo '
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Users</h4>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>';

                    $queryusers = "SELECT * FROM user";
                    $resultusers = mysqli_query($con, $queryusers);

                    while ($rowusers = mysqli_fetch_assoc($resultusers)) {

                        echo '
                                                <tr>
                                                    <td><h6 class="mb-0">' . $rowusers['id'] . '</h6></td>
                                                    <td>' . $rowusers['name'] . '</td>
                                                    <td>
                                                        ' . $rowusers['email'] . '
                                                    </td>
                                                    <td>
                                                        ' . $rowusers['phone'] . '
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">Update</button>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="user_id" value="' . $rowusers['id'] . '">
                                                            <button type="submit" class="btn btn-danger btn-rounded waves-effect waves-light" name="delete_user">Delete</button>
                                                        </form>
                                                    </td>
                                                    
                                                </tr>';
                    }

                    echo '    
                                                 <!-- end -->
                                                 
                                                 <!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>
                        
                        <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add User</h4>
                                        
                                        <form class="needs-validation" method="post">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label for="validationTooltip01" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="uname" id="validationTooltip01" placeholder="Name" required>
                                                        <div class="valid-tooltip">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3 position-relative">
                                                        <label for="validationTooltip02" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="uemail" id="validationTooltip02" placeholder="Email" required>
                                                        <div class="valid-tooltip">
                                                            Looks good!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                        <label for="validationTooltip04" class="form-label">Phone</label>
                                                        <input type="tel" class="form-control" name="uphone" id="validationTooltip04" placeholder="Phone" required>
                                                        <div class="invalid-tooltip">
                                                            Please provide a valid Phone.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                        <label for="validationTooltip04" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="upassword" id="validationTooltip04" placeholder="Password" required>
                                                        <div class="invalid-tooltip">
                                                            Please provide a valid Password.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3 position-relative">
                                                        <label for="validationTooltip03" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" name="ucpassword" id="validationTooltip03" placeholder="Password" required>
                                                        <div class="invalid-tooltip">
                                                            Please confirm the Password.
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div>
        
                                                <button class="btn btn-primary" name="user_add" type="submit">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>';
                    break;

                case "books":
                    $querybook = "SELECT * FROM books";
                    $resultbook = mysqli_query($con, $querybook);
                    echo '
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Books</h4>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Author</th>
                                                    <th>Category</th>
                                                    <th>ISBN</th>
                                                    <th>Image</th>
                                                    <th style="width: 120px;">Price</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>';

                    while ($rowbook = mysqli_fetch_assoc($resultbook)) {

                        echo '
                                                <tr>
                                                    <td><h6 class="mb-0">' . $rowbook['book_name'] . '</h6></td>
                                                    <td>' . $rowbook['author'] . '</td>
                                                    <td>
                                                        ' . $rowbook['category'] . '
                                                    </td>
                                                    <td>
                                                        ' . $rowbook['isbn'] . '
                                                    </td>
                                                    <td>
                                                        <img src="' . $rowbook['image'] . '" height="50px" width="25px">
                                                    </td>
                                                    <td>' . $rowbook['price'] . '</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">Update</button>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="user_id" value="">
                                                            <button type="submit" class="btn btn-danger btn-rounded waves-effect waves-light" name="">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>';
                    }

                    echo '    
                                                 <!-- end -->
                                                 
                                                 <!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>';
                    break;

                case "organizations":
                    $queryorg = "SELECT * FROM organizations";
                    $resultorg = mysqli_query($con, $queryorg);
                    echo '
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Organizations</h4>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Total Donations</th>
                                                    <th>Image</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>';

                    while ($roworg = mysqli_fetch_assoc($resultorg)) {

                        echo '
                                                <tr>
                                                    <td><h6 class="mb-0">' . $roworg['org_id'] . '</h6></td>
                                                    <td>' . $roworg['org_name'] . '</td>
                                                    <td>
                                                        ' . $roworg['total_donations'] . '
                                                    </td>
                                                    <td>
                                                        <img src="' . $roworg['image'] . '" height="50px" width="75px">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">Update</button>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="user_id" value="">
                                                            <button type="submit" class="btn btn-danger btn-rounded waves-effect waves-light" name="">Delete</button>
                                                        </form>
                                                    </td>
                                                    
                                                </tr>';
                    }

                    echo '    
                                                 <!-- end -->
                                                 
                                                 <!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>';
                    break;

                case "contact":
                    $querycontact = "SELECT * FROM contact";
                    $resultcontact = mysqli_query($con, $querycontact);
                    echo '
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Contact</h4>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Message</th>
                                                    <th></th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>';



                    while ($rowcontact = mysqli_fetch_assoc($resultcontact)) {

                            echo '
                                                <tr>
                                                    <td><h6 class="mb-0">' . $rowcontact['name'] . '</h6></td>
                                                    <td>' . $rowcontact['email'] . '</td>
                                                    <td>
                                                        ' . $rowcontact['message'] . '
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                            <input type="hidden" name="user_id" value="">
                                                            <button type="submit" class="btn btn-danger btn-rounded waves-effect waves-light" name="">Delete</button>
                                                        </form>
                                                    </td>
                                                    
                                                </tr>';
                    }

                    echo '    
                                                 <!-- end -->
                                                 
                                                 <!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>';
                    break;
            }
            echo '
                    </div>
                    
                </div>
                <!-- End Page-content -->
               
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Book Bridge.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    <!-- Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign -->
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        ';
            break;
    }
    ?>



        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        
        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- jquery.vectormap map -->
        <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

</html>