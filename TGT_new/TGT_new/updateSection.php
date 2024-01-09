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
 
   <h5>Student Serial:
   <input type="text" name="student_serial" placeholder="put serial number:"></h5>
   <h5>Mark: 
   <input type='text' name='mark' placeholder='put mark:'> </h5>
  <input type="submit" class= "btn" name= "submit" id="insert" value="insert">
  
  </form>
<?php 
require_once "connectDB.php";

$coursename= $_GET['coursename'];
$courseid=$_GET['courseid'];
$column_name=$_GET['column_name'];


if(isset($_POST['submit'])){
 $student_serial= $_POST['student_serial'];
 //$Student_ID= $_POST['student_id'];
   
   
       
$sq="SELECT Student_Serial FROM $coursename where Student_Serial='$student_serial'";
$rslt=$conn->query($sq);
$rw=mysqli_num_rows($rslt);

    if($rw==1){
        $mark=$_POST['mark'];
        $sql="UPDATE $coursename SET $column_name='{$mark}' WHERE Student_Serial='{$student_serial}'";
        $conn->query($sql);
    }
    else echo"<h1>Student Serial doesn't exist</h1>";

$conn->close();
}

       
 echo "<h1><button><a href='updateMarks.php? courseid=$courseid & coursename=$coursename'>Go back</a> </button></h1>";          


?>





 
</div>
</head>
</html>


?>