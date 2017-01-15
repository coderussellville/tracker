<?php
  
   //look into proper way to do connection management in php
  
  class Email {
    
    //private $isValid = false;
    //public $emailExists;
    //private $_connection = "";
    
    function __construct() {
      //$_connection = $connection;
    //  $emailExists = false;
    }
    
    public function validateEmail($emailAddr) {
      if ($emailAddr === "") {
        return "Email is required.";
      }
      
      $emailAddr = filter_var($emailAddr, FILTER_SANITIZE_EMAIL);
      
      if (!filter_var($emailAddr, FILTER_VALIDATE_EMAIL)) {
        return "Please enter valid email address (Ex. user@email.com).";
      }
      else {
        return "";
      }
    }
    
    public function doesEmailExist ($emailAddr, $connection) {
      try {
        $emailExists = false;
        $selectQuery = "SELECT 1 FROM family_tracker.user WHERE email = ?"; //make into stored proc? protect against SQL injection
        $selectObj = $connection->prepare($selectQuery);
        
        $selectObj->bind_param("s", $emailAddr);
        $selectObj->execute();
        $selectObj->store_result(); // must do in order for num_rows check to work
        
        if ($selectObj->num_rows > 0) {
          $emailExists = true;
          //$this->emailExists = true;
        }
        
        $selectObj->close(); //close connection also?
        
        return $emailExists;// $this->emailExists;
      }
      catch(Exception $ex) {
        echo 'Test'; //figure out how to handle exceptions
      }
    }
    
    //function sendEmail($fromAddr, $toAddr[], $message, etc.) {}
  }

?>