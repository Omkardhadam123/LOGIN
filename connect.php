<?php
$servername="localhost";
$username="id22315207_website979";
$password="Omkar979*#";
$database="id22315207_logindata979";

$conn=mysqli_connect($servername,$username,$password,$database);

if($conn){
   // echo "CONNECTION SUCCESSFULL";
}
else{
    echo "NOT CONNECTED";
}
?>