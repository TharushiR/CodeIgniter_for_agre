<?php
require_once 'core/init.php';

$user = new User();

if(Input::exists()){
    if(Token::check(Input::get('token'))){

        $validation = new Validation();
        $validation->check($_POST, array(
            'username'  => array('required' => 'true'),
            'password'  => array('required' => 'true')
        ));

        if($validation->passed()){
            $user = new User();

            $remember = (Input::get('remember') === 'on')? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if($login){
                if($user->apprved_user('approved')){
                Redirect::to('index.php');
                }else{
                    $msg = 'You need admin permission to log-in to this system';
                
              }
            }else{
                $msg = 'Sorry, Logged in failed';
            }
        }else{
            pre($validation->errors());
        }

    }
}

?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Agri world</title>
      <meta name="description" content="This was generated by the thusitha thiyushan." />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="generator" content="Codeply">
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="css/styles.css" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="css/font-awesome.min.css">
      
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body >
    <style type="text/css">
      .navbar-brand>img {
         max-height: 100%;
         height: 100%;
         width: auto;
         margin: 0 auto;


         /* probably not needed anymore, but doesn't hurt */
         -o-object-fit: contain;
         object-fit: contain; 

      }
      </style>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><img src="logo.png" alt="Dispute Bills"></a>
            </div>
            <div class="navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                  <?php if(!$user->isLoggedIn()){
                    $u = Null;
                    ?>
                  <li>

                    <a href="" data-toggle="modal" data-target="#signup" >Already have an account?</a>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                     <ul id="login-dp" class="dropdown-menu">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 Login via
                                 <div class="social-buttons">
                                    <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                    <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                 </div>
                                 or
                                 <form class="form" role="form" action="" method="post" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="text" class="form-control" name="username" autocomplete="" id="exampleInputEmail2" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required autocomplete="">
                                       <div class="help-block text-right"><a href="">Forget the password ?</a></div>
                                    </div>
                                    <div class="form-group">
                                       <input type="submit" class="btn btn-primary btn-block"value="Sign in"/>
                                    </div>
                                    <div class="checkbox">
                                       <label for="remember"><input type="checkbox" name="remember" id="remember"/> keep me logged-in</label>
                                       <input type="hidden" name="token" value="<?php echo Token::generate();?>"/>
                                    </div>
                                 </form>
                              </div>
                              <div class="bottom text-center">
                                 New here ? <a href="" data-toggle="modal" data-target="#signup"><b>Join Us</b></a>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <?php }else{
                    $u = DB::getInstance()->Getsum('cost','cart',$user->data()->username);
                    ?>

                  <li class="dropdown">
                     <a href="profile.php?user=<?php echo escape($user->data()->username);?>" class="dropdown-toggle" data-toggle="dropdown">Hello! <b><?php echo escape($user->data()->username);?></b> <span class="caret"></span></a>
                      <ul id="login-dp" class="dropdown-menu">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 Settings
                                 <div class="form-group">
                                    <a href="#" class="btn btn-fb">Edit Profile</a>
                                 </div>
                                  <div class="form-group">
                                     <a href="logout.php" class="btn btn-tw"><i class="fa fa-sign-out"></i> Logout</a>
                                  </div>
                              </div>
                              <div class="bottom text-center">
                                 More Upgade <a href="#"><b>Join Our Commiunity</b></a>
                              </div>
                           </div>
                        </li>
                     </ul>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <?php if($user->hasPermission('admin')){?>
                  <li><a href="admin.php">Dashboad</a></li>
                  <?php }}?>
                  <li><a href="index.php">Home</a></li>
                  <li><a href="order.php"><span class="glyphicon glyphicon-shopping-cart"></span>  Cart</a></li>
                  <li><a href="#">About Us</a></li>
               </ul>
               <form class="navbar-form navbar-right">
                  <input type="text" class="form-control" placeholder="Search...">
               </form>
            </div>
         </div>
      </nav>
<br><br><br>
<?php if(!empty($msg)){
  echo '<script> alert("'.$msg.'"); </script>';
}?>
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="jobModalLabel" aria-hidden="true">
        <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Login to <b>AGRiworldStore.Lk</b></h4> or go back to our <a href="index.php">main site</a>.
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" action="register.php" method="POST">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off"/>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" name="password" placeholder="password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password Again</label>
                                  <input type="password" class="form-control" name="password_again" id="password_again" value="" autocomplete="off" placeholder="password Again" value="" required="" title="Please enter your password again">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                  <input type="email" class="form-control" name="email" id="email" value="" placeholder="Enter Your email" value="<?php echo escape(Input::get('email')); ?>" required="" title="Enter your email ">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                <label for="password" class="control-label">Addressl</label>
                                  <input type="text" class="form-control" name="address" id="address" value="" placeholder="Enter Your Address" value="<?php echo escape(Input::get('address')); ?>" required="" title="Enter your address correct ">
                                  <span class="help-block"></span>
                              </div>

                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                              <button type="submit" value="login" name="submit" class="btn btn-success btn-block">Register now!</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> See all your orders</li>
                          <li><span class="fa fa-check text-success"></span> Shipping is always free</li>
                          <li><span class="fa fa-check text-success"></span> Save your favorites</li>
                          <li><span class="fa fa-check text-success"></span> Fast checkout</li>
                          <li><span class="fa fa-check text-success"></span> Get a gift <small>(only new customers)</small></li>
                          <li><span class="fa fa-check text-success"></span>Holiday discounts up to 30% off</li>
                      </ul>
                      <div class="product-f-image">
                        <img src="img/tk.png">
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>
        </div>

