<?php include_once("connection.php"); ?>
<?php
session_start();
$_SESSION['correct']=0;
$_SESSION['wrong']=0;
$_SESSION['random'];


 if (!isset($_SESSION['user_id'])) {
      header('Location: index.php');
     exit;
  	}
$_SESSION['end_time']=time();

$rem=$_SESSION['end_time']-$_SESSION['start_time'];

if($rem>660)
{
	echo "Test has been terminated for cheating!";
	header('Location: index.php');
    exit;
}
//660*
 
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/w3.css">
        <title></title>
        <script type="text/javascript">
        window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
        window.onbeforeunload = function() { return "Your work will be lost."; };
</script>
    </head>
    <style> 
        .bgimg {
    background-image:url('./image/paper3.jpg');
    background-size: 103% 1900px;
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

     </style>
    <body class="bgimg" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
        <ul class="w3-navbar w3-black">
        <li><a class="w3-text-blue" href="#"><?php echo $_SESSION['user_name'];?></a></li>
            
        <li><a href="update.php">Edit Profile</a></li>
        <li><a href="#">News</a></li>
        <li><a href="#">History</a></li>
        <li class="w3-right w3-teal"><a href="logout.php">Log Out</a></li>
    </ul>
        
        <div class="w3-container w3-center">
            <h1 class=" w3-animate-left font">Test Details...</h1>
            <img src="./image/avatar2.png" width="4%">
        </div>
        <div class="w3-container w3-half">
             <?php
            $i=1;
            $uid=$_SESSION['user_id'];
            $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_id AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                        echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                        echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer1"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer1"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=2;
            //$uid=$_SESSION['user_id'];
              $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq2 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                        echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer2"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer2"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=3;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq3 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                        echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer3"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer3"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=4;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq4 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                       echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer4"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer4"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=5;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq5 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                       echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer5"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer5"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=6;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq6 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                       echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer6"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer6"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=7;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq7 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                       echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer7"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer7"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=8;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq8 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                        echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer8"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer8"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=9;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq9 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                        echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer9"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer9"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
            <?php
            $i=10;
            //$uid=$_SESSION['user_id'];
           // $teack=$_SESSION['random'];
                        $sql="SELECT * FROM question,result WHERE question.q_id=result.q_iq10 AND result.test_id='".$_SESSION['random']."'";
                        $get=mysqli_query($conn,$sql);
                        while($show=mysqli_fetch_array($get,MYSQLI_BOTH)):
                    {
            
                        
                        echo "<h5 class='w3-panel w3-blue w3-round-xlarge'>".$i.". ".$show["q_desc"]."</h5>";
                         
                         echo "(a)".$show["ans1"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(b)".$show["ans2"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(c)".$show["ans3"]; echo "&nbsp; &nbsp &nbsp; &nbsp";
                       
                        echo "(d)".$show["ans4"];
                        echo "<br>";
                       
                       echo '<strong class="w3-text-red">true answer: ';
                        echo $show["true_ans"].'</strong>';
                        echo "<br>";
                       
                        echo 'user answer: ';
                        echo $show["user_answer10"];
                        echo "<br>";

                         
                          echo "<br>"; 
                        if($show["true_ans"]==$show["user_answer10"])
                        {
                            $_SESSION['correct']=$_SESSION['correct']+1;
                        }
                        else
                        {
                           $_SESSION['wrong']=$_SESSION['wrong']+1; 
                        }
           }
           endwhile;
            ?>
        </div>
        <div class="w3-container w3-half">
            
            
            
            <h2 class="w3-container font"><?php echo $_SESSION['user_name']; ?></h2>
            <h4 class="w3-container font">Test ID: 
                <?php 
            $sql = "SELECT id FROM `result` ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
            {       $r=$row["id"];
                   echo $r; 
                }
            }
        ?>
            </h4>
            <h4 class="w3-container font">Test Date: <?php echo $_SESSION['date']; ?></h4>
            
            
            <h4 class="w3-container w3-panel w3-round-xlarge w3-green">
            <?php 
           echo 'correct answered :';
           echo $_SESSION['correct'];
           echo "<br>";
           ?></h4>
            <h4 class="w3-container w3-panel w3-round-xlarge w3-red">
               <?php
           echo 'wrong answered :';
           echo $_SESSION['wrong'];
           echo "<br>";
           ?>
                
                <?php
                if ($_SESSION['correct']==0) {

                     $_SESSION['pb']=0;
                                    }
                if($_SESSION['correct']==1)
                {
                    $_SESSION['pb']=10;
                }
                elseif($_SESSION['correct']==2)
                {
                    $_SESSION['pb']=20;
                }
                elseif($_SESSION['correct']==3)
                {
                    $_SESSION['pb']=30;
                }
                elseif($_SESSION['correct']==4)
                {
                    $_SESSION['pb']=40;
                }
                elseif($_SESSION['correct']==5)
                {
                    $_SESSION['pb']=50;
                }
                elseif($_SESSION['correct']==6)
                {
                    $_SESSION['pb']=60;
                }
                elseif($_SESSION['correct']==7)
                {
                    $_SESSION['pb']=70;
                }
                elseif($_SESSION['correct']==8)
                {
                    $_SESSION['pb']=80;
                }
                elseif($_SESSION['correct']==9)
                {
                    $_SESSION['pb']=90;
                }
                else
                {
                    $_SESSION['pb']=100;
                }
                ?>
                </h4>
            
                <div class="w3-progress-container">
                <div class="w3-progressbar w3-blue" style="width:<?php echo $_SESSION['pb'];?>%"></div>
                </div>
            <h3 class="w3-text-blue"><?php echo $_SESSION['pb'];?>% Mark</h3>
            
            <a class="w3-btn w3-btn-block" href="logout.php">take another test</a>
            
            
        </div>
            
       <?php
     mysqli_close($conn);
        ?>      
        
</body>
</html>

