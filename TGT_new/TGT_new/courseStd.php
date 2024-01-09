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
                    <h4>Student Dashboard</h4>
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
            <li><a href="dashboardStd.php">Home</a></li>
            <li><a href="courseStd.php">Courses</a></li>
            <li><a href="messegeStd.php">massege</a></li>
            <li><a href="logoutStd.php">logout</a></li>
            
        </ul>
    </div>
    <div class="main">
   
       <?php 
      require_once "connectDB.php";
      session_start();
      $id=$_SESSION['id'];
     // $courseid=$_GET['courseid'];
      //$_SESSION['courseid']=$courseid;
      //$course_name=$_POST['course_name'];
      $tn="SELECT institution, Institutional_id FROM student WHERE id='{$id}'";
      $tt=$conn->query($tn);
      $r_tn=mysqli_fetch_row($tt);

      $tm="SELECT courseid, course_name, teacher_institution FROM courses";
      $t=$conn->query($tm);

      //$r_tm=mysqli_fetch_row($t);

       while ($r_tm=mysqli_fetch_row($t)){
            if($r_tm[2]==$r_tn[0]){
               $mt="SELECT Student_Id FROM $r_tm[1] Where Student_Id='{$r_tn[1]}'";
               $mt_t=$conn->query($mt);
               $mt_r=mysqli_num_rows($mt_t);
               if($mt_r==1){
                echo " <h1>The course is ".$r_tm[1]."</h1>";

                $sq= "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$r_tm[1]'";
                $st=$conn->query($sq);
                $count_column=mysqli_num_rows($st);


                //$coursename=$r_tm[1];
                echo "<label> <table border='6px' cellpadding='15px' cellspacing='1px'>
                <tr> ";
                while($rw=$st->fetch_row()){
                    echo  " <th>$rw[0]</th> ";
                }
                    echo "<tr>";

                  //  $count_column=mysqli_num_rows($st);

                    $sqt= "SELECT * FROM $r_tm[1] Where Student_Id='{$r_tn[1]}'";
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
               
                    $qlh= "SELECT Total FROM $r_tm[1]";
                    $eqh= $conn->query($qlh);
               
                   //$r_h=$eq->fetch_row()
                    while($r_h=$eqh->fetch_row()){
                     if($r_h[0] > $high){
                       $high= $r_h[0];
                     }
                    }
               
                    $qlL= "SELECT Total FROM $r_tm[1]";
                    $eqL= $conn->query($qlL);
                    while($r_L=$eqL->fetch_row()){
                     if($r_L[0] < $low){
                       $low= $r_L[0];
                     }
                    }
               
                    $qlTo= "SELECT Total FROM $r_tm[1]";
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
               }
               


                  }

               }


                    

    

 ?> 

        
    </div>
    <div>
    </div>
  </head>
</html>

