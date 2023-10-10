<?php
     session_start();

     include('database.php');
 
     $_SESSION['cartcnt'] = (isset($_SESSION['cartcnt'])) ? $_SESSION['cartcnt'] : 0;
 
 
     if (isset($_SESSION['email'])) {
         $email = $_SESSION['email'];
         $queryuser = "SELECT * FROM user where email = '$email' ";
         $resultuser = mysqli_query($con, $queryuser);
 
         if (!$resultuser) {
             die("Error: " . mysqli_error($con));
         }
     }


    
    if (isset($_POST['update_cart_quantity'])) {

      $id = mysqli_real_escape_string($con, $_POST['update_id']);
      $update_qty = mysqli_real_escape_string($con, $_POST['update_qty']);
      $update_quanttity_quary=mysqli_query($con,"UPDATE  cart  set qty = $update_qty WHERE id = $id");


    }



    if (isset($_POST['checkout_btn']) && $_SESSION['cartcnt'] > 0) {

      $org = mysqli_real_escape_string($con, $_POST['org']);
      $subtotal = mysqli_real_escape_string($con, $_POST['subtotal']);
      $tqty = mysqli_real_escape_string($con, $_POST['tqty']);

      $_SESSION['org_id'] = $org;
      $_SESSION['subtotal'] = $subtotal;
      $_SESSION['tqty'] = $tqty;

      header("location:checkout.php");
    
      
      
      }

    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];

        mysqli_query($con, "DELETE FROM cart WHERE id = $remove_id");
        $_SESSION['cartcnt'] = $_SESSION['cartcnt'] - 1;
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

    <!-- Cart -->

    <main>
      <section class="cart_area section-padding">
        <div class="" style="padding-left:80px;">
          <div class="cart_inner">
            <div class="table-responsive">
              <table class="table">
              <?php
                  $select_cart_products = mysqli_query($con, "SELECT * FROM cart where user_email = '$email'");
                  if (mysqli_num_rows($select_cart_products) > 0) {
                      echo '
                      <thead>
                      <tr>
                          <th scope="col">Book</th>
                          <th scope="col"></th>
                          <th scope="col">Price</th>
                          <th>Quantity</th>
                          <th scope="col">Total</th>
                          <th scope="col"></th>
                      </tr>
                      </thead>
                      <tbody>';
                      $total = 0;
                      $tqty = 0;

                      while ($rowcart = mysqli_fetch_assoc($select_cart_products)) {


                        ?>

                    <tr>
                      <td> <img
                            src="<?php  echo $rowcart['image']?>" height="170px" width="120px"
                            alt=""
                          /></td>
                      <td><?php  echo $rowcart['name']?></td>
                      <td>Rs.<?php  echo $rowcart['price']?></td>

                      <td style=" width:200px;">
                      <form action="" method="post">
                        <div style="display: flex; width:200px;">            
                        <input type="hidden" value="<?php  echo $rowcart['id']?>" name="update_id">
                          <input type="number" class="" min="1" name="update_qty" value="<?php  echo $rowcart['qty']?>" max="10" style="width:60px; margin-right:10px; " >
                          <input type="submit" value="update" class="btn btn-primary" name="update_cart_quantity">
                        </div>
                      </form> 
                      </td>
                      <?php
                        $total = $total + ( $rowcart['price']* $rowcart['qty']) ;
                        $tqty = $tqty +  $rowcart['qty'] ;

                      ?>
                      <td>Rs.<?php  echo $rowcart['price']* $rowcart['qty']?></td>
                      <td>
                           <a style="color: red;"  href="cart.php?remove=<?php echo $rowcart['id'] ?>">Remove</a>
                      </td>
                    </tr>

                      <?php

                            }

                        } else {
                            echo 'no product';
                        }
                        ?>


                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>                 
                      <td></td>
                      <td>Subtotal</td>       
                     
                      <td>Rs.<?php echo isset($total) ? $total : 0;?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>                 
                      <td>Organization</td>
                      <!-- <td>Organizati on</td>          -->
                      <td > 
                      <div class="shipping_box" style="padding-top: 25px;">

                      <form action="" method="post">

                          <input type="hidden" name="subtotal" value="<?php echo $total;?>" >
                          <input type="hidden" name="tqty" value="<?php echo $tqty; ?>">
                 


                          <select class="shipping_select section_bg"
                                  style="display: none" name="org" id="">
                                  <!-- <option value="">sssssssssssssssssss</option> -->
                                  <?php
                                    $selectorg = mysqli_query($con, "SELECT * FROM organizations ");

                                    if (mysqli_num_rows($selectorg) > 0) {
                                        while ($roworg = mysqli_fetch_assoc($selectorg)) {
                                            echo '<option value="' . $roworg['org_id'] . '">' . $roworg['org_name'] . '</option>';
                                        }
                                    }
                                    ?>

                                </select>  

                        <input class="post_code" name="smsg" type="text" placeholder="Special Message" />
                        <input type="submit" class="btn" value="Proceed to checkout" name="checkout_btn">
                        </form>
                                 
       


                                  </div>
   
                     

                      </td>
        
          
                    </tr>

                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>                 
                      <td></td>
                      <td>
                        <!-- <form action="" method="post">
                          <input type="text" name="subtotal" >
                          <input type="text" name="orgn"  >
                          <input type="text" name="qty" >

                        <input class="post_code" type="text" placeholder="Special Message" />
                        <input type="submit" class="btn" value="Proceed to checkout" name="checkout_btn">
                        </form> -->
                   

                      </td>
                                  
                      <!-- <td >
                        <select name="" >
                          <option value="" selected>aaaaaa</option>
                          
                        </select>
                      </td> -->
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
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
