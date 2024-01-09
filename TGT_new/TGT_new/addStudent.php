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
            <li><a href="#">massege</a></li>
            <li><a href="logoutTea.php">logout</a></li>
            
        </ul>
    </div>
    <div class="main">
        <form class="form_a" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
        
          <h5>ADD NEW STUDENT</h5> 
          <h5>NAME of NEW STUDENT:
          <input type="text" name="name" placeholder="put student name:"></h5>
    
         <h5> Student's Institutional ID:
         <input type="text" name="student_id" placeholder="Put Student's ID:"></h5>
         <input type="submit" class= "btn" name= "submit" id="submit" value="submit">
         

         </form>
       <?php 
       require_once "connectDB.php";

       $coursename= $_GET['coursename'];
       $courseid=$_GET['courseid'];
      
       
       if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $Student_ID= $_POST['student_id'];
        

        $sql="SELECT * FROM $coursename WHERE Student_Id='$Student_ID' AND Student_Name='$name' ";
               
        $rslt=$conn->query($sql);
        $result=mysqli_num_rows($rslt);

         if($result==0){     
                
            $stmt= "INSERT INTO $coursename (Student_Id, Student_Name) VALUES ('$Student_ID', '$name')";
                   $conn->query($stmt);
              
            
                header("location:assignedCourse.php? courseid=$courseid");
              }
              else
              header("location: assignedCourse.php? courseid=$courseid");

                }      
      

       ?>
       
       
       
       
        
    </div>
  </head>
</html>

