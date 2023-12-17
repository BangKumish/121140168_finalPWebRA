<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'databasegame';

  $databaseLink = mysqli_connect($host, $user, $pass, $db);

  if($databaseLink){
    
  }

  mysqli_select_db($databaseLink, $db)
?>