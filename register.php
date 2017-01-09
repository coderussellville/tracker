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
                <input type="text" class="form-control" id="inpFirstName" name="firstName" placeholder="First Name" tabindex="1">
              </div>
              <div class="form-group">
                <label for="inpLastName">Last Name</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control" id="inpLastName" name="lastName" placeholder="Last Name" tabindex="2">
              </div>
              <div class="form-group">
                <label for="inpUserEmail">Email address</label> <!-- Validate hasn't already been used -->
                <span class="text-danger">*</span>
                <input type="email" class="form-control" id="inpUserEmail" name="userEmail" placeholder="Email" tabindex="3">
              </div>
              <div class="form-group">
                <label for="inpPassword">Password</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control" id="inpPassword" name="password" placeholder="Password" tabindex="4">
              </div>
              <div class="form-group">
                <label for="inpConfirmPassword">Confirm Password</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control" id="inpConfirmPassword" name="confirmPassword" placeholder="Confirm Password" tabindex="5">
              </div>
            </div>
          </div>
          <div id="divAddlInfo" class="addl-info">
            By creating an account, you agree with the <a href="#" target="_blank">Terms and Conditions</a>.
          </div>
          <button id="btnSignUp" type="button" class="btn btn-primary btn-lg btn-block" tabindex="6">Sign Up!</button>
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
        $(".ft-error").empty();
                
        if ($("#inpFirstName").val() === "") { //check to make sure doesn't contain number?
          errors = errors + "First Name is required.<br/>";
        }
        
        if ($("#inpLastName").val() === "") {
          errors = errors + "Last Name is required.<br/>";
        }
        
        if ($("#inpUserEmail").val() === "") {
          errors = errors + "Email is required.<br/>";
        }
        
        if ($("#inpPassword").val() === "") {
          errors = errors + "Password is required.<br/>";
        }
        
        if ($("#inpConfirmPassword").val() === "") {
          errors = errors + "Confirm Password is required.<br/>";
        }
        //add check for password length and strength
        
        if ($("#inpPassword").val() !== $("#inpConfirmPassword").val()) {
          errors = errors + "Password and Confirm Password must match exactly.<br/>";
        }
        
        if (errors === "") {
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
            //console.log("Error!" + textStatus);
          });
        }
        else {
          console.log("Client-side");
          $("#divAddlInfo").after("<div class='bg-danger ft-error'>" + errors + "</div>");
        }
        
      });
    });
  </script>
<?php require 'templates/footer.php';?>