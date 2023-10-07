<?php
    session_start();

    $_SESSION['cartcnt'] = (isset($_SESSION['cartcnt'])) ? $_SESSION['cartcnt'] : 0;

    include('database.php');

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $queryuser = "SELECT * FROM user where email = '$email' ";
        $resultuser = mysqli_query($con, $queryuser);

        if (!$resultuser) {
            die("Error: " . mysqli_error($con));
        }
    }

    $query = "SELECT * FROM books";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Error: " . mysqli_error($con));
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

    <!-- Books -->

    <main>
      <div class="listing-area pt-50 pb-50">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="category-listing mb-50">
                <div class="single-listing">
                  <div class="select-Categories pb-30">
                    <div class="small-tittle mb-20">
                      <h4>Filter by Genres</h4>
                    </div>
                    <label class="container"
                      >History
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Horror - Thriller
                      <input type="checkbox" checked="checked active" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Love Stories
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Science Fiction
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Biography
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                  </div>

                  <aside
                    class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40"
                  >
                    <div class="small-tittle">
                      <h4>Filter by Price</h4>
                    </div>
                    <div class="widgets_inner">
                      <div class="range_item">
                        <span class="irs js-irs-0"
                          ><span class="irs"
                            ><span class="irs-line" tabindex="-1"
                              ><span class="irs-line-left"></span
                              ><span class="irs-line-mid"></span
                              ><span class="irs-line-right"></span></span
                            ><span class="irs-min" style="visibility: hidden"
                              >$ 0</span
                            ><span class="irs-max" style="visibility: visible"
                              >$ 1.000</span
                            ><span
                              class="irs-from"
                              style="visibility: visible; left: 0%"
                              >$ 0</span
                            ><span
                              class="irs-to"
                              style="visibility: visible; left: 39.9497%"
                              >$ 500</span
                            ><span
                              class="irs-single"
                              style="visibility: hidden; left: 11.4322%"
                              >$ 0 - $ 500</span
                            ></span
                          ><span class="irs-grid"></span
                          ><span
                            class="irs-bar"
                            style="left: 3.76884%; width: 46.2312%"
                          ></span
                          ><span
                            class="irs-shadow shadow-from"
                            style="display: none"
                          ></span
                          ><span
                            class="irs-shadow shadow-to"
                            style="display: none"
                          ></span
                          ><span class="irs-slider from" style="left: 0%"></span
                          ><span
                            class="irs-slider to type_last"
                            style="left: 46.2312%"
                          ></span></span
                        ><input
                          type="text"
                          class="js-range-slider irs-hidden-input"
                          value=""
                          readonly=""
                        />
                        <div class="d-flex align-items-center">
                          <div
                            class="price_value d-flex justify-content-center"
                          >
                            <input
                              type="text"
                              class="js-input-from"
                              id="amount"
                              readonly=""
                            />
                            <span>to</span>
                            <input
                              type="text"
                              class="js-input-to"
                              id="amount"
                              readonly=""
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </aside>

                  <div class="select-job-items2 mb-30">
                    <div class="col-xl-12">
                      <select name="select2" style="display: none">
                        <option value="">Filter by Rating</option>
                        <option value="">5 Star Rating</option>
                        <option value="">4 Star Rating</option>
                        <option value="">3 Star Rating</option>
                        <option value="">2 Star Rating</option>
                        <option value="">1 Star Rating</option>
                      </select>
                      <div class="nice-select" tabindex="0">
                        <span class="current">Filter by Rating</span>
                        <ul class="list">
                          <li data-value="" class="option selected">
                            Filter by Rating
                          </li>
                          <li data-value="" class="option">5 Star Rating</li>
                          <li data-value="" class="option">4 Star Rating</li>
                          <li data-value="" class="option">3 Star Rating</li>
                          <li data-value="" class="option">2 Star Rating</li>
                          <li data-value="" class="option">1 Star Rating</li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div class="select-Categories pt-100 pb-60">
                    <div class="small-tittle mb-20">
                      <h4>Filter by Publisher</h4>
                    </div>
                    <label class="container"
                      >Green Publications
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Anondo Publications
                      <input type="checkbox" checked="checked active" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Rinku Publications
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Sheba Publications
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Red Publications
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                  </div>

                  <div class="select-Categories">
                    <div class="small-tittle mb-20">
                      <h4>Filter by Author Name</h4>
                    </div>
                    <label class="container"
                      >Buster Hyman
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Phil Harmonic
                      <input type="checkbox" checked="checked active" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Cam L. Toe
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Otto Matic
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                    <label class="container"
                      >Juan Annatoo
                      <input type="checkbox" />
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-6">
              <div class="row justify-content-end">
                <div class="col-xl-4">
                  <div class="product_page_tittle">
                    <div class="short_by">
                      <select
                        name="#"
                        id="product_short_list"
                        style="display: none"
                      >
                        <option>Browse by popularity</option>
                        <option>Name</option>
                        <option>NEW</option>
                        <option>Old</option>
                        <option>Price</option>
                      </select>
                      <div class="nice-select" tabindex="0">
                        <span class="current">Browse by popularity</span>
                        <ul class="list">
                          <li
                            data-value="Browse by popularity"
                            class="option selected"
                          >
                            Browse by popularity
                          </li>
                          <li data-value="Name" class="option">Name</li>
                          <li data-value="NEW" class="option">NEW</li>
                          <li data-value="Old" class="option">Old</li>
                          <li data-value="Price" class="option">Price</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="best-selling p-0">
                <div class="row">
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                    <div class="properties pb-30">
                      <div class="properties-card">
                        <div class="properties-img">
                          <a href="book-view.php?isbn='.$row['isbn'].'"
                            ><img
                              src="'.$row['image'].'"
                              alt="'.$row['book_name'].'"
                          /></a>
                        </div>
                        <div class="properties-caption properties-caption2">
                          <h3><a href="book-view.php?isbn='.$row['isbn'].'">' . $row['book_name']. '</a></h3>
                          <p>'.$row['author'].'</p>
                          <div
                            class="properties-footer justify-content-between align-items-center"
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
                              <span>Rs. '.$row['price'].'</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
                        }
                    ?>
                </div>
              </div>

              <div class="row">
                <div class="col-xl-12">
                  <div class="more-btn text-center mt-15">
                    <a href="#" class="border-btn border-btn2 more-btn2"
                      >Browse More</a
                    >
                  </div>
                </div>
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
