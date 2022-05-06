<?php include_once("connection.php"); ?>
<?php 
session_start();
if (!isset($_SESSION['user_id'])) 
    {
      header('Location: index.php');
      exit;
  	}
  ?>

  <html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/w3.css">
        <title></title>
    </head>
    <style> 
        .bgimg {
    background-image:url('./image/brown2.jpg');
    background-size: 103% 1500px;
    background-repeat: no-repeat;
               }
    .font {
    font-family: "Comic Sans MS", cursive, sans-serif;
    }
    
    .mar1{
        margin-left: 5%;
    }
    .mar2{
        margin-top: 2%;
    }
    .mar3{
    	margin-left:25%;
    }

     </style>
    <body class="bgimg">
        <ul class="w3-navbar w3-black">
        <li><a class="w3-text-blue" href="#"><?php echo $_SESSION['user_name'];?></a></li>
            
        <li><a href="update.php">Edit Profile</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">History</a></li>
        <li class="w3-right w3-teal"><a href="logout.php">Log Out</a></li>
    </ul>

    <div class="w3-card-4 w3-light-grey w3-half mar2 mar3">
              <div class="w3-container w3-green">
                <h2> Update Information </h2>
              </div>
                <form class="w3-container" action="" method="post">
                        <p>     
                        <label class="w3-label w3-text-black"><i><b>User Name</i></b></label>
                        <input class="w3-input w3-border w3-sand" name="user_name" type="text" required></p>

                        <p>    
                        <label class="w3-label w3-text-black"><i><b>Password</b></i></label>
                        <input class="w3-input w3-border w3-sand" name="password" type="password" required></p>
                        <p>      
                        <label class="w3-label w3-text-black"><i><b>Phone Number</b></i></label>
                        <input class="w3-input w3-border w3-sand" name="phone" type="number" required=""></p>
                        <p>     
                        <label class="w3-label w3-text-black"><i><b>E-Mail</b></i></label>
                        <input class="w3-input w3-border w3-sand" name="mail" type="text" required=""></p>
                        <p>    
                        <label class="w3-label w3-text-black"><i><b>Address</b></i></label>
                        <input class="w3-input w3-border w3-sand" name="address" type="text" required></p>
                        
                        <p>    
                        <label class="w3-label w3-text-black"><i><b>Status</b></i></label>

                           <p>
                       <input class="w3-radio" type="radio" name="state" value="active" checked>
                           <label class="w3-validate w3-teal w3-text-black">Active</label></p>
                         <p>
                            <input class="w3-radio" type="radio" name="state" value="suspend">
                           <label class="w3-validate w3-red w3-text-black">Suspend</label></p>


                         <div class="w3-half"> 
                             <input type="submit" class="w3-btn w3-btn-block w3-green" name="submit" value="Update">

                        </div>
                         
              </form>

</body>


<!--
<html>
<head>
<title>
<?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1><?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error
. "</div>";
} ?>

<form action="" method="post">
<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>

<strong>First Name: *</strong> <input type="text" name="firstname"
value="<?php echo $first; ?>"/><br/>
<strong>Last Name: *</strong> <input type="text" name="lastname"
value="<?php echo $last; ?>"/>
<p>* required</p>
<input type="submit" name="submit" value="Submit" />
</div>
</form>
</body>
</html>
-->
<?php>

        <?php
         mysqli_close($conn);
        ?> 
</html>
        
