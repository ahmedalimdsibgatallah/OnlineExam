<?php include_once("connection.php"); ?>
<?php
session_start();
	if (isset($_SESSION['user_id'])) 
  {
      header('Location: userhome.php');
      exit;
  }
?>

<?php
$errorMassage ="";
$succ = "";
$emailErr="";
$u_id="";
if(isset($_POST['submit'])){

		if (empty($_POST['user_name']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['mail']) || empty($_POST['address'])){

			$errorMassage='field is empty...!!!';
		}
                else{

                    $mail = $_POST['mail'];


			if (!filter_var($mail, FILTER_VALIDATE_EMAIL))
                                {
                                $emailErr = 'Invalid email format..!!';
                                }
                        else{
			$name = $_POST['user_name'];
      $password=$_POST['password'];
      $phone = $_POST['phone'];
			$address = $_POST['address'];
      $sex = $_POST['gender'];

      $sql_u = "SELECT * FROM user WHERE user_name= '$name' ";
      $sql_e = "SELECT * FROM user WHERE mail= '$mail'";
      $res_u = mysqli_query($conn, $sql_u) or die(mysqli_error($conn));
      $res_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));

      if (mysqli_num_rows($res_u) > 0) {
            $name_error = "Sorry... Username already taken..!!";
      }elseif (mysqli_num_rows($res_e) > 0) {
            $name_error = "Sorry... Email already taken..!!";
      }else{


			$sql = "INSERT INTO user (user_name, password, phone, mail, address,sex)
				VALUES ('".$name."','".$password."','".$phone."','".$mail."','".$address."','".$sex."')";

				if (mysqli_query($conn, $sql)) {
				     $succ = "Congrats...!!!New record created successfully..!!";
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
                        }
                      }
                    }
                  }
?>
<?php
    if(isset($_POST['submit1'])){

		if (empty($_POST['user_name1']) || empty($_POST['password1'])){

			$errorMassage='field is empty...!!! ';
		}
                else
                {   $user_name=$_POST['user_name1'];
                    $pass = $_POST['password1'];

      			$sql = " SELECT COUNT(*) FROM user WHERE( user_name='".$user_name."' AND password='".$pass."') ";

				$qury = mysqli_query($conn, $sql);

				$result = mysqli_fetch_array($qury);

				if($result[0]>0)
                                {
                                        $sessionSql = " SELECT user_id,user_name,password FROM user WHERE ( user_name='".$user_name."' AND password='".$pass."') ";
					$sessionQury = mysqli_query($conn, $sessionSql);
					while($sessionResult = mysqli_fetch_array($sessionQury, MYSQLI_BOTH)){
						 $u_id = $sessionResult['user_id'];
						 $u_name = $sessionResult['user_name'];
					}
					$_SESSION['user_id'] = $u_id;
					$_SESSION['user_name'] = $u_name;

					header('location: userhome.php');
					exit;
                                    }
                                    else
                                    {
                                            $errorMassage=' Invalid User Name or Password...!!! ';
                                    }
                                }
                }

?>

