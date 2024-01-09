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
        
          <h5>PUT THE PERCENTAGE OF EACH SECTION, <br>
            Also put exam was on mark <br>
            example: quiz_1 out of=15</h5> 
          <h5>Quiz_1:
          <input type="text" name="Quiz_1" placeholder="Quiz_1" >%</h5>
          <h5>Quiz_1 (exam was on):
          <input type="text" name="Quiz_1_e" placeholder="Quiz_1 on" >marks</h5>
          <h5>Quiz_2:
          <input type="text" name="Quiz_2" placeholder="Quiz_2" >%</h5>
          <h5>Quiz_2 (exam was on):
          <input type="text" name="Quiz_2_e" placeholder="Quiz_2 on" >marks</h5>
          <h5>Quiz_3:
          <input type="text" name="Quiz_3" placeholder="Quiz_3" >%</h5>
          <h5>Quiz_3 (exam was on):
          <input type="text" name="Quiz_3_e" placeholder="Quiz_3 on" >marks</h5>
          <h5>Quiz_4:
          <input type="text" name="Quiz_4" placeholder="Quiz_4 " >%</h5>
          <h5>Quiz_4 (exam was on):
          <input type="text" name="Quiz_4_e" placeholder="Quiz_4 on" >marks</h5>
          <h5>Quiz_5:
          <input type="text" name="Quiz_5" placeholder="Quiz_5 " >%</h5>
          <h5>Quiz_5 (exam was on):
          <input type="text" name="Quiz_5_e" placeholder="Quiz_5 on" >marks</h5>
          <h5>Quiz_6:
          <input type="text" name="Quiz_6" placeholder="Quiz_6" >%</h5>
          <h5>Quiz_6 (exam was on):
          <input type="text" name="Quiz_6_e" placeholder="Quiz_6 on" >marks</h5>
          <h5>Mid_1:
          <input type="text" name="Mid_1" placeholder="Mid_1" >%</h5>
          <h5>Mid_1 (exam was on):
          <input type="text" name="Mid_1_e" placeholder="Mid_1 on" >marks</h5>
          <h5>Mid_2:
          <input type="text" name="Mid_2" placeholder="Mid_2" >%</h5>
          <h5>Mid_2 (exam was on):
          <input type="text" name="Mid_2_e" placeholder="Mid_2 on" >marks</h5>
          <h5>Assignment_1:
          <input type="text" name="Assignment_1" placeholder="Assignment_1" >%</h5>
          <h5>Assignment_1 (exam was on):
          <input type="text" name="Assignment_1_e" placeholder="Assignment_1 on" >marks</h5>
          <h5>Assignment_2:
          <input type="text" name="Assignment_2" placeholder="Assignment_2" >%</h5>
          <h5>Assignment_2 (exam was on):
          <input type="text" name="Assignment_2_e" placeholder="Assignment_2 on" >marks</h5>
          <h5>Assignment_3:
          <input type="text" name="Assignment_3" placeholder="Assignment_3" >%</h5>
          <h5>Assignment_3 (exam was on):
          <input type="text" name="Assignment_3_e" placeholder="Assignment_3 on" >marks</h5>
          <h5>project_1:
          <input type="text" name="project_1" placeholder="project_1" >%</h5>
          <h5>project_1 (exam was on):
          <input type="text" name="project_1_e" placeholder="project_1 on" >marks</h5>
          <h5>Project_2:
          <input type="text" name="project_2" placeholder="project_2" >%</h5>
          <h5>Project_2 (exam was on):
          <input type="text" name="project_2_e"_e placeholder="project_2 on" >marks</h5>
          <h5>Final:
          <input type="text" name="Final" placeholder="Final" >%</h5>
          <h5>Final (exam was on):
          <input type="text" name="Final_e" placeholder="Final on" >marks</h5>

         <input type="submit" class= "btn" name= "submit" id="submit" value="submit">
         

         </form>
       <?php 
       require_once "connectDB.php";

       $coursename= $_GET['coursename'];
       $courseid=$_GET['courseid'];
       
       function cal($percent, $score, $e_value){
            return ($score/$e_value)*$percent;
       }
       



       if(isset($_POST['submit'])){

        if($_POST['Quiz_1']!=""){
            $Quiz_1=$_POST['Quiz_1'];
        }
        else{
            $Quiz_1=0;
        }
        if($_POST['Quiz_2']!=""){
            $Quiz_2=$_POST['Quiz_2'];
        }
        else{
            $Quiz_2=0;
        }
        if($_POST['Quiz_3']!=""){
            $Quiz_3=$_POST['Quiz_3'];
        }
        else{
            $Quiz_3=0;
        }
        if($_POST['Quiz_4']!=""){
            $Quiz_4=$_POST['Quiz_4'];
        }
        else{
            $Quiz_4=0;
        }
        if ($_POST['Quiz_5']!=""){
            $Quiz_5=$_POST['Quiz_5'];
        }
        else{
            $Quiz_5=0;
        }
        if ($_POST['Quiz_6']!=""){
            $Quiz_6=$_POST['Quiz_6'];
        }
        else{
            $Quiz_6=0;
        }
        if($_POST['Mid_1']!=""){
            $Mid_1=$_POST['Mid_1'];
        }
        else{
            $Mid_1=0;
        }
        if($_POST['Mid_2']!=""){
            $Mid_2=$_POST['Mid_2'];
        }
        else{
            $Mid_2=0;
        }
        if ($_POST['Assignment_1']!=""){
            $Assignment_1=$_POST['Assignment_1'];
        }
        else{
            $Assignment_1=0;
        }
        if ($_POST['Assignment_2']!=""){
            $Assignment_2=$_POST['Assignment_2'];
        }
        else{
            $Assignment_2=0;
        }
        if($_POST['Assignment_3']!=""){
            $Assignment_3=$_POST['Assignment_3'];
        }
        else{
            $Assignment_3=0;
        }
        if ($_POST['project_1']!=""){
            $project_1=$_POST['project_1'];
        }
        else{
            $project_1=0;
        }
        if ($_POST['project_2']!=""){
            $project_2=$_POST['project_2'];
        }
        else{
            $project_2=0;
        }
        if ( $_POST['Final']!=""){
            $Final=$_POST['Final'];
        }
        else{
            $Final=0;
        }



        if($_POST['Quiz_1_e']!=""){
            $Quiz_1_e=$_POST['Quiz_1_e'];
        }
        else{
            $Quiz_1_e=1;
        }
        if($_POST['Quiz_2_e']!=""){
            $Quiz_2_e=$_POST['Quiz_2_e'];
        }
        else{
            $Quiz_2_e=1;
        }
        if($_POST['Quiz_3_e']!=""){
            $Quiz_3_e=$_POST['Quiz_3_e'];
        }
        else{
            $Quiz_3_e=1;
        }
        if($_POST['Quiz_4_e']!=""){
            $Quiz_4_e=$_POST['Quiz_4_e'];
        }
        else{
            $Quiz_4_e=1;
        }
        if ($_POST['Quiz_5_e']!=""){
            $Quiz_5_e=$_POST['Quiz_5_e'];
        }
        else{
            $Quiz_5_e=1;
        }
        if ($_POST['Quiz_6_e']!=""){
            $Quiz_6_e=$_POST['Quiz_6_e'];
        }
        else{
            $Quiz_6_e=1;
        }
        if($_POST['Mid_1_e']!=""){
            $Mid_1_e=$_POST['Mid_1_e'];
        }
        else{
            $Mid_1_e=1;
        }
        if($_POST['Mid_2_e']!=""){
            $Mid_2_e=$_POST['Mid_2_e'];
        }
        else{
            $Mid_2_e=1;
        }
        if ($_POST['Assignment_1_e']!=""){
            $Assignment_1_e=$_POST['Assignment_1_e'];
        }
        else{
            $Assignment_1_e=1;
        }
        if ($_POST['Assignment_2_e']!=""){
            $Assignment_2_e=$_POST['Assignment_2_e'];
        }
        else{
            $Assignment_2_e=1;
        }
        if($_POST['Assignment_3_e']!=""){
            $Assignment_3_e=$_POST['Assignment_3_e'];
        }
        else{
            $Assignment_3_e=1;
        }
        if ($_POST['project_1_e']!=""){
            $project_1_e=$_POST['project_1_e'];
        }
        else{
            $project_1_e=1;
        }
        if ($_POST['project_2_e']!=""){
            $project_2_e=$_POST['project_2_e'];
        }
        else{
            $project_2_e=1;
        }
        if ( $_POST['Final_e']!=""){
            $Final_e=$_POST['Final_e'];
        }
        else{
            $Final_e=1;
        }


        
        if($Quiz_1+$Quiz_2+$Quiz_3+$Quiz_4+$Quiz_5+$Quiz_6+$Mid_1+$Mid_2+$Assignment_1+$Assignment_2+$Assignment_3+$project_1+$project_2+$Final==100){
        $sql="SELECT Student_Serial FROM $coursename";
        $rslt=$conn->query($sql);

        while($row=$rslt->fetch_row()){
           // echo "$row[0] <br>";
          $f_score=0;
          $sqm= "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$coursename'";
          $stm=$conn->query($sqm);


          while($r_t=$stm->fetch_row()){

           
            
            $sq="SELECT $r_t[0] FROM $coursename WHERE Student_Serial= '{$row[0]}'";
            $rs=$conn->query($sq);
            $rw=$rs->fetch_row();

            if($r_t[0]=="Quiz_1"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Quiz_2"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Quiz_3"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Quiz_4"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Quiz_5"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Quiz_6"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Mid_1"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Mid_2"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Assignment_1"){
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Assignment_2") {
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Assignment_3") {
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="project_1") {
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="project_2") {
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
            else if($r_t[0]=="Final") {
                $f_score= $f_score+cal($Quiz_1,$rw[0],$Quiz_1_e);
            }
        

               // $f_score= cal($Quiz_1,$rw[3],$Quiz_1_e)+cal($Quiz_2,$rw[4],$Quiz_2_e)+cal($Quiz_3,$rw[5],$Quiz_3_e)+cal($Quiz_4,$rw[6],$Quiz_4_e)+cal($Quiz_5,$rw[7],$Quiz_5_e)+cal($Quiz_6,$rw[8],$Quiz_6_e)+cal($Mid_1,$rw[9],$Mid_1_e)+cal($Mid_2,$rw[10],$Mid_2_e)+cal($Assignment_1,$rw[11],$Assignment_1_e)+cal($Assignment_2,$rw[12],$Assignment_2_e)+cal($Assignment_3 ,$rw[13],$Assignment_3_e)+cal($project_1,$rw[14],$project_1_e)+cal($project_2,$rw[15],$project_2_e)+cal($Final,$rw[16],$Final_e);
              
               }
               $sqt= "UPDATE $coursename SET Total='{$f_score}' WHERE Student_Serial='{$row[0]}'";
               $rt=$conn->query($sqt);
            }
            
        }
        else
            echo "<h1>Total Percentage is not = 100</h1>";
       
           // header("location: assignedCourse.php? courseid=$courseid");
       
       }           
      

       ?>
          
        
    </div>
  </head>
</html>

