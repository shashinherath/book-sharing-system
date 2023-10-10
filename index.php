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

    $querybook = "SELECT * FROM books LIMIT 7";
    $resultbook = mysqli_query($con, $querybook);

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

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />

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
  if (isset($_SESSION['donation_ok']) ? $_SESSION['donation_ok'] == true : false) {
      ?>

      <script>
          swal("Donation Successfully!", "Your payment has been successfully processed.", "success");
      </script>

      <?php
      $_SESSION['donation_ok'] = false;
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

    <!-- Slider -->

    <main>
      <div class="slider-area">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="slider-active dot-style">
                <div
                  class="single-slider slider-height slider-bg1 d-flex align-items-center"
                >
                  <div class="container">
                    <div class="row justify-content-center">
                      <div
                        class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7"
                      >
                        <div class="hero-caption text-center">
                          <span data-animation="fadeInUp" data-delay=".2s"
                            >Book Bridge</span
                          >
                          <h1 data-animation="fadeInUp" data-delay=".4s">
                            Sowing Seeds of Literacy!
                          </h1>
                          <a
                            href="#"
                            class="btn hero-btn"
                            data-animation="bounceIn"
                            data-delay=".8s"
                            >Donate</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="single-slider slider-height slider-bg2 d-flex align-items-center"
                >
                  <div class="container">
                    <div class="row justify-content-center">
                      <div
                        class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7"
                      >
                        <div class="hero-caption text-center">
                          <span data-animation="fadeInUp" data-delay=".2s"
                            >Book Bridge</span
                          >
                          <h1 data-animation="fadeInUp" data-delay=".4s">
                            Cultivating Bright Futures!
                          </h1>
                          <a
                            href="#"
                            class="btn hero-btn"
                            data-animation="bounceIn"
                            data-delay=".8s"
                            >Donate</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="single-slider slider-height slider-bg3 d-flex align-items-center"
                >
                  <div class="container">
                    <div class="row justify-content-center">
                      <div
                        class="col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-7"
                      >
                        <div class="hero-caption text-center">
                          <span data-animation="fadeInUp" data-delay=".2s"
                            >Book Bridge</span
                          >
                          <h1 data-animation="fadeInUp" data-delay=".4s">
                            Read, Donate, Repeat!
                          </h1>
                          <a
                            href="#"
                            class="btn hero-btn"
                            data-animation="bounceIn"
                            data-delay=".8s"
                            >Donate</a
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Target Information -->
      <div class="target-bg">
        <div class="target-info">
          <h2>Our Goal</h2>
          <p>
            "Through this platform, we aim to ignite a ripple effect of positive
            change, where the act of donating a book transforms the lives of
            individuals and entire communities. By democratizing access to
            knowledge and fostering a love for reading, we believe we can
            empower individuals to break free from the limitations imposed by
            illiteracy and unlock their full potential together!"
          </p>
        </div>
      </div>

      <!-- Popular Books for donation -->

      <div class="best-selling section-bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
              <div class="section-tittle text-center mb-55">
                <h2>Popular Books for donation</h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12">
              <div class="selling-active">
                  <?php

                  while ($rowbook = mysqli_fetch_assoc($resultbook)) {

                      echo '
                  <div class="properties pb-20">
                  <div class="properties-card">
                    <div class="properties-img">
                      <a href="book-view.php?isbn='.$rowbook['isbn'].'"
                        ><img src="'.$rowbook['image'].'" alt="'.$rowbook['book_name'].'" height="280px"
                      /></a>
                    </div>
                    <div class="properties-caption" style="height: 280px;">
                      <h3><a href="book-view.php?isbn='.$rowbook['isbn'].'">'.$rowbook['book_name'].'</a></h3>
                      <p>'.$rowbook['author'].'</p>
                      <div
                        class="properties-footer d-flex justify-content-between align-items-center"
                      >
                        <div class="review">
                          <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                          </div>
                          <p>(<span>137</span> Review)</p>
                        </div>
                        <div class="price">
                          <span>Rs.'.$rowbook['price'].'</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>';
                  }
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card Organizations -->

      <div class="orgcard">
        <div class="section-tittle text-center mb-55">
          <h2>Popular Organizations</h2>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="card" style="width: 18rem">
              <img
                class="card-img-top"
                src="assets\img\Foundations\LittleHearts.png"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">Little Hearts</h5>
                <p class="card-text">
                  Little Hearts is a national fundraising project to build a
                  Cardiac and Critical Care Complex at Lady Ridgeway Children's
                  Hospital.
                </p>
                <a href="organization_details.php?id=1" class="btn btn-primary">View</a>
              </div>
            </div>
            <div class="card" style="width: 18rem">
              <img
                class="card-img-top"
                src="assets\img\Foundations\CMI.png"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">Child Mind Institute</h5>
                <p class="card-text">
                  The Child Mind Institute is an independent nonprofit dedicated
                  to transforming the lives of children struggling with mental
                  health and learning disorders.
                </p>
                <a href="organization_details.php?id=2" class="btn btn-primary">View</a>
              </div>
            </div>
            <div class="card" style="width: 18rem">
              <img
                class="card-img-top"
                src="assets\img\Foundations\MOD.png"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">March of Dimes</h5>
                <p class="card-text">
                  March of Dimes is a nonprofit organization committed to ending
                  preventable maternal health risks and death, ending
                  preventable preterm birth and infant death and closing the
                  health equity gap for all families.
                </p>
                <a href="organization_details.php?id=3" class="btn btn-primary">View</a>
              </div>
            </div>
            <div class="card" style="width: 18rem">
              <img
                class="card-img-top"
                src="assets\img\Foundations\CAL.png"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">Child Action Lanka</h5>
                <p class="card-text">
                  The holistic approach that CAL models, aims to provide
                  transformational development that is sustainable. We go beyond
                  the surface into underlying root causes of inequality,
                  discrimination, exploitation to ensure the wellbeing, value
                  and equality of a child.
                </p>
                <a href="organization_details.php?id=4" class="btn btn-primary">View</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Donation Counter -->

      <div class="counter-card">
        <div class="section-tittle text-center mb-55">
          <h2>Journey of Donation</h2>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="card justify-content-center">
              <i class="bi bi-buildings-fill"></i>
              <span><span class="counter">10</span>+</span>
              <p>Organizations</p>
            </div>
            <div class="card justify-content-center">
              <i class="bi bi-people-fill"></i>
              <span><span class="counter">25</span>+</span>
              <p>Crew</p>
            </div>
            <div class="card justify-content-center">
              <i class="bi bi-gift-fill"></i>
              <span><span class="counter">540</span>+</span>
              <p>Donations</p>
            </div>
            <div class="card justify-content-center">
              <i class="bi bi-book-half"></i>
              <span><span class="counter">15000</span>+</span>
              <p>Books</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Photo slider -->
      <div class="section-tittle text-center mb-55">
        <h2>Success Stories</h2>
      </div>
      <div class="success-slider">
        <div class="carousel owl-carousel">
          <div class="card"><img src="assets/img/Donated_img/2.png" /></div>
          <div class="card"><img src="assets/img/Donated_img/3.png" /></div>
          <div class="card"><img src="assets/img/Donated_img/4.png" /></div>
          <div class="card"><img src="assets/img/Donated_img/5.png" /></div>
          <div class="card"><img src="assets/img/Donated_img/6.png" /></div>
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
                      <a href="index.html"
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

    <script src="JS/javascript.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  </body>
</html>
