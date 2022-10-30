<?php
$servername="localhost";
$username="root";
$password="";
$database="youcodescumboard";
// Create connection
$conn=new mysqli($servername, $username, $password, $database);
// Check connection
    if($conn->connect_error){
        die("onnection failed:".$conn->connect_error);
    }
    echo "connected successfully";
    
?>