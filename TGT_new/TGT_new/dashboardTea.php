<?php
  
  /* Start the session */
  session_start();
  // check if session not exist
  if(!isset($_SESSION["id"])){
    // redirect to login 
    header("location: TGT.php");
  }
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
            <li><a href="<?php echo $_SERVER['PHP_SELF'];?>">Home</a></li>
            <li><a href="courseTea.php">Courses</a></li>
           
            <li><a href="#">messege</a></li>
            <li><a href="logoutTea.php">logout</a></li>
            
        </ul>
    </div>
    <div class="main">
       <?php 
       require_once "connectDB.php";

       $id= $_SESSION["id"];
       $sql = $conn->prepare("SELECT id, name, institution, email, password FROM teacher WHERE id=?");
       $sql->bind_param("i", $id);
       $sql->execute();
       

       //The fetch_all() fetches all result rows and returns the result-set as an associative array, a numeric array, or both.
       //$sql->store_result();
            
       $sql->bind_result($id, $name, $institution, $mail, $pass);

       $sql->fetch();

       echo "<h1>Welcome to TGT</h1>";
       echo "<br>";
      
       echo "<h2>";
       echo " <table border='6px' cellpadding='15px' cellspacing='1px'>";
       echo "<tbody>";
       

       echo "<tr>";
       echo "<td>Your Name(teacher): </td>"."<td>" .$name. "</td>" ."<td><a href='updateTeaName.php'>Update</a></td>" ;
       echo "</tr>";

       echo "<tr>";
       echo "<td>Your TGT ID: </td> ". "<td>" .$id ."</td>"."<td><b>Can't Update</b></td>"  ;
       echo "</tr>";
       echo "<tr>";
       echo "<td>Your Email address: </td>". "<td>".$mail ."</td>"."<td><b>Can't Update</b></td>" ;
       echo "</tr>";
       echo "<tr>";
       echo "<td>Your Institution: </td>". "<td>".$institution . "</td>"."<td><a href='updateTeaInstitution.php'>Update</a></td>" ;
       echo "</tr>";
       echo "<tr>";
       echo "<td>Your Password: </td>". "<td>". $pass . "</td>"."<td><a href='updateTeaPass.php'>Update</a></td>" ;
       echo "</tr>";
       echo "</tbody>";
       
       echo "</table>";
       echo "</h2>";
       $sql->close();
       $conn->close();
       ?>
       
        
    </div>
  </head>
</html>

