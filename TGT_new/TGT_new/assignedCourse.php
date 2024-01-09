
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
    <div><button onclick="window.print()" class="btn btn-primay">Print The Screen</button></div>
    <div class="main">
   
       <?php 
      require_once "connectDB.php";
      session_start();
      $id=$_SESSION['id'];
      $courseid=$_GET['courseid'];
      //$_SESSION['courseid']=$courseid;
      //$course_name=$_POST['course_name'];

      $sql="SELECT course_name FROM courses WHERE courseid='$courseid'";
      $stmt=$conn->query($sql);

      $row=$stmt->fetch_row();
      $coursename=$row[0];


      echo " <h1>The course is ".$row[0]."</h1>";

      $sq= "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$row[0]'";
      $st=$conn->query($sq);
     

     // $rw=$st->fetch_row();
     echo "<label> <table border='6px' cellpadding='15px' cellspacing='1px'>
            <tr> ";

    
      while($rw=$st->fetch_row()){
        echo  " <th>$rw[0]</th> ";
      }
    
    
     echo "<tr>";
     $count_column=mysqli_num_rows($st);

     $sqt= "SELECT * FROM $row[0]";
     $qrt=$conn->query($sqt);
     while($rt=$qrt->fetch_row()){
      echo "<tr>";

      for($i=0; $i<$count_column; $i++){
          echo "<td> $rt[$i] </td>";
          
      }
     
               echo "</tr>";
     }
     echo "</table></label> ";

     $high=0;
     $low=100;
     $totl=0;
    // $i=0;

     $qlh= "SELECT Total FROM $coursename";
     $eqh= $conn->query($qlh);

    //$r_h=$eq->fetch_row()
     while($r_h=$eqh->fetch_row()){
      if($r_h[0] > $high){
        $high= $r_h[0];
      }
     }

     $qlL= "SELECT Total FROM $coursename";
     $eqL= $conn->query($qlL);
     while($r_L=$eqL->fetch_row()){
      if($r_L[0] < $low){
        $low= $r_L[0];
      }
     }

     $qlTo= "SELECT Total FROM $coursename";
     $eqTo= $conn->query($qlTo);
     while($r_totl=$eqTo->fetch_row()){
     
      $totl=$totl + $r_totl[0];
      //$i= $i+1;
     }
     $i=mysqli_num_rows($eqh);
     if($i==null || $i==0){
      $low=0;
      $i=1;
     }
     $avg=$totl/$i;

echo "<br>";
echo "<table border='3px' cellpadding='10px' cellspacing='2px'>
<tr>
<th>High</th>
<th>low</th>
<th>Average</th>
</tr>";

echo "<tr>";
echo "<td> $high </td>";

echo "<td> $low </td>";

echo "<td> $avg </td>";
echo "</tr>";
echo "</table>";

     ?>
 <form class="form_a" action="<?php $_SERVER['PHP_SELF']; ?>" method="post"> 
        
        <h5>Update Column?:
        <input type="text" name="column_name" placeholder="put column name:"> <br> Student Serial:
        <input type="text" name="student_serial" placeholder="put serial number:"> <br>
        Mark: 
        <input type='text' name='mark' placeholder='put mark:'> <br>
      
       <input type="submit" class= "btn" name= "submit" id="submit" value="submit"></h5>
       

       </form>
     <?php 
     require_once "connectDB.php";

    // $coursename= $_GET['coursename'];
    // $courseid=$_GET['courseid'];

     
     if(isset($_POST['submit'])){
      $column_name= $_POST['column_name'];
     // $Student_ID= $_POST['student_id'];
      $student_serial= $_POST['student_serial'];

        if($column_name=="Quiz_1" || $column_name=="Quiz_2" || $column_name=="Quiz_3" || $column_name=="Quiz_4" ||$column_name=="Quiz_5" || $column_name=="Quiz_6" || $column_name=="Mid_1" || $column_name=="Mid_2" ||$column_name=="Assignment_1" || $column_name=="Assignment_2" || $column_name=="Assignment_3" || $column_name=="Quiz_1" || $column_name=="Quiz_1" || $column_name=="Quiz_1" ||  $column_name=="Mid_1" || $column_name=="Mid_2" ||$column_name=="Assignment_1" || $column_name=="Assignment_2" || $column_name=="Assignment_3" || $column_name=="project_1" || $column_name=="project_2" || $column_name=="Final" || $column_name=="Total"|| $column_name=="Grade" ){
          //header("location:updateSection.php? courseid=$courseid & column_name= $column_name");
 
 
     
         $sqm="SELECT Student_Serial FROM $coursename where Student_Serial='$student_serial'";
         $rslt=$conn->query($sqm);
         $rw=mysqli_num_rows($rslt);

        if($rw==1){
            $mark=$_POST['mark'];
           $sql="UPDATE $coursename SET $column_name='{$mark}' WHERE Student_Serial='{$student_serial}'";
           $conn->query($sql);
        
        }
        else echo"<h1>Student Serial doesn't exist</h1>";

//$conn->close();
}
else
         echo "<h1>Wrong column name</h1>";
     



        }   



     echo "</label><button><a href='addStudent.php? coursename=$row[0] & courseid=$courseid' > Add New Student+ </a></button>"; 

     echo "<button><a href='removeStudent.php? coursename=$row[0] & courseid=$courseid' >Remove Student</a></button>";

     echo "<button><a href='removeColumn.php? coursename=$row[0] & courseid=$courseid' >Remove Column</a></button>";

     echo "<button><a href='assignTotal.php? coursename=$row[0] & courseid=$courseid' > Assign Final Total </a></button>";

     echo "<button><a href='assignGrade.php? coursename=$row[0] & courseid=$courseid' > Assign Final Grade</a></button></label>";

     echo "<button onclick='window.print()' class='btn btn-primay'>Print The Screen</button></label>";


    

 ?> 




  
       
       
       
        
    </div>
    <div>
    </div>
  </head>
</html>

