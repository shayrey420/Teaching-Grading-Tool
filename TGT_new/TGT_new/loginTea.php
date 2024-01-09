
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
    <link rel="stylesheet" href="CSS/styleTGT.css">
</head>
<body>

  <div id="main">
    <div id="header">
    <h1>TGT</h1>
      <h4>Teacher Login</h4>
    </div>
    <div id="content">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="form-group">
          <label>Email</label>
          <input  type="text" name="email" autocomplete="on" placeholder="put your email" />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password"  placeholder="put your password" />
        </div>
        <input type="submit" class="btn" name="login" id="submit" value="Submit" />
      </form>


<?php

        require_once "connectDB.php";

        if(isset($_POST['login'])){
          if(!isset($_POST['email']) || $_POST['password'] == ''){

            echo '<div class="message error"> Please Fill All The Fields. </div>';

          }
          else if(!isset($_POST['password']) || $_POST['email'] == ''){

            echo '<div class="message error"> Please Fill All The Fields.</div>';
          }
          else{
            $email = $_POST["email"];
            $password = $_POST["password"];

            $sql = $conn->prepare("SELECT id, name, email, password FROM teacher WHERE email = ? AND password = ?");
            $sql->bind_param("ss", $email, $password);
            $sql->execute();
            $sql->store_result();
            
            $sql->bind_result($id, $name, $mail, $pass);
            //The fetch_all() fetches all result rows and returns the result-set as an associative array, a numeric array, or both.
          
            $sql->fetch();
            //$result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
           
          
            if (($email==$mail) && ($password==$pass)) {
              //echo "$id-$name-$mail";
              session_start();
              $_SESSION["id"]= $id;
              $_session["name"]= $name;
              $_session["email"]= $mail;
         
              
             header("location: dashboardTea.php");              

            }
            else{
                echo "<div class='message error'> Email and Password Not Matched.</div>";
            }
            $sql->close();
          }
        }
        // db close connection                
        $conn->close();
      ?>
    
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
        <h5> <b>Welcome to TGT</b></h5>
    </div>
  </div>
</body>
</html>