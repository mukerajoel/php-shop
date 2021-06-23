<?php
    
   //create connection
   $conn = mysqli_connect('localhost', 'mukera', 'db123', 'isoft');

   //check connection
    if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
    }
    
?>