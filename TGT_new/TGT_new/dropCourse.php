<?php 
       session_start();
       $id=$_SESSION['id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" comntent="It's a Teacher's grading Tool">
  <meta name="keywords" comntent="TGT, grading tool, virtual marksheet">
  <link rel="shortcut icon" href="Tgt.ico" type="image/x-icon">
  <title>TGT</title>
  <link rel="stylesheet" href="CSS/dashboard.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
</head>

<div class="header"><h3>TGT</h3>                    
                    <h4>Teacher Dashboard</h4>
</div>
<!-- <div class="header"><h4>Teacher Dashboard</h4></div> -->
    <input type="checkbox" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIconToggle">
        <div class="spinner top"></div>
        <div class="spinner middle"></div>
        <div class="spinner bottom"></div>
    </label>
    <div id="sidebarMenu">
        <ul class="menu">
            <li><a href="dashboardTea.php">Home</a></li>
            <li><a href="courseTea.php">Courses</a></li>
            
            <li><a href="#">messege</a></li>
            <li><a href="logoutTea.php">logout</a></li>
            
        </ul>
    </div>
    <div class="main">
        <form class="form_a" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
        
         <h5>DROP TABLE</h5> 
    
         <h5> Column Name:
         <input type="text" name="table_name" placeholder="Put the course name"></h5>
         <input type="submit" class= "btn" name= "Remove" id="DROP" value="DROP">
         

         </form>
       <?php 
       require_once "connectDB.php";

     //  $coursename= $_GET['coursename'];
       $courseid=$_GET['courseid'];
      
       
       if(isset($_POST['Remove']) && !($coursename="") ){
        
       
            
            $sq="DELETE FROM courses WHERE courseid='$courseid' ";
          
            if( $rs=$conn->query($sq)){
             
              header("location:courseTea.php? courseid=$courseid");
        
              }
              else
              header("location: courseTea.php? courseid=$courseid");

                }
     

       ?>
              
    </div>
  </head>
</html>

