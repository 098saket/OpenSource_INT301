<?php
  define("dbhost",'localhost');
  define("dbuser",'root');
  define("dbpass",'New@12345');

  $conn = mysqli_connect(dbhost, dbuser, dbpass);
   if(! $conn ) {
       echo '<script>alert("Could not connect:" . mysqli_error())</script>';
   }
   echo '<script>alert("Database Connected successfully")</script>';
   mysqli_select_db($conn,"Testing");
?>