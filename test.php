
<?php include_once("connection.php"); ?>
<?php 
session_start();
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: index.php');
      exit;
  	}
 if (!isset($_SESSION['course'])) 
    {
      header('Location: userhome.php');
      exit;
  	}       
        
$_SESSION['start_time']=time();
$_SESSION['random']=rand(1000, 5000);


date_default_timezone_set('Asia/Dhaka');
$_SESSION['date']= date('m/d/y h:i:s a',time());
//echo $_SESSION['date'];
    

//echo $_SESSION['start_time'];
?>
<?php
if(isset($_POST['submit'])){
    $test_id=$_SESSION['random'];
    $id = $_SESSION['user_id'];
    $datentime=$_SESSION['date'];
    
    $user_answer1="";
    $user_answer2="";
    $user_answer3="";
    $user_answer4="";
    $user_answer5="";
    $user_answer6="";
    $user_answer7="";
    $user_answer8="";
    $user_answer9="";
    $user_answer10="";
    
    
    $user_answer1 = $_POST['1'];
    $user_answer2 = $_POST['2'];  
    $user_answer3 = $_POST['3'];  
    $user_answer4 = $_POST['4'];  
    $user_answer5 = $_POST['5'];  
    $user_answer6 = $_POST['6'];  
    $user_answer7 = $_POST['7'];  
    $user_answer8 = $_POST['8'];  
    $user_answer9 = $_POST['9']; 
    $user_answer10 = $_POST['10'];
    
    $t_ans1=$_POST['50'];
    $t_ans2=$_POST['51'];
    $t_ans3=$_POST['52'];
    $t_ans4=$_POST['53'];
    $t_ans5=$_POST['54'];
    $t_ans6=$_POST['55'];
    $t_ans7=$_POST['56'];
    $t_ans8=$_POST['57'];
    $t_ans9=$_POST['58'];
    $t_ans10=$_POST['59'];
   
        $sql = "INSERT INTO result (test_id, user_id, q_id, q_iq2, q_iq3, q_iq4, q_iq5, q_iq6, q_iq7, q_iq8, q_iq9, q_iq10, user_answer1, user_answer2, user_answer3, user_answer4, user_answer5, user_answer6, user_answer7, user_answer8, user_answer9, user_answer10,time)
	VALUES ('".$test_id."','".$id."','".$t_ans1."','".$t_ans2."','".$t_ans3."','".$t_ans4."','".$t_ans5."','".$t_ans6."','".$t_ans7."','".$t_ans8."','".$t_ans9."','".$t_ans10."','".$user_answer1."','".$user_answer2."','".$user_answer3."','".$user_answer4."',
  '".$user_answer5."','".$user_answer6."','".$user_answer7."','".$user_answer8."','".$user_answer9."','".$user_answer10."','".$datentime."')";

				if (mysqli_query($conn, $sql)) {
				     //$succ = "New record created successfully";
                                     header('Location: result.php');
                                     exit;
				} else {
				    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
  <title>Online Quiz - Test</title>
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
  <link rel="stylesheet" href="styles/w3.css">
  <script type="text/javascript">
              $('document').ready( function() {
    $('input').on('click', function(){
        $('input').attr('disabled',false);
        
        setTimeout("$('input').attr('disabled',true);", 120000);
    });    
});
            </script>
   <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
        window.onbeforeunload = function() { return "Your work will be lost."; };
</script>         
</head>

<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
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
              <a href="logout.php" target="" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="ni ni-active-40"></i>
                </span>
                <span class="nav-link-inner--text">Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="position-relative">
      <section class="section section-lg section-shaped pb-200">
        <div class="shape shape-style-1 shape-primary alpha-4 ">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <h1 class="display-2  text-white">Online Programming Quiz
                  <small><span>complete the task within time</span>
                  </small>
                </h1>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
    </div>
         <section class="section section-lg pt-lg-0 mt--200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6">
            <div class="row row-grid">
              
              <div class="col-sm-12">
                <div class="card card-lift--hover shadow border-0">
                  <div class="card-body py-5">
                    <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 text-center">
                <h5 class="display-5 text-danger"><strong>Test ID: 
            <?php 
            $sql = "SELECT id FROM `result` ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
            {       $r=$row["id"]+1;
            $_SESSION['testid']=$r;
                   echo $r; 
                }
            }
        ?></strong>
        </h5>
              <h5 class="display-5 text-success"><strong>Course ID: <?php echo $_GET['id'] ; ?></strong></h5>
    <h5 class="display-5"><strong>Difficulty: <?php echo $_GET['name']; ?></strong></h5> 
              <?php $diff=$_GET['name']; ?>
                     
                         </div>
                       </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section section-lg">
      <div class="container">
        <div class="row justify-content-center text-center mb-lg">
                    <form method="post">
    <div style="margin-top:10px">
            <script type="text/javascript">
                function  countDown(secs,elem)
                {
                    var element=document.getElementById(elem);
                    element.innerHTML="Remaining time : <strong>"+secs+" </strong>seconds";
                    element.innerHTML+="<div class='container'></div>";
                    //element.innerHTML+='<a class="w3-btn w3-teal w3-text-while" href="result.php">Submit answer</a>'
                    element.innerHTML+='<div class="text-center"><button type="submit" class="btn btn-wrapper bg-green text-white" name="submit" value="">Submit Answer</button></div>'
                    //element.innerHTML+='<a class="w3-btn" href="result.php">View Result</a>';
                    if(secs<1)
                    {
                        clearTimeout(timer);
                        element.innerHTML='<h2 class="text-danger"><strong>Time Up!!!</strong><div>Better Luck Next Time...</div></h2>';
                        //element.innerHTML='<h2 class="text-primary">Better Luck Next Time...</h2>';
                        //element.innerHTML+='<a href="result.php"><button class="w3-btn w3-teal w3-text-while">View Result</button></a>';
                        //element.innerHTML+='<div class="text-center"><button type="submit" class="btn btn-wrapper bg-warning" name="submit" value="">Submit Answer</button></div>';
                       // element.innerHTML+='<a class="w3-btn" href="result.php">View Result</a>';
                        
                    }
                    secs--;
                    var timer= setTimeout('countDown('+secs+',"'+elem+'")',1000);
                }
            </script>
            <h3><div id="status" class="text-center text-danger"></div></h3>
            <script type="text/javascript">countDown(120,"status")</script>
        </div>
        
        
        
       <div class="position-relative">
            <?php
            $i=1;
            $a=50;
            $aka="";
            $showw="0";
            $idd=$_GET['id'];
            $dif=$_GET['name'];
        $ssql ="Select * FROM question";
        $count=mysqli_query($conn,$ssql);
        $c=mysqli_num_rows($count);
        $rand=rand(1, $c)-95;
        $sssql="SELECT * FROM question WHERE course_id='$idd' AND q_id > '$rand' AND difficulty='$dif' LIMIT 10";
        $get=mysqli_query($conn,$sssql);
        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
            {
           // echo $show["q_id"];
            echo "<div class='w3-panel'>";
            echo "<input type='hidden' name='$a' value='".$show["q_id"]."'>";
            
            echo "<h5 class='w3-panel bg-gradient-primary w3-round-xlarge'><strong class='text-white'>".$i.". ".$show["q_desc"]."</strong></h5>";
            echo "<br>"; 
            echo "<strong><input class='form-check-input' type='radio' name='$i' value='".$show["ans1"]."'</strong>";
            echo $show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
            echo  "<input class='form-check-input' type='radio' name='$i' value='".$show["ans2"]."'>";
            echo $show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp;";
            echo  "<input class='form-check-input' type='radio' name='$i' value='".$show["ans3"]."'>";
            echo $show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
            echo  "<input class='form-check-input' type='radio' name='$i' value='".$show["ans4"]."'>";
            echo $show["ans4"];
            echo "<br>";
             $a++;
             echo "<br>";
               $i++;
               echo "<br>";
                echo "</div>";
                 
           }
           endwhile;
            ?>
            
        </div>
       
       </form>
               
               </div>
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