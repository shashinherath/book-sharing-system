<?php

    $con = mysqli_connect("localhost", "root", "", "book_bridge") or die(mysqli_error($con));

    $querybook = "SELECT * FROM books";
    $resultbook = mysqli_query($con, $querybook);


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
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="logo-light" height="20">
                                </span>
                            </a>
                        </div>

                  
                  
                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               
                                <span class="d-none d-xl-inline-block ms-1">Julia</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                               
                                <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
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
                                <a href="" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>Dashboard</span>
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
                                <a href="" class="waves-effect">
                                    <i class="ri-user-line"></i>user</span>
                                </a>
                            </li>
                        
                            <li>
                                <a href="" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>books</span>
                                </a>
                            </li>
                        
                            <li>
                                <a href="" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>Dashboard</span>
                                </a>
                            </li>
                        
                            <li>
                                <a href="" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>Dashboard</span>
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
                    <div class="container-fluid">
                        
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Books</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Status</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th style="width: 120px;">Salary</th>
                                                </tr>
                                            </thead><!-- end thead -->
                                            <tbody>
                                                <?php
                                                    while ($rowbook = mysqli_fetch_assoc($resultbook)) {

                                                        echo '
                                                <tr>
                                                    <td><h6 class="mb-0">'.$rowbook['book_name'].'</h6></td>
                                                    <td>'.$rowbook['author'].'</td>
                                                    <td>
                                                        '.$rowbook['category'].'
                                                    </td>
                                                    <td>
                                                        '.$rowbook['isbn'].'
                                                    </td>
                                                    <td>
                                                        <img src="'.$rowbook['image'].'" height="50px" width="25px">
                                                    </td>
                                                    <td>'.$rowbook['price'].'</td>
                                                </tr>';
                                                    }
                                                ?>
                                                 <!-- end -->
                                                 <tr>
                                                    <td><h6 class="mb-0">Alex Adams</h6></td>
                                                    <td>Python Developer</td>
                                                    <td>
                                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                    </td>
                                                    <td>
                                                        28
                                                    </td>
                                                    <td>
                                                        01 Aug, 2021
                                                    </td>
                                                    <td>$25,060</td>
                                                </tr>
                                                 <!-- end -->
                                                 <tr>
                                                    <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>
                                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                    </td>
                                                    <td>
                                                        35
                                                    </td>
                                                    <td>
                                                        15 Jun, 2021
                                                    </td>
                                                    <td>$59,350</td>
                                                </tr>
                                                 <!-- end -->
                                                 <tr>
                                                    <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                                    <td>React Developer</td>
                                                    <td>
                                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                    </td>
                                                    <td>
                                                        25
                                                    </td>
                                                    <td>
                                                        01 March, 2021
                                                    </td>
                                                    <td>$23,700</td>
                                                </tr>
                                                 <!-- end -->
                                                 <tr>
                                                    <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                                    <td>Senior Web Designer</td>
                                                    <td>
                                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                    </td>
                                                    <td>
                                                        38
                                                    </td>
                                                    <td>
                                                        01 Jan, 2021
                                                    </td>
                                                    <td>$69,185</td>
                                                </tr>
                                                 <!-- end -->
                                                 <tr>
                                                    <td><h6 class="mb-0">Den Simpson</h6></td>
                                                    <td>Web Designer</td>
                                                    <td>
                                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                    </td>
                                                    <td>
                                                        21
                                                    </td>
                                                    <td>
                                                        01 Sep, 2021
                                                    </td>
                                                    <td>$37,845</td>
                                                </tr>
                                                 <!-- end -->
                                                 <tr>
                                                    <td><h6 class="mb-0">Mahek Torres</h6></td>
                                                    <td>Senior Laravel Developer</td>
                                                    <td>
                                                        <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                    </td>
                                                    <td>
                                                        32
                                                    </td>
                                                    <td>
                                                        20 May, 2021
                                                    </td>
                                                    <td>$55,100</td>
                                                </tr>
                                                 <!-- end -->
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
                        </div>
                        
                    </div>
                    
                </div>
                <!-- End Page-content -->
               
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Upcube.
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