<?php
$list = DB::getInstance()->query("SELECT * FROM cart");

?>

      <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                      <a href="clear.php"><span class="cart-amunt">Clear</span></a>
                    </div>
                    <div class="shopping-item">
                        <a href="order.php">Cart - <span class="cart-amunt"><?php echo "Rs. ".$u;?></span> <i class="fa fa-shopping-cart"></i><span class="product-count"><?php echo $list->count();?></span></a>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
<style type="text/css">
.alrt{
  padding-left: 60px;
  padding-right: 60px;
}
</style>
    <div class="alrt">
      <?php
if(Session::exists('success')){
    echo '<div class="alert alert-success">
  <strong>Success!</strong> '.Session::flash('success').'
</div>';
}
if(Session::exists('error')){
    echo '<div class="alert alert-warning">
  <strong>Warning!</strong> '.Session::flash('error').'
</div>';
}
?>
    </div>

    <div class="container-fluid">
      <div class="content">
        <div class="form-wrapper">
            <!--toggle sidebar button-->
            <p class="visible-xs">
               <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
            </p>

              <div class="slider-area">
          <!-- Slider -->
                <div class="block-slider block-slider4">
                  <ul class="" id="bxslider-home4">
                    <li>
                      <img src="img/h4-slide.png" alt="Slide">
                      <div class="caption-group">
                        <h2 class="caption title">
                          Chemi C432-B <span class="primary">6 <strong>Plus</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Dual Hammer</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                      </div>
                    </li>
                    <li><img src="img/h4-slide2.png" alt="Slide">
                      <div class="caption-group">
                        <h2 class="caption title">
                          by one, get one <span class="primary">50% <strong>off</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Factory supplies & dilevery.*</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                      </div>
                    </li>
                    <li><img src="img/h4-slide3.png" alt="Slide">
                      <div class="caption-group">
                        <h2 class="caption title">
                          Beens <span class="primary">KI <strong>73Y-T</strong></span>
                        </h2>
                        <h4 class="caption subtitle">Select Item</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                      </div>
                    </li>
                    <li><img src="img/h4-slide4.png" alt="Slide">
                      <div class="caption-group">
                        <h2 class="caption title">
                          PH-94 <span class="primary">Store <strong>KD300</strong></span>
                        </h2>
                        <h4 class="TIkale map">& Home Pack</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                      </div> 
                    </li>
                  </ul>
                </div>
                <!-- ./Slider -->
              </div> <!-- End slider area -->

              <div class="maincontent-area">
            <div class="zigzag-bottom"></div>
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="latest-product">
                              <h2 class="section-title">Latest Products</h2>
                              <div class="product-carousel">
 <?php $list = DB::getInstance()->query("SELECT * FROM products");
            if(!$list->count()){
                echo 'There is no user to Activate or diactivate';
            }else{
                foreach ($list->results() as $name){?>
                                  <div class="single-product">
                                      <div class="product-f-image">
                                          <img src="<?php echo $name->image?>" alt="">
                                          <div class="product-hover">
                                            <?php if($user->isLoggedIn()){
                                            echo '<a href="cart.php?id='.$name->product_id.'" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>';
                                          }else{
                                              echo '<a href="" data-toggle="modal" data-target="#signup" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>';
                                            }
                                              ?>
                                              <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                          </div>
                                      </div>
                                      
                                      <h2><a href="single-product.html"><?php echo $name->p_name?></a></h2>
                                      
                                      <div class="product-carousel-price">
                                          <ins>Rs. <?php echo $name->cost?></ins> <del>Rs. 100.00</del>
                                      </div> 
                                  </div>
<?php }}?>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div> <!-- End main content area -->
          
            <!--/row-->
        </div>
      </div>
  </div>
  <style type="text/css">
      .social:hover {
     -webkit-transform: scale(1.1);
     -moz-transform: scale(1.1);
     -o-transform: scale(1.1);
 }
 .social {
     -webkit-transform: scale(0.8);
     /* Browser Variations: */
     
     -moz-transform: scale(0.8);
     -o-transform: scale(0.8);
     -webkit-transition-duration: 0.5s;
     -moz-transition-duration: 0.5s;
     -o-transition-duration: 0.5s;
 }

/*
    Multicoloured Hover Variations
*/
 
 #social-fb:hover {
     color: #3B5998;
 }
 #social-tw:hover {
     color: #4099FF;
 }
 #social-gp:hover {
     color: #d34836;
 }
 #social-em:hover {
     color: #f39c12;
 }
  </style>
      <!--/.container-->
      <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="pull-right">
                    <div class="copyright">
                        <p>&copy; 2015 4it All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">Thusitha Thiyushan</a></p>
                    </div>
                </div>
                <div class="pull-left">
                   <p>
                    <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social"></i></a>
                    <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social"></i></a>
                    <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social"></i></a>
                    <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
                   </p>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
      <!-- Latest jQuery form server -->
      <script src="js/jquery.min.js"></script>
      <!-- jQuery sticky menu -->
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.sticky.js"></script>
      
      <!-- jQuery easing -->
      <script src="js/jquery.easing.1.3.min.js"></script>
      
      <!-- Main Script -->
      <script src="js/main.js"></script>
      
      <!-- Slider -->
      <script type="text/javascript" src="js/bxslider.min.js"></script>
      <script type="text/javascript" src="js/script.slider.js"></script>
      <!--scripts loaded here-->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script>
   </body>
</html>