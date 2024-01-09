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
        
          <h5>(Name of a course should be unique for a institution)</h5> 
          <h5>(Course name should be like that: semester_coursename_section= Summer2022_CSE299_8)</h5>
          <h5>Name of your course:
          <input type="text" name="course" placeholder="put the name of ur course:"></h5>
       
          <h5>name of your institution:
         <input type="text" name="institution" placeholder="put name of your institution:"></h5>
         <h5> Your TGT ID:
         <input type="text" name="t_id" placeholder="put ur TGT ID:"></h5>
         <h5> Your Name in TGT:
         <input type="text" name="teacher_name" placeholder="put your name in TGT:"></h5><br><br>
         <input type="submit" class= "btn" name= "submit" id="submit" value="submit">
         

         </form>
       <?php 
       require_once "connectDB.php";
      
       
       if(isset($_POST['submit'])){
        $inst= $_POST['institution'];
        $t_ID= $_POST['t_id'];
        $t_name= $_POST['course'];
        $teacher_name=$_POST['teacher_name'];
        $sql="SELECT course_name, teacher_institution FROM courses WHERE course_name='$t_name' AND teacher_institution='$inst'";
               
        $rslt=$conn->query($sql);
        $result=mysqli_num_rows($rslt);

         if($result==0){     

              $table=" CREATE TABLE if not exists $t_name(
                Student_Serial INT NOT Null AUTO_INCREMENT,
                Student_Id INT (11),
                Student_Name varchar(150),
                Quiz_1 FLOAT(5),
                Quiz_2 FLOAT(5),
                Quiz_3 FLOAT(5),
                Quiz_4 FLOAT(5),
                Quiz_5 FLOAT(5),
                Quiz_6 FLOAT(5),
                Mid_1 FLOAT(5),
                Mid_2 FLOAT(5),
                Assignment_1 FLOAT(5),
                Assignment_2 FLOAT(5),
                Assigmnment_3 FLOAT(5),
                project_1 FLOAT(5),
                project_2 Float(3),
                Final Float(3),
                Total FLOAT(5),
                Grade VARCHAR(3),
                PRIMARY KEY (Student_Serial)
                )";
                if($conn->query($table)){
                  $stmt= "INSERT INTO courses (course_name, teacher_id, teacher_institution, teacher_name) VALUES ('$t_name', '$t_ID', '$inst', '$teacher_name')";
                   $conn->query($stmt);
                header("location: courseTea.php");
              }
              else
              header("location: courseTea.php");

                }
               
               else
               echo"<h6>This section of this course has alreadey been taken by someone from your institution</h6>";
              }
              
               
              
            
      
      

       ?>
       
       
       
       
        
    </div>
  </head>
</html>

