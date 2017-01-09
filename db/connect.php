<?php
  $dbPassword = "4rtft!#thghqo#3!3518Js";
  $dbUserName = "web_user";
  $dbServer = "localhost";
  $dbName = "family_tracker";
  
  $connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);
  
  if ($connection->connect_errno) {
    exit("Database connection failed: " . $connection->connect_error);
  }
?>