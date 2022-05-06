<?php
    
    session_start();
    if(!empty($_SESSION['category']=='admin')){
        //echo "hello ".$_SESSION['name'];
    }else{
        header('location: ../index.php');
    }

?>
<?php
            		
    				include("../connect.php"); 
    				$Atype = $_SESSION['category'];
                    $Aemail = $_SESSION['email'];
    				$query = "SELECT * FROM `users` WHERE category = 'admin' and email = '$Aemail'" ;
        			$result = $conn->query($query);
        			$row = mysqli_fetch_assoc($result);
        			$Aname = $row['username'];
        			$Acontact = $row['contact_no'];
        			$Aemail = $row['email'];
        			$Atype = $row['category'];

            	?>
<html>
	<head>
		<title>Admin : Home</title>
		<link rel="stylesheet" type="text/css" href='style.css'>

	</head>
	<body>
		<div class="container">

		<h1 class="banner"> TOURIST GUIDE </h1>

		<nav class="menu">

            
                 <ul>

                        <li > <a href="../admin/admin_home.php"> Home </a></li>
                        <li > <a href="../admin/admin_user_list.php"> List of Users </a></li>
                        <li > <a href="../admin/confirm_booking.php"> Booking Requests </a></li>
                        <li id = "current"> <a href="../admin/edit_profile.php"> Edit Profile </a></li>
                        <li > <a href="../admin/add_new_admin.php"> Add an admin </a></li>
                        <li> <a href="../logout.php"> Log Out </a></li>
                        

                    </ul>
                
            </nav>
		<section class="sec">

			<form action="" method="POST">
				<input type="submit" name="updt_name" value="Update Your Name" >
			
			<?php
			include("../connect.php"); 
		if(isset($_POST['updt_name'])){
			echo "<form action='' method='POST'>" ;
              echo "  <input id='srhBox' type='text' name = 'user_input' placeholder='$Aname' required >";
               echo " <input id='u_btn' type='submit'  name ='edt_name' value='Edit' >";
                
           echo " </form>";
           //echo $Aemail;
           

		}



		?>
		<?php

			if(isset($_POST['edt_name'])){
            	echo $_POST['user_input'];
            	$newName = $_POST['user_input'];
            	//echo $Aemail;
                $sql = "UPDATE `users` SET `username`= '$newName' WHERE `email` = '$Aemail'";

                $res = $conn->query($sql);
                    mysqli_close($conn);
                    if(!$res) {
                        // echo "<script>
                        //         alert('Booking Accepted for '".$_POST['accept_email']."');
                        //         window.location.href='confirm_booking.php';
                        //     </script>";
                    }
                    else{
                        echo "<script>
                                alert(' User name updated ');
                                window.location.href='edit_profile.php';
                            </script>";    
                    }

            }

		?>
		</form>
			<form action="" method="POST">
				<input type="submit" name="updt_email" value="Update Your Email" >
				<?php
			include("../connect.php"); 
		if(isset($_POST['updt_email'])){
			echo "<form action='' method='POST'>" ;
              echo "  <input id='srhBox' type='text' name = 'user_input' placeholder='$Aemail' required >";
               echo " <input id='u_btn' type='submit'  name ='edt_email' value='Edit' >";
                
           echo " </form>";
          // echo $Aemail;
           

		}



		?>
		<?php

			if(isset($_POST['edt_email'])){
            	echo $_POST['user_input'];
            	$newEmail = $_POST['user_input'];
            	//echo $Aemail;
                $sql = "UPDATE `users` SET `email`= '$newEmail' WHERE `email` = '$Aemail'";
                //session_start();
                $_SESSION['email'] = $newEmail;
                $res = $conn->query($sql);
                    mysqli_close($conn);
                    if(!$res) {
                        // echo "<script>
                        //         alert('Booking Accepted for '".$_POST['accept_email']."');
                        //         window.location.href='confirm_booking.php';
                        //     </script>";
                    }
                    else{
                        echo "<script>
                                alert(' Email updated ');
                                window.location.href='edit_profile.php';
                            </script>";    
                    }

            }

		?>

				</form>
				<form action="" method="POST">
				<input type="submit" name="updt_pass" value="Update Your password" >
				<?php
			include("../connect.php"); 
		if(isset($_POST['updt_pass'])){
			echo "<form action='' method='POST'>" ;
              echo "  <input id='srhBox' type='text' name = 'user_input' placeholder='Enter new password' required >";
               echo " <input id='u_btn' type='submit'  name ='edt_pass' value='Edit' >";
                
           echo " </form>";
          // echo $Aemail;
           

		}



		?>
		<?php

			if(isset($_POST['edt_pass'])){
            	echo $_POST['user_input'];
            	$newPass = md5($_POST['user_input']);
            	//echo $Aemail;
                $sql = "UPDATE `users` SET `password`= '$newPass' WHERE `email` = '$Aemail'";

                $res = $conn->query($sql);
                    mysqli_close($conn);
                    if(!$res) {
                        // echo "<script>
                        //         alert('Booking Accepted for '".$_POST['accept_email']."');
                        //         window.location.href='confirm_booking.php';
                        //     </script>";
                    }
                    else{
                        echo "<script>
                                alert(' Password updated ');
                                window.location.href='edit_profile.php';
                            </script>";    
                    }

            }

		?>
				</form>
				<form action="" method="POST">
				<input type="submit" name="updt_cnt_no" value="Update Your Contact No." >
				<?php
			include("../connect.php"); 
		if(isset($_POST['updt_cnt_no'])){
			echo "<form action='' method='POST'>" ;
              echo "  <input id='srhBox' type='text' name = 'user_input' placeholder='$Acontact' required >";
               echo " <input id='u_btn' type='submit'  name ='edt_c_n' value='Edit' >";
                
           echo " </form>";
           //echo $Aemail;
           

		}



		?>
		<?php

			if(isset($_POST['edt_c_n'])){
            	echo $_POST['user_input'];
            	$newCN = $_POST['user_input'];
            	//echo $Aemail;
                $sql = "UPDATE `users` SET `contact_no`= '$newCN' WHERE `email` = '$Aemail'";

                $res = $conn->query($sql);
                    mysqli_close($conn);
                    if(!$res) {
                        // echo "<script>
                        //         alert('Booking Accepted for '".$_POST['accept_email']."');
                        //         window.location.href='confirm_booking.php';
                        //     </script>";
                    }
                    else{
                        echo "<script>
                                alert(' Contact no. updated ');
                                window.location.href='edit_profile.php';
                            </script>";    
                    }

            }

		?>
				</form>


			</form>
			
               
		</section>
		

		<!-- <div id="a1">
		<a href="../include/logout.php">Logout</a>
		</div> -->
		</div>
	</body>
</html>