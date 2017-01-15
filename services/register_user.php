<?php
  /* 
     Get database connection - likely just need to call function
     Run validation checks
     IF everything is successful
       --> Create user in database
       --> log user in (encrypt user_id?, set any session or cookie values?)  
       --> Take them to the next page (also send them a welcome email, etc.)
  */
  
  //$return = array();
  //$return['success'] = False; // will return False until code reaches end
  
  // Validate input to make sure input is not malicious
  // Hide content if JavaScript is not enabled in browser?
  
  require '../classes/email.php';
  require '../db/connect.php'; // need to handle this differently
  
  $errors = "";
  
  $firstName = strip_tags($_POST['first_name']) ?? "";
  $lastName = strip_tags($_POST['last_name']) ?? "";
  $email = strip_tags($_POST['email']) ?? "";
  $password = strip_tags($_POST['password']) ?? "";
  $confirmPassword = strip_tags($_POST['confirm_password']) ?? "";
  
  if ($firstName === "") {
    $errors = $errors . "First Name is required.<br/>";
  }
  
  if ($lastName === "") {
    $errors = $errors . "Last Name is required.<br/>";
  }
  
  $emailObj = new Email();
  
  $emailResult = $emailObj->validateEmail($email);
  if ($emailResult !== "") {
    $errors = $errors . $emailResult . "<br/>";
  }
  
  //$emailObj->emailExists = $emailObj->doesEmailExist($email, $connection);
  //if ($emailObj->emailExists) {
  if ($emailObj->doesEmailExist($email, $connection)) {
    $errors = $errors . "Email address is already in use. Please choose another email to use for signing up.<br/>";
  }
  
  if ($password === "") {
    $errors = $errors . "Password is required.<br/>";
  }
  
  if ($confirmPassword === "") {
    $errors = $errors . "Confirm Password is required.<br/>";
  }
  
  if ($password !== $confirmPassword) {
    $errors = $errors . "Password and Confirm Password must match exactly.<br/>";
  }
  
  $passResult = validatePassword($password);
  
  if ($passResult !== "pass") {
     $errors = $errors . $passResult . "<br/>";
  }
  
  if ($errors !== "") {
    //echo strip_tags("Out <script>function test() {}</script>");
    echo "<div class='bg-danger ft-error'>$errors</div>"; //may need to remove div and put somewhere else, just pass back errors
    exit();
  }

  $userPassword = password_hash($password, PASSWORD_DEFAULT);
  
  //$deleteUser = "";
  //$deleteObj = 
  
  //send email to user to verify email address with code? must first validate email address before loggin in first time.
  
  $insertUser = "INSERT INTO family_tracker.user (first_name, last_name, email, password) VALUES (?, ?, ?, ?);"; // change this to call stored proc most likely
  $insertObj = $connection -> prepare($insertUser);
  
  $insertObj -> bind_param("ssss", $firstName, $lastName, $email, $userPassword);
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
  
  function validatePassword($password) {
    $passLength = strlen($password);
    
    if ($passLength < 8) {
      return("Password must be at least 8 characters.");
    } 
    else if ($passLength > 30) {
      return("Password cannot exceed 30 characters");
    } 
    else if (!preg_match("/\d/", $password, $match)) {
      return("Password must contain at least one number.");
    }
    else if (!preg_match("/[a-z]/", $password, $match)) {
      return("Password must contain at least one lowercase letter.");
    } 
    else if (!preg_match("/[A-Z]/", $password, $match)) {
      return("Password must contain at least one uppercase letter.");
    } 
    else if (!preg_match("/[!@#\$%\&\(\)\_\+]/", $password, $match)) { //!, @, #, $, %, &, (, )
      return("Password must contain one of the following: !, @, #, $, %, &, (, )");
    }
    
    return("pass");
  }
?>