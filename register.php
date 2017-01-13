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
                <span class="text-danger">*</span>
                <input type="text" class="form-control required" id="inpFirstName" name="firstName" placeholder="First Name" tabindex="1" maxlength="75">
              </div>
              <div class="form-group">
                <label for="inpLastName">Last Name</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control required" id="inpLastName" name="lastName" placeholder="Last Name" tabindex="2" maxlength="75">
              </div>
              <div class="form-group">
                <label for="inpUserEmail">Email address</label> <!-- Validate hasn't already been used -->
                <span class="text-danger">*</span>
                <input type="email" class="form-control required" id="inpUserEmail" name="userEmail" placeholder="Email" tabindex="3" maxlength="128">
              </div>
              <div class="form-group">
                <label for="inpPassword">Password</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control required" id="inpPassword" name="password" placeholder="Password" tabindex="4" maxlength="128">
              </div>
              <div class="form-group">
                <label for="inpConfirmPassword">Confirm Password</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control required" id="inpConfirmPassword" name="confirmPassword" placeholder="Confirm Password" tabindex="5" maxlength="128">
              </div>
            </div>
          </div>
          <div id="divAddlInfo" class="addl-info">
            By creating an account, you agree with the <a href="#" target="_blank">Terms and Conditions</a>.
          </div>
          <button id="btnSignUp" type="button" class="btn btn-primary btn-lg btn-block require-check" tabindex="6">Sign Up!</button>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
      /*
        Client-side validation - need to also add php server-side validation
        
        Validate --> Fields don't have any html or javascript in them, or strip tags...figure out if there is a best practice in php or jquery to handle this
                 --> Accessible
                 --> Check all aspects of security to make sure the obvious attacks are prevented
                 --> Email address is valid and hasn't been used already by another user
                 --> Add password hint in UI
      */
      
      //$("#frmRegister").on("submit", function() { 
      $("#btnSignUp").click(function() {
        
        var errors = validateInput();
        var passResult = validatePassword($("#inpPassword").val());
        
        // ADD ALL CHECKS TO PHP CODE ALSO
        if (passResult !== "pass") {
          errors = errors + passResult + "<br/>";
        }
        
        if ($("#inpPassword").val() !== $("#inpConfirmPassword").val()) {
          errors = errors + "Password and Confirm Password must match exactly.<br/>";
          $("#inpPassword").addClass("input-error");
          $("#inpConfirmPassword").addClass("input-error");
        }
        else {
          $("#inpPassword").removeClass("input-error");
          $("#inpConfirmPassword").removeClass("input-error");
        }
        
        if (errors === "") { //is this the correct check?
          //call php function via AJAX, if successful, it will create the user and send them to the form action url, otherwise, it will display any errors. 
          $.ajax({
            method: "POST",
            url: "./services/register_user.php",
            data: { first_name: $("#inpFirstName").val()
                  , last_name: $("#inpLastName").val()
                  , email: $("#inpUserEmail").val()
                  , password: $("#inpPassword").val()
                  , confirm_password: $("#inpConfirmPassword").val()
                  }
          })
          .done(function(data) {
            if (data !== "") { // maybe change to data not contains certain value
              $("#divAddlInfo").after(data);
            }
            // success message or possibly just automatically redirect user to next appropriate page
          })
          .fail(function (jqXHR, textStatus) {
            $(this).befores("<div class='bg-danger ft-error'>An unexpected error occurred: " + textStatus + "</div>");
          });
        }
        else { console.log("Errors.");
          $(this).before("<div class='bg-danger ft-error'>" + errors + "</div>");
        }
        
      });
    });
    
    function validatePassword(password) {
      if (password.length < 8) {
        return("Password must be at least 8 characters.");
      } 
      else if (password.length > 30) {
        return("Password cannot exceed 30 characters");
      } 
      else if (password.search(/\d/) == -1) {
        return("Password must contain at least one number.");
      }
      else if (password.search(/[a-z]/) == -1) {
        return("Password must contain at least one lowercase letter.");
      } 
      else if (password.search(/[A-Z]/) == -1) {
        return("Password must contain at least one uppercase letter.");
      } 
      else if (password.search(/[!@#\$%\&\(\)\_\+]/) == -1) { //!, @, #, $, %, &, (, )
        return("Password must contain one of the following: !, @, #, $, %, &, (, )");
      }
      return("pass");
    }
  </script>
<?php require 'templates/footer.php';?>