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

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $queryorg = "SELECT * FROM organizations WHERE org_id = '$id'";
        $resultorg = mysqli_query($con, $queryorg);

        if (!$resultorg) {
            die("Error: " . mysqli_error($con));
        }
    }

    $roworg = mysqli_fetch_assoc($resultorg);

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

    <!-- Site Icon -->
    <link rel="Icon" href="Images/icon.png" />

  <link rel="stylesheet" href="CSS/style.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

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
                <div class="d-flex justify-content-between align-items-center flex-sm">
                  <div class="header-info-left d-flex align-items-center">
                    <div class="logo">
                      <a href="index.php"><img src="Images/logo.png" alt="BookBridge" /></a>
                    </div>

                    <form action="#" class="form-box">
                      <input type="text" name="Search" placeholder="Search book by author or publisher" />
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
                  <a href="index.php"><img src="Images/logo.png" alt="BookBridge" /></a>
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

  <!-- about -->

  <main>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="slider-area">
            <div class="slider-height2 slider-bg12 d-flex align-items-center justify-content-center" style="background-image: url(<?php echo $roworg['image']?>)!important; background-size: contain; background-repeat: no-repeat; width: 100%; height: 250px;">
              
            </div>
          </div>
        </div>
      </div>
    </div>


    </div>
  </main>

  <!-- Educational Resources -->

  <div class="counter-card1">
    <div class="section-tittle text-center mb-55">
      <h2>The journey so far</h2>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="card justify-content-center">
          <i class="bi bi-gift-fill"></i>
          <span><span class="counter">33</span></span>
          <p>Donations done</p>
        </div>
        <div class="card justify-content-center">
          <i class="bi bi-book-half"></i>
          <span><span class="counter">600</span></span>
          <p>Books donated</p>
        </div>
        <div class="card justify-content-center">
          <i class="bi bi-people-fill"></i>
          <span><span class="counter">350</span>+</span>
          <p>Recipients</p>
        </div>
        <div class="card justify-content-center">
          <i class="bi bi-people-fill"></i>
          <span><span class="counter">51</span>%</span>
          <p>Supply to Demand ratio</p>
        </div>
      </div>
    </div>
  </div>

  <!-- About the Organization-->

  <div class="about-details">
        <div class="container">
          <div class="row">
            <div class="offset-xl-1 col-xl-10 col-lg-8">
              <div class="section-tittle mb-15">
                <h2>About the Cause</h2>
              </div>
            </div>
            <div class="offset-xl-1 col-xl-9">
              <div class="about-pera">
                <p>
                  "We – the concerned citizens of Sri Lanka – initiated this campaign with the support of Sri Lanka College of Paediatricians to gather funds to expedite the construction of Lady Ridgeway Hospital’s Cardiac and Critical Care Complex which will allow the hospital to provide timely treatment to all of our children in need."
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="offset-xl-1 col-xl-10 col-lg-8">
              <div class="section-tittle mb-15">
                <h2>Project Legitimacy</h2>
              </div>
            </div>
            <div class="offset-xl-1 col-xl-9">
              <div class="about-pera p-0">
                <p>
                  "Nearly ten out of 1000 infants die before they reach their first birthday due to congenital heart disease (CHD) which is the main cause of infant deaths in Sri Lanka. However, with proper resources we can significantly reduce this number. The long-overdue construction of LRH’s Cardiac and Critical Care Complex will not only help us rid of the main cause of infant mortality in the country, but it will also save thousands of families who sacrifice all to provide their critically ill children with proper and TIMELY care."
                </p>
              </div>
            </div>
          </div>
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
                    <a href="index.php"><img src="Images/logo.png" alt="BookBridge" /></a>
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