<?php
global $conn;
define('servername', 'localhost');
define('username', 'root');
define('password', '');
define('database', 'youcodescumboard');
// Create connection
$conn=new mysqli(servername, username, password, database);
// Check connection
    if($conn==false){
        die("connection failed:".mysqli_connect_error());
    }    
?>