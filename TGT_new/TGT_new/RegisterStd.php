
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
      <h4>Student Register</h4>
    </div>
    <div id="content">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="form-group">
          <label>Name</label>
          <input  type="text" name="name" autocomplete="off" placeholder="put your name"/>
        </div>
        <div class="form-group">
          <label>Institution</label>
          <input type="text" name="Institution" autocomplete="on" placeholder="put your institution name" />
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" autocomplete="on"  placeholder="put your email" />
        </div>
        
        <div class="form-group">
          <label>Your CGPA</label>
          <input type="text" name="CGPA" placeholder="put your CGPA" />
        </div>
        <div class="form-group">
          <label>Your Institutional ID</label>
          <input type="text" name="Institutional_ID" autocomplete="off" placeholder="put your Id" />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password"  placeholder="make a password"/>
        </div>
        <input type="submit" class="btn" name="register" id="submit" value="Submit" />
      </form>



 <?php
require_once "connectDB.php";


$name = $institution =$institution_ID =$CGPA = $email= $password = "";
$email_err= $institutionID_err= $other_err="";


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if email is empty or not
  
    if(empty(trim($_POST["email"]))){
        $email_err = "This field cannot be empty";
    }
    else{
        $sql = "SELECT id FROM student WHERE email = ?";

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
                    $email_err= "This email is already taken"; 
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
if(empty(trim($_POST["Institutional_ID"]) && trim($_POST["Institution"]))){
    $institutionID_err = "This field cannot be empty";
}
else{
    //$sql = "SELECT id FROM student WHERE institution = ?";
    $sql1 = "SELECT id FROM student WHERE institutional_id = ?";

    //$stmt = $conn->prepare($sql);
    $stmt1 = $conn->prepare($sql1);
    if($stmt && $stmt1)
    {
         // Set the value of parameter institution and institutional_ID
        //$param_Institution = trim($_POST['Institution']);
        $param_Institution_ID = trim($_POST['Institutional_ID']);

       // $stmt->bind_param("s", $param_Institution);
        $stmt1->bind_param("s", $param_Institution_ID);


        // Try to execute this statement
        //$exeSt = $stmt->execute();
        $exeSt1 = $stmt1->execute();

        if($exeSt ){

            //$stmt->store_result();
            $stmt1->store_result();



            //checking institutional_ID is already stored or not
            //$countR = $stmt->num_rows;
            $countR1 = $stmt1->num_rows;

            if( ($countR1 >= 1))
            {
                $$institutionID_err= "This Insti is already taken"; 
            }
            else{
                $institution_ID = trim($_POST['Institutional_ID']);
            }
        }
        else{
            echo "Something went wrong";
        }
    
}

//$stmt->close();
$stmt1->close();
}


// checking other fields

    if(empty(trim($_POST["name"])) && empty(trim($_POST["CGPA"]))&& empty(trim($_POST["Institution"])) && empty(trim($_POST["password"])) ){
        $other_error = "No field can be left empty";
    }
    else{
        $name = trim($_POST['name']);
        $institution = trim($_POST['Institution']);
        $password = trim($_POST['password']);
        $CGPA = trim($_POST['CGPA']);

    }



// If there were no errors, go ahead and insert into the database
if(empty($email_err) && empty($InstitutionID_err) && empty($other_err) )
{
    $sql = "INSERT INTO student (name, institution, institutional_id, cgpa, email, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt)
    {   
         // Set these parameters
         $param_name = $name;
         $param_institution=$institution;
         $param_institution_ID=$institution_ID;
         $param_CGPA=$CGPA;
         $param_email=$email;
         $param_password=$password;
       
         $stmt->bind_param( "ssidss", $param_name, $param_institution, $param_institution_ID, $param_CGPA, $param_email, $param_password);

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
     
  <div><h5> <b>Welcome to TGT</b></h5></div>
    </div>
</div>
</body>
</html>