<!DOCTYPE html>
<html lang="eng">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!--<meta name="author" content="Creative Tim">-->
  <title>Online Quiz - Home</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="./assets/css/docs.min.css" rel="stylesheet">
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="#">
          <img src="./assets/img/brand/online-quiz.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="./index.html">
                  <img src="./assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">Home</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Tests</span>
              </a>
              <div class="dropdown-menu dropdown-menu-xl">
                <div class="dropdown-menu-inner">
                  <a href="#" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                      <i class="ni ni-spaceship"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Take a test</h6>
                      <p class="description d-none d-md-inline-block mb-0">Learn how to use giva a test.</p>
                    </div>
                  </a>
                  <a href="#" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                      <i class="ni ni-palette"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h6 class="heading text-primary mb-md-1">Sample Questions</h6>
                      <p class="description d-none d-md-inline-block mb-0">See the question pattern</p>
                    </div>
                  </a>
                  <a href="#" class="media d-flex align-items-center">
                    <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                      <i class="ni ni-ui-04"></i>
                    </div>
                    <div class="media-body ml-3">
                      <h5 class="heading text-warning mb-md-1">F.A.Q.</h5>
                      <p class="description d-none d-md-inline-block mb-0">Ask us anything..!!</p>
                    </div>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a href="https://bd.linkedin.com/in/samin-yeasar-67a380151" class="nav-link" target="_blank">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">About</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">Others</span>
              </a>
              <!--<div class="dropdown-menu">
                <a href="./examples/landing.html" class="dropdown-item">Landing</a>
                <a href="./examples/profile.html" class="dropdown-item">Profile</a>
                <a href="./examples/login.html" class="dropdown-item">Login</a>
                <a href="./examples/register.html" class="dropdown-item">Register</a>
              </div>-->
            </li>
          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://www.facebook.com/saminyeasar2" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                <i class="fa fa-facebook-square"></i>
                <span class="nav-link-inner--text d-lg-none">Facebook</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#" target="" data-toggle="tooltip" title="Follow us on Instagram">
                <i class="fa fa-instagram"></i>
                <span class="nav-link-inner--text d-lg-none">Instagram</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#" target="" data-toggle="tooltip" title="Follow us on Twitter">
                <i class="fa fa-twitter-square"></i>
                <span class="nav-link-inner--text d-lg-none">Twitter</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="https://github.com" target="_blank" data-toggle="tooltip" title="Star us on Github">
                <i class="fa fa-github"></i>
                <span class="nav-link-inner--text d-lg-none">Github</span>
              </a>
            </li>
            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a href="admin.php" target="" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="ni ni-active-40"></i>
                </span>
                <span class="nav-link-inner--text">Admin</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="position-relative">
      <!-- Hero for FREE version -->
      <section class="section section-lg section-hero section-shaped">
        <!-- Background circles -->
        <div class="shape shape-style-1 shape-primary">
          <span class="span-150"></span>
          <span class="span-50"></span>
          <span class="span-50"></span>
          <span class="span-75"></span>
          <span class="span-100"></span>
          <span class="span-75"></span>
          <span class="span-50"></span>
          <span class="span-100"></span>
          <span class="span-50"></span>
          <span class="span-100"></span>
        </div>
        <div class="container shape-container d-flex align-items-center py-lg">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <!--<img src="./assets/img/brand/online-quiz.png" style="width: 200px;" class="img-fluid">-->
                <h1 class="display-1 text-white">Online Programming Quiz</h1>
                <p class="lead text-white">Take yourself towards the infinity programming world by testing in a systamatic way</p>
                <div class="btn-wrapper mt-5">
                  <a href="#" class="btn btn-lg btn-white btn-icon mb-3 mb-sm-0" data-toggle="modal" data-target="#modal-form">
                    <span class="btn-inner--icon"><i class="fa fa-sign-in"></i></span>
                    <span class="btn-inner--text">Log In</span>
                  </a>
                  <a href="#" class="btn btn-lg btn-github btn-icon mb-3 mb-sm-0" target="" data-toggle="modal" data-target="#modal-form1">
                    <span class="btn-inner--icon"><i class="fa fa-user-plus"></i></span>
                    <span class="btn-inner--text">
                      <span class="text-warning">Sign Up</span> </span>
                  </a>
                </div>


                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
                      <div class="card-header bg-white pb-5">
                        <div class="text-muted text-center mb-3">
                          <small>Sign in with</small>
                        </div>
                        <div class="btn-wrapper text-center">
                          <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                              <img src="./assets/img/icons/common/github.svg">
                            </span>
                            <span class="btn-inner--text">Github</span>
                          </a>
                          <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                              <img src="./assets/img/icons/common/google.svg">
                            </span>
                            <span class="btn-inner--text">Google</span>
                          </a>
                        </div>
                      </div>
                      <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                          <small>Or sign in with credentials</small>
                        </div>
                        <form role="form" action="" method="post">
                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                              </div>
                              <input class="form-control" placeholder="User Name" type="text" name="user_name1">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                              </div>
                              <input class="form-control" placeholder="Password" type="password" name="password1">
                            </div>
                          </div>
                          <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                            <label class="custom-control-label" for=" customCheckLogin">
                              <span>Remember me</span>
                            </label>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4" name="submit1">Sign in</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


               <div class="modal fade" id="modal-form1" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
              <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <div class="card bg-secondary shadow border-0">
                      <div class="card-header bg-white pb-5">
                        <div class="text-muted text-center mb-3">
                          <small>Sign Up with</small>
                        </div>
                        <div class="btn-wrapper text-center">
                          <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                              <img src="./assets/img/icons/common/github.svg">
                            </span>
                            <span class="btn-inner--text">Github</span>
                          </a>
                          <a href="#" class="btn btn-neutral btn-icon">
                            <span class="btn-inner--icon">
                              <img src="./assets/img/icons/common/google.svg">
                            </span>
                            <span class="btn-inner--text">Google</span>
                          </a>
                        </div>
                      </div>
                      <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                          <small>Or sign in with credentials</small>
                        </div>
                        <form role="form" action="" method="post">
                          <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                              </div>
                              <input class="form-control" placeholder="User Name" type="text" name="user_name">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                              </div>
                              <input class="form-control" placeholder="Password" type="password" name="password">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                              </div>
                              <input class="form-control" placeholder="Phone no." type="number" name="phone">
                            </div>
                          </div>
                            <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                              </div>
                              <input class="form-control" placeholder="E-mail" type="email" name="mail">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                              </div>
                              <input class="form-control" placeholder="Address" type="text" name="address">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group input-group-alternative">
                              <div class="input-group-prepend">
                                 <div class="form-check-inline">
                                     <label class="form-check-label" for="radio1">
                                        &nbsp;&nbsp;&nbsp;<input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>
                                        Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     </label>
                                  </div>
                                <div class="form-check-inline">
                                     <label class="form-check-label" for="radio2">
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="form-check-input" id="radio2" name="gender" value="female">Female
                                     </label>
                                  </div>
                            </div>
                          </div>
                        </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4" name="submit">Create</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <h3><?php echo $errorMassage; ?></h3>
            <h3><?php echo $succ; ?></h3>
            <h3><?php echo $emailErr; ?></h3>
            </div>

            <?php
               mysqli_close($conn);
             ?> 
                <div class="mt-5">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
            <div class="container text-white text-lg-center">
                  <span>
                    <h3 class="text-info"><?php echo $errorMassage; ?></h3>
                    <h3 class="text-success"><?php echo $succ; ?></h3>
                    <h3 class="text-info"><?php echo $emailErr; ?></h3>
                    <h3 class="text-info"><?php
                        if (isset($name_error)) {
                          echo "$name_error";
                        }
                    ?></h3>
                  </span>         
                  </div>
               
      </section>
    </div>
      
      <section class="section">
        <div class="container text-lg-center">
                            
                    </div>

      </section>

    
  </main>
  <footer class="footer has-cards">
    <div class="container container-lg">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <div class="card card-lift--hover shadow border-0">
            
          </div>
        </div>
        <div class="col-md-6 mb-5 mb-lg-0">
          <div class="card card-lift--hover shadow border-0">
            
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2">Thank's for being with us!</h3>
          <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
        </div>
        <div class="col-lg-6 text-lg-center btn-wrapper">
          <a target="" href="#" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow us">
            <i class="fa fa-twitter"></i>
          </a>
          <a target="" href="#" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
            <i class="fa fa-facebook-square"></i>
          </a>
          <a target="" href="#" class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip" data-original-title="Follow us">
            <i class="fa fa-dribbble"></i>
          </a>
          <a target="" href="#" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Star on Github">
            <i class="fa fa-github"></i>
          </a>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy;
            <a href="https://bd.linkedin.com/in/samin-yeasar-67a380151" target="_blank">Samin</a>.
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav nav-footer justify-content-end">
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">Blog</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Core -->
  <script src="./assets/vendor/jquery/jquery.min.js"></script>
  <script src="./assets/vendor/popper/popper.min.js"></script>
  <script src="./assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="./assets/vendor/headroom/headroom.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/onscreen/onscreen.min.js"></script>
  <script src="./assets/vendor/nouislider/js/nouislider.min.js"></script>
  <script src="./assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.1"></script>
</body>

</html>