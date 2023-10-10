<?php

session_start();

include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password) && !is_numeric($email)) {
        $query = "select * from user where email = '$email' limit 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] == $password) {
                    header("location:index.php");
                    $_SESSION['login'] = true;
                    $_SESSION['email'] = $email;
                    die;
                }
            }

        }
        echo "<script type='text/javascript'> alert('Wrong user name or password')</script>";
    } else {
        echo "<script type='text/javascript'> alert('Wrong user name or password')</script>";
    }

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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>

  <?php
  if (isset($_SESSION['registered']) ? $_SESSION['registered'] == true : false) {
      ?>

      <script>
          swal("Registration Successfully!", "Please log in to your account.", "success", {
              buttons: false,
              timer: 3000,
          });
      </script>

      <?php
      $_SESSION['registered'] = false;
  }
  ?>

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
                        <li>
                          <a href="register.php" class="btn header-btn"
                            >Register</a
                          >
                          <a href="login.html" class="btn header-btn">Login</a>
                        </li>
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
                              <a href="organizations.php"
                                >Recipient Organizations</a
                              >
                            </li>
                            <li><a href="Stories.php">Success Stories</a></li>
                            <li>
                              <a href="resources.php">Educational Resources</a>
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
                    <div class="slicknav_menu"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Login -->

    <main class="login-bg">
      <div class="login-form-area">
        <div class="login-form">
          <div class="login-heading">
            <span>Login</span>
            <p>Enter Login details to get access</p>
          </div>
            <form method="post">
          <div class="input-box">
            <div class="single-input-fields">
              <label>Email Address</label>
              <input type="text" name="email" placeholder="Email address" required/>
            </div>
            <div class="single-input-fields">
              <label>Password</label>
              <input type="password" name="password" placeholder="Enter Password" required/>
            </div>
            <div class="single-input-fields login-check">
              <input type="checkbox" id="fruit1" name="keep-log" />
              <label for="fruit1">Keep me logged in</label>
              <a href="#" class="f-right">Forgot Password?</a>
            </div>
          </div>

          <div class="login-footer">
            <p>
              Don’t have an account? <a href="register.php">Sign Up</a> here
            </p>
            <button class="submit-btn3">Login</button>
          </div>
            </form>
        </div>
      </div>
    </main>

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
