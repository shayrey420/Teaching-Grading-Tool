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
        
          <h5>PUT THE RANGE of GRADES <br></h5> 
          <h5>A+ Lower Range:
          <input type="text" name="A_plus_L" placeholder="A+ start from" >to</h5>
          <h5>A+ Upper Range:
          <input type="text" name="A_plus_U" placeholder="A+ end at" >marks</h5>
          <h5>A Lower Range:
          <input type="text" name="A_L" placeholder="A start from" >to</h5>
          <h5>A Upper Range:
          <input type="text" name="A_U" placeholder="A end at" >marks</h5>
          <h5>A- Lower Range:
          <input type="text" name="A_minus_L" placeholder="A- start from" >to</h5>
          <h5>A- Upper Range:
          <input type="text" name="A_minus_U" placeholder="A- end at" >marks</h5>
          <h5>B+ Lower Range:
          <input type="text" name="B_plus_L" placeholder="B+ start from" >to</h5>
          <h5>B+ Upper Range:
          <input type="text" name="B_plus_U" placeholder="B+ end at" >marks</h5>
          <h5>B Lower Range:
          <input type="text" name="B_L" placeholder="B start from" >to</h5>
          <h5>B Upper Range:
          <input type="text" name="B_U" placeholder="B end at" >marks</h5>
          <h5>B- Lower Range:
          <input type="text" name="B_minus_L" placeholder="B- start from" >to</h5>
          <h5>B- Upper Range:
          <input type="text" name="B_minus_U" placeholder="B- end at" >marks</h5>
          <h5>C+ Lower Range:
          <input type="text" name="C_plus_L" placeholder="C+ start from" >to</h5>
          <h5>C+ Upper Range:
          <input type="text" name="C_plus_U" placeholder="C+ end at" >marks</h5>
          <h5>C Lower Range:
          <input type="text" name="C_L" placeholder="C start from" >to</h5>
          <h5>C Upper Range:
          <input type="text" name="C_U" placeholder="C end at" >marks</h5>
          <h5>C- Lower Range:
          <input type="text" name="C_minus_L" placeholder="C- start from" >to</h5>
          <h5>C- Upper Range:
          <input type="text" name="C_minus_U" placeholder="C- end at" >marks</h5>
          <h5>D+ Lower Range:
          <input type="text" name="D_plus_L" placeholder="D+ start from" >to</h5>
          <h5>D+ Upper Range:
          <input type="text" name="D_plus_U" placeholder="D+ end at" >marks</h5>
          <h5>D Lower Range:
          <input type="text" name="D_L" placeholder="D start from" >to</h5>
          <h5>D Upper Range:
          <input type="text" name="D_U" placeholder="D end at" >marks</h5>
          <h5>D- Lower Range:
          <input type="text" name="D_minus_L" placeholder="D- start from" >to</h5>
          <h5>D- Upper Range:
          <input type="text" name="D_minus_U" placeholder="D- end at" >marks</h5>
          <h5>F (fail Below Or Eqlual to) marks:
          <input type="text" name="Fail" placeholder="(fail) under marks" ></h5>
          

         <input type="submit" class= "btn" name= "submit" id="submit" value="submit">
         

         </form>
       <?php 
       require_once "connectDB.php";

       $coursename= $_GET['coursename'];
       $courseid=$_GET['courseid'];


if(isset($_POST['submit'])){

  
        
        $sql="SELECT Student_Serial FROM $coursename";
        $rslt=$conn->query($sql);

        while($row=$rslt->fetch_row()){
           // echo "$row[0] <br>";

            $sq="SELECT Total FROM $coursename WHERE Student_Serial= '{$row[0]}'";
            $rs=$conn->query($sq);

            $rw=$rs->fetch_row();

            if($rw[0]>= $_POST['A_plus_L'] && $rw[0] <=  $_POST['A_plus_U']){
                $sqt= "UPDATE $coursename SET Grade='A+' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['A_L'] && $rw[0] <=  $_POST['A_U']){
                $sqt= "UPDATE $coursename SET Grade='A' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['A_minus_L'] && $rw[0] <=  $_POST['A_minus_U']){
                $sqt= "UPDATE $coursename SET Grade='A-' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['B_plus_L'] && $rw[0] <=  $_POST['B_plus_U']){
                $sqt= "UPDATE $coursename SET Grade='B+' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['B_L'] && $rw[0] <=  $_POST['B_U']){
                $sqt= "UPDATE $coursename SET Grade='B' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['B_minus_L'] && $rw[0] <=  $_POST['B_minus_U']){
                $sqt= "UPDATE $coursename SET Grade='B-' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['C_plus_L'] && $rw[0] <=  $_POST['C_plus_U']){
                $sqt= "UPDATE $coursename SET Grade='C+' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['C_L'] && $rw[0] <= $_POST['C_U']){
                $sqt= "UPDATE $coursename SET Grade='C' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['C_minus_L'] && $rw[0] <=  $_POST['C_minus_U']){
                $sqt= "UPDATE $coursename SET Grade='C-' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['D_plus_L'] && $rw[0] <=  $_POST['D_plus_U']){
                $sqt= "UPDATE $coursename SET Grade='D+' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['D_L'] && $rw[0] <=  $_POST['D_U']){
                $sqt= "UPDATE $coursename SET Grade='D' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]>= $_POST['D_minus_L'] && $rw[0] <=  $_POST['D_minus_U']){
                $sqt= "UPDATE $coursename SET Grade='D-' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
            if($rw[0]<= $_POST['Fail']){
                $sqt= "UPDATE $coursename SET Grade='F' WHERE Student_Serial='{$row[0]}'";
                $rt=$conn->query($sqt);
            }
               
              
               
          
            }
       
           // header("location: assignedCourse.php? courseid=$courseid");
       
 }           
      

       ?>
          
        
    </div>
  </head>
</html>
