<?php
session_start();

$_SESSION['cartcnt'] = (isset($_SESSION['cartcnt'])) ? $_SESSION['cartcnt'] : 0;

include('database.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM user where email = '$email' ";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error: " . mysqli_error($con));
    }
}

    if (isset($_GET['logout'])) {
        session_destroy();
        header("location:index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>BookBridge</title>

    <link rel="stylesheet" href="CSS/style.css" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/slicknav.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/price_rangs.css" />
    <link rel="stylesheet" href="assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/slick.css" />
    <link rel="stylesheet" href="assets/css/nice-select.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- Navigation bar -->

    <header>
      <div class="header-area">
        <div class="main-header">
          <div class="header-top">
            <div class="container">
              <div class="row">
                <div class="col-xl-12">
                  <div
                    class="d-flex justify-content-between align-items-center flex-sm"
                  >
                    <div class="header-info-left d-flex align-items-center">
                      <div class="logo">
                        <a href="index.php"
                          ><img src="Images/logo.png" alt="BookBridge"
                        /></a>
                      </div>

                      <form action="#" class="form-box">
                        <input
                          type="text"
                          name="Search"
                          placeholder="Search book by author or publisher"
                        />
                        <div class="search-icon">
                          <i class="bi bi-search"></i>
                        </div>
                      </form>
                    </div>
                    <div class="header-info-right d-flex align-items-center">
                        <ul>
                            <?php
                            if (isset($result)) {
                                $row = mysqli_fetch_assoc($result);
                            }

                            if (isset($_SESSION['login'])) {
                                echo '<li class="headericonlist">
                          <a href="cart.php" class="headericon"
                            ><i class="bi bi-cart"></i><br />
                            <span class="cardcount">'.$_SESSION['cartcnt'].'</span></a
                          >
                          <a href="profile.php" class="headericon"
                            ><i class="bi bi-person-circle"></i><br />
                            <span>'. $row['name'] .'</span>
                          </a>
                          <a href="index.php?logout" class="headericon">
                            <i class="bi bi-box-arrow-right"></i><br>
                            <span>Log Out</span>
                          </a>';
                            }
                            else {
                                echo '<li>
                          <a href="register.php" class="btn header-btn"
                            >Register</a
                          >
                          <a href="login.php" class="btn header-btn">Login</a>
                        </li>';
                            }
                            ?>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-bottom header-sticky">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-xl-12">
                  <div class="logo2">
                    <a href="index.php"
                      ><img src="Images/logo.png" alt="BookBridge"
                    /></a>
                  </div>

                  <div class="main-menu text-center d-none d-lg-block">
                    <nav>
                      <ul id="navigation">
                        <li><a href="index.php">Home</a></li>
                        <li>
                          <a href="#">Categories</a>
                          <ul class="submenu">
                            <li>
                              <a href="guidline.php">Donation Guidelines</a>
                            </li>
                            <li>
                              <a href="organizations.php">Recipient Organizations</a>
                            </li>
                            <li><a href="Stories.php">Success Stories</a></li>
                            <li>
                              <a href="resources.php"
                                >Educational Resources</a
                              >
                            </li>
                            <li>
                              <a href="forums.php">Community Forums</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="books.php">Books</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                      </ul>
                    </nav>
                  </div>
                </div>

                <div class="col-xl-12">
                  <div class="mobile_menu d-block d-lg-none">
                    <div class="slicknav_menu">
                      <a
                        href="#"
                        aria-haspopup="true"
                        role="button"
                        tabindex="0"
                        class="slicknav_btn slicknav_collapsed"
                        style="outline: none"
                        ><span class="slicknav_menutxt">MENU</span
                        ><span class="slicknav_icon"
                          ><span class="slicknav_icon-bar"></span
                          ><span class="slicknav_icon-bar"></span
                          ><span class="slicknav_icon-bar"></span></span
                      ></a>
                      <ul
                        class="slicknav_nav slicknav_hidden"
                        aria-hidden="true"
                        role="menu"
                        style="display: none"
                      >
                        <li>
                          <a href="index.php" role="menuitem" tabindex="-1"
                            >Home</a
                          >
                        </li>
                        <li>
                          <a
                            href="categories.html"
                            role="menuitem"
                            tabindex="-1"
                            >Categories</a
                          >
                        </li>
                        <li>
                          <a href="about.php" role="menuitem" tabindex="-1"
                            >About</a
                          >
                        </li>
                        <li class="slicknav_collapsed slicknav_parent">
                          <a
                            href="#"
                            role="menuitem"
                            aria-haspopup="true"
                            tabindex="-1"
                            class="slicknav_item slicknav_row"
                            style="outline: none"
                            ><a href="#" tabindex="-1">Pages</a>
                            <span class="slicknav_arrow">+</span></a
                          >
                          <ul
                            class="submenu slicknav_hidden"
                            role="menu"
                            aria-hidden="true"
                            style="display: none"
                          >
                            <li>
                              <a href="login.php" role="menuitem" tabindex="-1"
                                >login</a
                              >
                            </li>
                            <li>
                              <a href="cart.php" role="menuitem" tabindex="-1"
                                >Cart</a
                              >
                            </li>
                            <li>
                              <a
                                href="checkout.php"
                                role="menuitem"
                                tabindex="-1"
                                >Checkout</a
                              >
                            </li>
                            <li>
                              <a
                                href="book-details.html"
                                role="menuitem"
                                tabindex="-1"
                                >book Details</a
                              >
                            </li>
                            <li>
                              <a
                                href="blog_details.html"
                                role="menuitem"
                                tabindex="-1"
                                >Blog Details</a
                              >
                            </li>
                            <li>
                              <a
                                href="elements.html"
                                role="menuitem"
                                tabindex="-1"
                                >Element</a
                              >
                            </li>
                          </ul>
                        </li>
                        <li>
                          <a href="blog.html" role="menuitem" tabindex="-1"
                            >Blog</a
                          >
                        </li>
                        <li>
                          <a href="contact.php" role="menuitem" tabindex="-1"
                            >Contect</a
                          >
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- about -->

    <main>
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="slider-area">
              <div
                class="slider-height2 slider-bg8 d-flex align-items-center justify-content-center"
              >
                <div class="hero-caption hero-caption2">
                  <h2>Recipient Organizations</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </main>



  <!-- Recipiant Organizations -->

  <div class="orgcard">
    
    
    <div class="container">
      <div class="row justify-content-center">

      <?php
        $queryorg = "SELECT * FROM organizations";
        $resultorg = mysqli_query($con, $queryorg);

        while ($roworg = mysqli_fetch_assoc($resultorg)) {

            echo '  
        <div class="card" style="width: 18rem">
          <img
            class="card-img-top"
            src="'.$roworg['image'].'"
            alt="Card image cap"
          />
          <div class="card-body">
            <h5 class="card-title">'.$roworg['org_name'].'</h5>
            <p class="card-text">
              '.$roworg['description'].'
            </p>
            <a href="organization_details.php?id='.$roworg['org_id'].'" class="btn btn-primary">View</a>
          </div>
        </div>';
        }
        ?>

      </div>
    </div>
  </div>


    <!-- Footer -->

    <footer>
      <div class="footer-wrappper section-bg">
        <div class="footer-area footer-padding">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-xl-3 col-lg-5 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="single-footer-caption mb-30">
                    <div class="footer-logo mb-25">
                      <a href="index.php"
                        ><img src="Images/logo.png" alt="BookBridge"
                      /></a>
                    </div>
                    <div class="footer-tittle">
                      <div class="footer-pera">
                        <p>
                          Sowing Seeds of Literacy, Cultivating Bright Futures!
                        </p>
                      </div>
                    </div>

                    <div class="footer-social">
                      <a href="#"><i class="bi bi-facebook"></i></a>
                      <a href="#"><i class="bi bi-instagram"></i></a>
                      <a href="#"><i class="bi bi-linkedin"></i></a>
                      <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Book Category</h4>
                    <ul>
                      <li><a href="#">History</a></li>
                      <li><a href="#">Horror - Thriller</a></li>
                      <li><a href="#">Love Stories</a></li>
                      <li><a href="#">Science Fiction</a></li>
                      <li><a href="#">Business</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>&nbsp;</h4>
                    <ul>
                      <li><a href="#">Biography</a></li>
                      <li><a href="#">Astrology</a></li>
                      <li><a href="#">Digital Marketing</a></li>
                      <li><a href="#">Software Development</a></li>
                      <li><a href="#">Ecommerce</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="single-footer-caption mb-50">
                  <div class="footer-tittle">
                    <h4>Site Map</h4>
                    <ul class="mb-20">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Contact Us</a></li>
                      <li><a href="#">Register</a></li>
                      <li><a href="#">Login</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="footer-bottom-area">
          <div class="container">
            <div class="footer-border">
              <div class="row d-flex align-items-center">
                <div class="col-xl-12">
                  <div class="footer-copy-right text-center">
                    Copyright &copy; BookBridge
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    All rights reserved.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/price_rangs.js"></script>

    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/mail-script.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
