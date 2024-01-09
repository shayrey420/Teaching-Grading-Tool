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
            <li><a href="dashboardTea.php">Home</a></li>
            <li><a href="courseTea.php">Courses</a></li>
           
            <li><a href="#">messege</a></li>
            <li><a href="logoutTea.php">logout</a></li>
            
        </ul>
    </div>
    <div class="main">
       
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input type="password" name="password" placeholder="update your password" >
      
        <input type="submit" class="btn" name="submit" id="submit" value="Submit" />
       
    </form>
       <?php 
       require_once "connectDB.php";

       if(isset($_POST['submit'])){
       
       $id= $_SESSION["id"];
       $pass=$_POST["password"];

       if(trim($pass!="")){
       $sql = $conn->query("UPDATE teacher SET password='{$pass}' WHERE id='{$id}'");
       $conn->close();
       header("location:dashboardTea.php");
       }
       else
           //echo "Name cannot be empty.";
           header("location:dashboardTea.php");
    }
     
       ?>
       
        
    </div>
  </head>
</html>

