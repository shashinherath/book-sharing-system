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






  <main>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="slider-area">
            <div class="slider-height2 slider-bg9 d-flex align-items-center justify-content-center">
              <div class="hero-caption hero-caption2">
                <h1 class="fw-light">Impact and Success Stories</h1>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>

  <!-- Small slogun -->

  <div class="target-info">
    <h2>Be a Hero!</h2>
    <p>
      "Unlock Worlds, Empower Change! &nbsp;&nbsp; Your Donation, Their Brighter Future!"
    </p>
  </div>

  <!-- about -->



  <!-- Recipiant Organizations -->

  <div class="orgcard">


    <div class="container">
      <div class="row justify-content-center">
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\1.jpg" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2023/05/27</h5>
            <p class="card-text">
            One of our remarkable endeavors was in partnership with the 'Read to Rise' foundation in South Africa. In September 2023, we donated a vast collection of age-appropriate books to their initiative, enriching the reading experiences of underprivileged children in local schools
            </p>

          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\2.png" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2023/03/20</h5>
            <p class="card-text">
            In 2023, we collaborated with the 'Books for All' organization in India. Together, we organized a book donation drive, collecting thousands of books that were distributed to schools, libraries, and orphanages in rural communities. It was a testament to how books can transform lives."
            </p>

          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\3.png" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2023/01/09</h5>
            <p class="card-text">
            Our impact also reached remote areas in Southeast Asia, where we worked closely with the 'Books Beyond Borders' initiative. In 2023, we delivered a shipment of books to their community library project, opening doors to knowledge and empowerment for isolated communities.
            </p>

          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\4.png" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2023/01/01</h5>
            <p class="card-text">
            In 2023, we celebrated a significant milestone by donating over 3000 books to schools and libraries in Latin America. This collaborative effort between BookBridge and 'Literacy for All' made quality educational resources accessible to students who previously had limited access to them.
            </p>

          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="orgcard">


    <div class="container">
      <div class="row justify-content-center">
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\5.png" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2022/11/15</h5>
            <p class="card-text">
            Our commitment to making knowledge accessible knows no borders. In 2022, we partnered with the 'Global Book Sharing' project, facilitating the exchange of books between nations. Through this initiative, we witnessed the transformative potential of international book sharing.
            </p>

          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\6.png" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2022/10/11</h5>
            <p class="card-text">
            In 2022, our collaboration with the 'Books for the Future' foundation brought the magic of books to communities in Africa. We organized mobile libraries that traveled to villages. Witnessing the joy on the faces of those discovering the world within pages was a true testament to the power of books.
            </p>

          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\7.png" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2021/07/11</h5>
            <p class="card-text">
            BookBridge's commitment to fostering lifelong learning took us to partnership with 'Read and Grow'. In 2021, we provided thousands of books to their reading centers, enabling children from underserved communities to explore new worlds and develop a lifelong love for reading.
            </p>

          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img class="card-img-top" src="assets\img\campaigns\8.png" alt="Card image cap" />
          <div class="card-body">
            <h5 class="card-title">2021/05/27</h5>
            <p class="card-text">
            In 2021, we extended our reach to the Middle East, collaborating with the 'Open Books, Open Minds' initiative. Our joint effort led to the establishment of community reading spaces in refugee camps, providing solace and knowledge to displaced families.
            </p>

          </div>
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