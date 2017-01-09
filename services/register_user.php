<?php
  /* 
     Get database connection - likely just need to call function
     Run validation checks
     IF everything is successful
       --> Create user in database
       --> log user in (encrypt user_id?, set any session or cookie values?)  
       --> Take them to the next page (also send them a welcome email, etc.)
  */
  
  require '../db/connect.php';
  
  //$return = array();
  //$return['success'] = False; // will return False until code reaches end
  
  $errors = "";
  
  if (!isset($_POST['first_name']) || $_POST['first_name'] === "") {
    //echo "Hello"; exit();
    $errors = $errors . "First Name is required.<br/>";
  }
  
  if (!isset($_POST['last_name']) || $_POST['last_name'] === "") {
    $errors = $errors . "Last Name is required.<br/>";
  }
  
  if (!isset($_POST['email']) || $_POST['email'] === "") {
    $errors = $errors . "Email is required.<br/>";
  }
  
  //add check to see if email already in use
  
  if (!isset($_POST['password']) || $_POST['password'] === "") {
    $errors = $errors . "Password is required.<br/>";
  }
  
  if (!isset($_POST['confirm_password']) || $_POST['confirm_password'] === "") {
    $errors = $errors . "Confirm Password is required.<br/>";
  }
  
  if ($_POST['password'] !== $_POST['confirm_password']) {
    $errors = $errors . "Password and Confirm Password must match exactly.<br/>";
  }
  
  if ($errors !== "") {
    echo "<div class='bg-danger ft-error'>$errors</div>";
    exit();
  }
  
  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $userEmail = $_POST['email'];
  $userPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  //$deleteUser = "";
  //$deleteObj = 
  
  $insertUser = "INSERT INTO family_tracker.user (first_name, last_name, email, password) VALUES (?, ?, ?, ?);"; // change this to call stored proc most likely
  $insertObj = $connection -> prepare($insertUser);
  
  $insertObj -> bind_param("ssss", $firstName, $lastName, $userEmail, $userPassword);
  $insertObj -> execute();
  
  // echo "UserID: " . $connection -> insert_id;
  
  $insertObj -> close();
  $connection -> close();
  
  //$return['success'] = True;
  //$return['message'] = 'User registration success!';
  
  /*$query = "SELECT * FROM user;"; 
  $resultObj = $connection->query($query);
  
  if ($resultObj -> num_rows > 0) {
    while ($row = $resultObj -> fetch_assoc()) {
      print_r($row);
    }
  }
  
  $resultObj -> close();
  */
?>