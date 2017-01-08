<?php require 'templates/header.php';?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="frmRegister" class="x-input-form" method="post" action="">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label for="inpFirstName">First Name</label>
                <!--<span class="text-danger">*</span>-->
                <input type="text" class="form-control" id="inpFirstName" placeholder="First Name">
              </div>
              <div class="form-group">
                <label for="inpLastName">Last Name</label>
                <input type="text" class="form-control" id="inpLastName" placeholder="Last Name">
              </div>
              <div class="form-group">
                <label for="inpUserEmail">Email address</label> <!-- Validate hasn't already been used -->
                <input type="email" class="form-control" id="inpUserEmail" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="inpPassword">Password</label>
                <input type="password" class="form-control" id="inpPassword" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="inpConfirmPassword">Confirm Password</label>
                <input type="password" class="form-control" id="inpConfirmPassword" placeholder="Confirm Password">
              </div>
            </div>
          </div>
          <div class="addl-info">
            By creating an account, you agree with the <a href="#" target="_blank">Terms and Conditions</a>.
          </div>
          <button id="btnSignUp" type="button" class="btn btn-primary btn-lg btn-block">Sign Up!</button>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
      /*
        Client-side validation - need to also add php server-side validation
        
        Validate --> All fields entered
                 --> Email address is valid and hasn't been used already by another user
                 --> Password meets certain minimum requirements
                 --> Password and Confirm Password fields match
      */
      
      //$("#frmRegister").on("submit", function() { 
      $("#btnSignUp").click(function() {
        
        var errors = "";
                
        if ($("#inpFirstName").val() === "") { //check to make sure doesn't contain number?
          errors = errors + "First Name is required.";
        }
        
        if ($("#inpLastName").val() === "") {
          errors = errors + "Last Name is required.";
        }
        
        if ($("#inpUserEmail").val() === "") {
          errors = errors + "Email is required.";
        }
        
        if ($("#inpPassword").val() === "") {
          errors = errors + "Password is required";
        }
        
        //add check for password strength
        
        if ($("#inpPassword").val() !== $("#inpConfirmPassword").val()) {
          errors = errors + "Password and Confirm Password must match exactly.";
        }
        
        //call php function via AJAX, if successful, it will create the user and send them to the form action url, otherwise, it will display any errors. 
        
        $.ajax({
          method: "POST",
          url: "./services/register_user.php",
          //data {} //pass registration data to function call
        })
        .done(function( msg ) {
          alert( "Data Saved: " + msg ); // success message or possibly just automatically redirect user to next appropriate page
        });
        
      });
    });
  </script>
<?php require 'templates/footer.php';?>