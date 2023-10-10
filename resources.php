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
                  <div class="slicknav_menu">
                    <a href="#" aria-haspopup="true" role="button" tabindex="0" class="slicknav_btn slicknav_collapsed"
                      style="outline: none"><span class="slicknav_menutxt">MENU</span><span class="slicknav_icon"><span
                          class="slicknav_icon-bar"></span><span class="slicknav_icon-bar"></span><span
                          class="slicknav_icon-bar"></span></span></a>
                    <ul class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none">
                      <li>
                        <a href="index.php" role="menuitem" tabindex="-1">Home</a>
                      </li>
                      <li>
                        <a href="categories.html" role="menuitem" tabindex="-1">Categories</a>
                      </li>
                      <li>
                        <a href="about.php" role="menuitem" tabindex="-1">About</a>
                      </li>
                      <li class="slicknav_collapsed slicknav_parent">
                        <a href="#" role="menuitem" aria-haspopup="true" tabindex="-1"
                          class="slicknav_item slicknav_row" style="outline: none"><a href="#" tabindex="-1">Pages</a>
                          <span class="slicknav_arrow">+</span></a>
                        <ul class="submenu slicknav_hidden" role="menu" aria-hidden="true" style="display: none">
                          <li>
                            <a href="login.php" role="menuitem" tabindex="-1">login</a>
                          </li>
                          <li>
                            <a href="cart.php" role="menuitem" tabindex="-1">Cart</a>
                          </li>
                          <li>
                            <a href="checkout.php" role="menuitem" tabindex="-1">Checkout</a>
                          </li>
                          <li>
                            <a href="book-details.html" role="menuitem" tabindex="-1">book Details</a>
                          </li>
                          <li>
                            <a href="blog_details.html" role="menuitem" tabindex="-1">Blog Details</a>
                          </li>
                          <li>
                            <a href="elements.html" role="menuitem" tabindex="-1">Element</a>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <a href="blog.html" role="menuitem" tabindex="-1">Blog</a>
                      </li>
                      <li>
                        <a href="contact.php" role="menuitem" tabindex="-1">Contect</a>
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
            <div class="slider-height2 slider-bg10 d-flex align-items-center justify-content-center">
              <div class="hero-caption hero-caption2">
                <h2>Educational Resources</h2>
              </div>
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
      <h2>The illiteracy rate among all adults (over 15-year-old) in 2020, by world region</h2>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="card justify-content-center">
          <i class="bi bi-people-fill"></i>
          <span><span class="counter">33</span>% +</span>
          <p>Sub-Saharan Africa</p>
        </div>
        <div class="card justify-content-center">
          <i class="bi bi-people-fill"></i>
          <span><span class="counter">23</span>% +</span>
          <p>South Asia</p>
        </div>
        <div class="card justify-content-center">
          <i class="bi bi-people-fill"></i>
          <span><span class="counter">26</span>% +</span>
          <p>Arab States</p>
        </div>
        <div class="card justify-content-center">
          <i class="bi bi-people-fill"></i>
          <span><span class="counter">4</span>% +</span>
          <p>East Asia and the Pacific</p>
        </div>
      </div>
    </div>
  </div>


  <!--Some Numbers-->

  <div class="login-form-area guide1">
    <div class="login-form">
      <div class="login-heading">
        <span>Some numbers related to world literacy</span>
      </div>

      <div class="input-box">
        <div class="single-input-fields">
          <label>Global Literacy Rate:</label>
          <p>
            The global literacy rate has been steadily increasing over the years. According to data from the United
            Nations Educational, Scientific and Cultural Organization (UNESCO) Institute for Statistics, the global
            literacy rate for people aged 15 and above was estimated to be 86.3% in 2016.
          </p>
        </div>
        <div class="single-input-fields">
          <label>Gender Disparities:</label>
          <p>
            Despite progress, gender disparities in literacy rates still exist in some regions. In many parts of the
            world, there is a gap between male and female literacy rates. Efforts are being made to close this gap
            through education and awareness.


          </p>
        </div>
        <div class="single-input-fields">
          <label>Regional Variations:</label>
          <p>
            Literacy rates vary significantly across different regions and countries. Some countries have near-universal
            literacy, while others still face significant challenges in achieving high literacy rates.


          </p>
        </div>
        <div class="single-input-fields">
          <label>Challenges:</label>
          <p>
            There are several factors that contribute to low literacy rates globally, such as poverty, lack of access to
            education, and conflicts. Addressing these challenges remains a priority for international organizations and
            governments.


          </p>
        </div>
      </div>
    </div>
  </div>


  <!--Some Details-->

  <div class="login-form-area guide1">
    <div class="login-form">
      <div class="login-heading">
        <span>general trends and insights regarding child literacy rates in different regions by 2021</span>
      </div>

      <div class="input-box">
        <div class="single-input-fields">
          <label>Sub-Saharan Africa:</label>
          <p>
            This region has been facing challenges in improving child literacy rates due to factors such as poverty,
            limited access to quality education, and conflicts. However, efforts have been made to address these issues
            and improve educational opportunities for children.

          </p>
        </div>
        <div class="single-input-fields">
          <label>South Asia:</label>
          <p>
            Despite progress, gender disparities in literacy rates still exist in some regions. In many parts of the
            world, there is a gap between male and female literacy rates. Efforts are being made to close this gap
            through education and awareness.

          </p>
        </div>
        <div class="single-input-fields">
          <label>East Asia and Pacific:</label>
          <p>
            Overall, this region has seen improvements in child literacy rates, with countries like China making
            significant strides in increasing access to education and reducing illiteracy among children.

          </p>
        </div>
        <div class="single-input-fields">
          <label>Latin America and the Caribbean:</label>
          <p>
            The region has made progress in improving child literacy rates, with most countries achieving relatively
            high levels of access to education for children.


          </p>

        </div>
        <div class="single-input-fields">
          <label>Middle East and North Africa:</label>
          <p>
            The region has witnessed mixed results regarding child literacy rates, with some countries showing progress,
            while others are still facing challenges in improving access to education, especially in conflict-affected
            areas.



          </p>
        </div>

        <div class="single-input-fields">
          <label>Europe and Central Asia:</label>
          <p>
            Child literacy rates in this region are generally high, but disparities may exist between urban and rural
            areas or among different socio-economic groups. North America and Western Europe: Child literacy rates in
            these regions are generally high due to well-established education systems and widespread access to quality
            education.

          </p>

        </div>
        <div class="single-input-fields">
          <label>North America and Western Europe:</label>
          <p>
            Child literacy rates in these regions are generally high due to well-established education systems and
            widespread access to quality education.

          </p>
        </div>

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