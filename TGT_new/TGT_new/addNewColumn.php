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
        
          <h5>ADD NEW COLUMN</h5> 
          <h5>Column name should be like that: quiz, quiz1, midterm final; <br> No (_) underscore or special charecters will be allowed </h5> 
          <h5>NAME of NEW COLUMN:
          <input type="text" name="name_column" placeholder="put column name:"></h5>
         <h5> How much percentage of total will it carry?:
         <input type="text" name="percent" placeholder="how much percentage:">%</h5>
         <input type="submit" class= "btn" name= "ADD_COLUMN" id="ADD_COLUMN" value="ADD_COLUMN">
         

         </form>
       <?php 
       require_once "connectDB.php";

       $coursename= $_GET['coursename'];
       $courseid=$_GET['courseid'];
      
       
       if(isset($_POST['ADD_COLUMN'])){
        $name_column= $_POST['name_column'];
        $percent= $_POST['percent'];

        $f_name= $name_column."_".$percent;
        

       // $sql="ALTER TABLE  '$coursename' ADD '$name_column' INT(3)";
               
        $rslt=mysqli_query($conn, "ALTER TABLE $coursename ADD 'quiz' INT(3)");

         if($rslt){          
                header("location:assignedCourse.php? courseid=$courseid");
              }
              else
              header("location: assignedCourse.php? courseid=$courseid");

                }
      ?>                    
        
    </div>
  </head>
</html>

