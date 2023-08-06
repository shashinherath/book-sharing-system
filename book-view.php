<?php
    session_start();

    $_SESSION['cartcnt'] = (isset($_SESSION['cartcnt'])) ? $_SESSION['cartcnt'] : 0;

    include('database.php');

    $isbn = isset($_GET['isbn']) ? $_GET['isbn'] : null;

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $queryuser = "SELECT * FROM user where email = '$email' ";
        $resultuser = mysqli_query($con, $queryuser);

        if (!$resultuser) {
            die("Error: " . mysqli_error($con));
        }
    }

    if (isset($isbn)) {
        $query = "SELECT * FROM books where isbn = '$isbn'";
        $result = mysqli_query($con, $query);
        if (!$result) {
            die("Error: " . mysqli_error($con));
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
                          if (isset($resultuser)) {
                              $rowuser = mysqli_fetch_assoc($resultuser);
                          }

                          $_SESSION['cartcnt'] = $_COOKIE['jscartcount'];

                          if (isset($_SESSION['login'])) {
                              echo '<li class="headericonlist">
                          <a href="cart.php" class="headericon"
                            ><i class="bi bi-cart"></i><br />
                            <span id="cartcount">'.$_SESSION['cartcnt'].'</span></a
                          >
                          <a href="profile.php" class="headericon"
                            ><i class="bi bi-person-circle"></i><br />
                            <span>'. $rowuser['name'] .'</span>
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

    <!-- Book View -->

    <main>
      <div class="services-area2">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="row">
                <div class="col-xl-12">
                  <div class="single-services d-flex align-items-center mb-0">
                      <?php
                      if (isset($result)) {
                          $row = mysqli_fetch_assoc($result);
                      } else {
                          $row['image'] = 'https://books.google.lk/books/publisher/content?id=0UZLDwAAQBAJ&pg=PP1&img=1&zoom=3&hl=en&bul=1&sig=ACfU3U3HlOoWTRanr3bk01qn-6_BhGghEQ&w=1280';
                          $row['book_name'] = 'Sri Lanka at the Crossroads of History';
                          $row['price'] = '1500.00';
                          $row['description'] = 'The peoples of Sri Lanka have participated in far-flung trading networks, religious formations, and Asian and European empires for millennia. This interdisciplinary volume sets out to draw Sri Lanka into the field of Asian and Global History by showing how the latest wave of scholarship has explored the island as a ‘crossroads’, a place defined by its openness to movement across the Indian Ocean.Experts in the history, archaeology, literature and art of the island from c.500 BCE to c.1850 CE use Lankan material to explore a number of pressing scholarly debates. They address these matters from their varied disciplinary perspectives and diverse array of sources, critically assessing concepts such as ethnicity, cosmopolitanism and localisation, and elucidating the subtle ways in which the ...';
                      }
                      echo '
                    <div class="features-img">
                      <img width="282px" height="427px" src="'.$row['image'].'" alt="'.$row['book_name'].'" />
                    </div>
                    <div class="features-caption">
                      <h3>'.$row['book_name'].'</h3>
                      <p>By Evan Winter</p>
                      <div class="price">
                        <span>Rs. '.$row['price']. '</span>
                      </div>
                      <div class="review">
                        <div class="rating">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-half"></i>
                        </div>
                        <p>(137 Review)</p>
                      </div>
                      <a href="#" onclick="cartadd()" class="white-btn mr-10" >Add to Cart</a>
                    </div>
                    

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <section class="our-client section-padding best-selling">
        <div class="container">
          <div class="row">
            <div class="offset-xl-1 col-xl-10">
              <div class="nav-button f-left">
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a
                      class="nav-link active"
                      id="nav-one-tab"
                      data-bs-toggle="tab"
                      href="#nav-one"
                      role="tab"
                      aria-controls="nav-one"
                      aria-selected="false"
                      >Description</a
                    >
                    <a
                      class="nav-link"
                      id="nav-two-tab"
                      data-bs-toggle="tab"
                      href="#nav-two"
                      role="tab"
                      aria-controls="nav-two"
                      aria-selected="false"
                      >Author</a
                    >
                    <a
                      class="nav-link"
                      id="nav-three-tab"
                      data-bs-toggle="tab"
                      href="#nav-three"
                      role="tab"
                      aria-controls="nav-three"
                      aria-selected="false"
                      >Comments</a
                    >
                    <a
                      class="nav-link"
                      id="nav-four-tab"
                      data-bs-toggle="tab"
                      href="#nav-four"
                      role="tab"
                      aria-controls="nav-four"
                      aria-selected="true"
                      >Review</a
                    >
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="tab-content" id="nav-tabContent">
            <div
              class="tab-pane fade active show"
              id="nav-one"
              role="tabpanel"
              aria-labelledby="nav-one-tab"
            >
              <div class="row">
                <div class="offset-xl-1 col-lg-9">
                  <p>
                    ' .$row['description'].'
                  </p>
                  <p>
                    It is often frustrating to attempt to plan meals that are
                    designed for one. Despite this fact, we are seeing more and
                    more recipe books and Internet websites that are dedicated
                    to the act of cooking for one. Divorce and the death of
                    spouses or grown children leaving for college are all
                    reasons that someone accustomed to cooking for more than one
                    would suddenly need to learn how to adjust all the cooking
                    practices utilized before into a streamlined plan of cooking
                    that is more efficient for one person creating less.
                  </p>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="nav-two"
              role="tabpanel"
              aria-labelledby="nav-two-tab"
            >
              <div class="row">
                <div class="offset-xl-1 col-lg-9">
                  <p>
                    Beryl Cook is one of Britain’s most talented and amusing
                    artists .Beryl’s pictures feature women of all shapes and
                    sizes enjoying themselves .Born between the two world wars,
                    Beryl Cook eventually left Kendrick School in Reading at the
                    age of 15, where she went to secretarial school and then
                    into an insurance office. After moving to London and then
                    Hampton, she eventually married her next door neighbour from
                    Reading, John Cook. He was an officer in the Merchant Navy
                    and after he left the sea in 1956, they bought a pub for a
                    year before John took a job in Southern Rhodesia with a
                    motor company. Beryl bought their young son a box of
                    watercolours, and when showing him how to use it, she
                    decided that she herself quite enjoyed painting. John
                    subsequently bought her a child’s painting set for her
                    birthday and it was with this that she produced her first
                    significant work, a half-length portrait of a dark-skinned
                    lady with a vacant expression and large drooping breasts. It
                    was aptly named ‘Hangover’ by Beryl’s husband and
                  </p>
                  <p>
                    It is often frustrating to attempt to plan meals that are
                    designed for one. Despite this fact, we are seeing more and
                    more recipe books and Internet websites that are dedicated
                    to the act of cooking for one. Divorce and the death of
                    spouses or grown children leaving for college are all
                    reasons that someone accustomed to cooking for more than one
                    would suddenly need to learn how to adjust all the cooking
                    practices utilized before into a streamlined plan of cooking
                    that is more efficient for one person creating less.
                  </p>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="nav-three"
              role="tabpanel"
              aria-labelledby="nav-three-tab"
            >
              <div class="row">
                <div class="offset-xl-1 col-lg-9">
                  <p>
                    Beryl Cook is one of Britain’s most talented and amusing
                    artists .Beryl’s pictures feature women of all shapes and
                    sizes enjoying themselves .Born between the two world wars,
                    Beryl Cook eventually left Kendrick School in Reading at the
                    age of 15, where she went to secretarial school and then
                    into an insurance office. After moving to London and then
                    Hampton, she eventually married her next door neighbour from
                    Reading, John Cook. He was an officer in the Merchant Navy
                    and after he left the sea in 1956, they bought a pub for a
                    year before John took a job in Southern Rhodesia with a
                    motor company. Beryl bought their young son a box of
                    watercolours, and when showing him how to use it, she
                    decided that she herself quite enjoyed painting. John
                    subsequently bought her a child’s painting set for her
                    birthday and it was with this that she produced her first
                    significant work, a half-length portrait of a dark-skinned
                    lady with a vacant expression and large drooping breasts. It
                    was aptly named ‘Hangover’ by Beryl’s husband and
                  </p>
                  <p>
                    It is often frustrating to attempt to plan meals that are
                    designed for one. Despite this fact, we are seeing more and
                    more recipe books and Internet websites that are dedicated
                    to the act of cooking for one. Divorce and the death of
                    spouses or grown children leaving for college are all
                    reasons that someone accustomed to cooking for more than one
                    would suddenly need to learn how to adjust all the cooking
                    practices utilized before into a streamlined plan of cooking
                    that is more efficient for one person creating less.
                  </p>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="nav-four"
              role="tabpanel"
              aria-labelledby="nav-four-tab"
            >
              <div class="row">
                <div class="offset-xl-1 col-lg-9">
                  <p>
                    Beryl Cook is one of Britain’s most talented and amusing
                    artists .Beryl’s pictures feature women of all shapes and
                    sizes enjoying themselves .Born between the two world wars,
                    Beryl Cook eventually left Kendrick School in Reading at the
                    age of 15, where she went to secretarial school and then
                    into an insurance office. After moving to London and then
                    Hampton, she eventually married her next door neighbour from
                    Reading, John Cook. He was an officer in the Merchant Navy
                    and after he left the sea in 1956, they bought a pub for a
                    year before John took a job in Southern Rhodesia with a
                    motor company. Beryl bought their young son a box of
                    watercolours, and when showing him how to use it, she
                    decided that she herself quite enjoyed painting. John
                    subsequently bought her a child’s painting set for her
                    birthday and it was with this that she produced her first
                    significant work, a half-length portrait of a dark-skinned
                    lady with a vacant expression and large drooping breasts. It
                    was aptly named ‘Hangover’ by Beryl’s husband and
                  </p>
                  <p>
                    It is often frustrating to attempt to plan meals that are
                    designed for one. Despite this fact, we are seeing more and
                    more recipe books and Internet websites that are dedicated
                    to the act of cooking for one. Divorce and the death of
                    spouses or grown children leaving for college are all
                    reasons that someone accustomed to cooking for more than one
                    would suddenly need to learn how to adjust all the cooking
                    practices utilized before into a streamlined plan of cooking
                    that is more efficient for one person creating less.
                  </p>
                </div>
              </div>
            </div>
            <div
              class="tab-pane fade"
              id="nav-five"
              role="tabpanel"
              aria-labelledby="nav-five-tab"
            >
              <div class="row">
                <div class="offset-xl-1 col-lg-9">
                  <p>
                    Beryl Cook is one of Britain’s most talented and amusing
                    artists .Beryl’s pictures feature women of all shapes and
                    sizes enjoying themselves .Born between the two world wars,
                    Beryl Cook eventually left Kendrick School in Reading at the
                    age of 15, where she went to secretarial school and then
                    into an insurance office. After moving to London and then
                    Hampton, she eventually married her next door neighbour from
                    Reading, John Cook. He was an officer in the Merchant Navy
                    and after he left the sea in 1956, they bought a pub for a
                    year before John took a job in Southern Rhodesia with a
                    motor company. Beryl bought their young son a box of
                    watercolours, and when showing him how to use it, she
                    decided that she herself quite enjoyed painting. John
                    subsequently bought her a child’s painting set for her
                    birthday and it was with this that she produced her first
                    significant work, a half-length portrait of a dark-skinned
                    lady with a vacant expression and large drooping breasts. It
                    was aptly named ‘Hangover’ by Beryl’s husband and
                  </p>
                  <p>
                    It is often frustrating to attempt to plan meals that are
                    designed for one. Despite this fact, we are seeing more and
                    more recipe books and Internet websites that are dedicated
                    to the act of cooking for one. Divorce and the death of
                    spouses or grown children leaving for college are all
                    reasons that someone accustomed to cooking for more than one
                    would suddenly need to learn how to adjust all the cooking
                    practices utilized before into a streamlined plan of cooking
                    that is more efficient for one person creating less.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>'
      ?>
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
    <script src="JS/javascript.js"></script>
  </body>
</html>
