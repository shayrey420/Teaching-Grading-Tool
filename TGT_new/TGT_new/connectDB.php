<?php

// define constans for mysqli connection
 $Server_name='localhost';
 $User_name='root';
 $Password= '';
 $DB_name='TGT';

 
// creating an object of mysqli clss and pass the 4 constant parameters in constactor to connect; 
 $conn= new mysqli($Server_name, $User_name, $Password, $DB_name);


//checking connecttion
 if($conn->connect_error)
 {
    die("connecttion failed".$conn->connect_error);
 }
 //else
    //echo "connected";

?>