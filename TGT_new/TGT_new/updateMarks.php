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
            <li><a href="#">Notifications</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">massege</a></li>
            <li><a href="logoutTea.php">logout</a></li>
            
        </ul>
    </div>
    <div class="main">
        <form class="form_a" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
        
          <h5>Update Column?:
          <input type="text" name="column_name" placeholder="put column name:"></h5>
    
        
         <input type="submit" class= "btn" name= "submit" id="submit" value="submit">
         

         </form>
       <?php 
       require_once "connectDB.php";

       $coursename= $_GET['coursename'];
       $courseid=$_GET['courseid'];

       
       if(isset($_POST['submit'])){
        $column_name= $_POST['column_name'];
       // $Student_ID= $_POST['student_id'];
        
  
          if($column_name=="Quiz_1" || $column_name=="Quiz_2" || $column_name=="Quiz_3" || $column_name=="Quiz_4" ||$column_name=="Quiz_5" || $column_name=="Quiz_6" || $column_name=="Mid_1" || $column_name=="Mid_2" ||$column_name=="Assignment_1" || $column_name=="Assignment_2" || $column_name=="Assignment_3" || $column_name=="Quiz_1" || $column_name=="Quiz_1" || $column_name=="Quiz_1" ||  $column_name=="Mid_1" || $column_name=="Mid_2" ||$column_name=="Assignment_1" || $column_name=="Assignment_2" || $column_name=="Assignment_3" || $column_name=="project_1" || $column_name=="project_2" || $column_name=="Final" || $column_name=="Total"|| $column_name=="Grade" ){
            header("location:updateSection.php? courseid=$courseid & coursename=$coursename & column_name= $column_name");
          }
       else
           echo "<h1>Wrong column name</h1>";

      /* }
       else
         //header("location:updateSection.php? courseid=$courseid & coursename=$coursename & column_name= $column_name");
        { echo "<h1>You Put the Wrong column name</h1>";}*/
              }
              echo "<h1><button><a href='assignedCourse.php? courseid=$courseid & coursename=$coursename'>Go back</a> </button></h1>";                
     

       ?>
       
       
       
       
        
    </div>
  </head>
</html>

