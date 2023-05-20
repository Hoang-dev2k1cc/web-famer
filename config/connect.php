<?php
  $servername = "localhost";
  $username ="root";
  $password = "";
  $db = "test1";
  $conn = new mysqli($servername, $username,$password,$db );
  if (  $conn -> connect_error){
    
    die("Connection fialed: " .$conn -> connect_error);
  }
  echo "";
  ?>
