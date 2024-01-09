<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TGT</title>
    <link rel="stylesheet" href="CSS/styleTGT.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h1>TGT</h1>
      <h4>Teacher Register</h4>
    </div>
    <div id="content">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="form-group">
          <label>Name</label>
          <input  type="text" name="name" autocomplete="off" placeholder="put your name"/>
        </div>
        <div class="form-group">
          <label>Institution</label>
          <input type="text" name="Institution" autocomplete="off"  placeholder="put your institution name" />
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" autocomplete="on"  placeholder="put your email" />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password"  placeholder="make a password"/>
        </div>
        <input type="submit" class="btn" name="register" id="submit" value="Submit" />
      </form>




<?php
require_once "connectDB.php";


$name = $password = $institution = $email= "";
$email_err= $other_err="";


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if email is empty or not
  
    if(empty(trim($_POST["email"]))){
        $email_err = "This field cannot be empty";
    }
    else{
        $sql = "SELECT id FROM teacher WHERE email = ?";

        $stmt = $conn->prepare($sql);
        if($stmt)
        {
             // Set the value of parameter email
            $param_email = trim($_POST['email']);

            $stmt->bind_param("s", $param_email);


            // Try to execute this statement
            $exeSt = $stmt->execute();

            if($exeSt){

                $stmt->store_result();



                //checking the email is already sotored or not
                $countR = $stmt->num_rows;

                if($countR >= 1)
                {
                    $email_err = "This email is already taken"; 
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo "Something went wrong";
            }
        
    }

    $stmt->close();
}

// checking other fields

    if(empty(trim($_POST["name"])) && empty(trim($_POST["Institution"])) && empty(trim($_POST["password"]))){
        $other_error = "No field can be left empty";
    }
    else{
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $institution = trim($_POST['Institution']);

    }



// If there were no errors, go ahead and insert into the database
if(empty($email_err) && empty($other_err) )
{
    $sql = "INSERT INTO teacher (name, institution, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt)
    {   
         // Set these parameters
         $param_name = $name;
         $param_institution=$institution;
         $param_email=$email;
         $param_password=$password;
       
         $stmt->bind_param( "ssss", $param_name, $param_institution, $param_email, $param_password);

        // Try to execute the query
        if ($stmt->execute())
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong!";
        }
    }
    $stmt->close();
}
$conn->close();
}

?>
         <br>
         <br>
         <br>
        <br>
        <h5> <b>Welcome to TGT</b></h5>
    </div>
  </div>
</body>
</html>