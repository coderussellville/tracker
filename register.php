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
    //$(document).ready(function() {
    //  $("#btnSignUp").click(function() {
    //    $(".ft-error").empty().hide();
    //  $.ajax({
    //        method: "POST",
    //        url: "./services/register_user.php",
    //        data: { first_name: $("#inpFirstName").val()
    //              , last_name: $("#inpLastName").val()
    //              , email: $("#inpUserEmail").val()
    //              , password: $("#inpPassword").val()
    //              , confirm_password: $("#inpConfirmPassword").val()
    //              }
    //      })
    //      .done(function(data) {
    //        if (data !== "") { // maybe change to data not contains certain value
    //          //$("#divAddlInfo").after(data);
    //          //console.log(data);
    //          $("#btnSignUp").before(data);
    //        }
    //        // success message or possibly just automatically redirect user to next appropriate page
    //      })
    //      .fail(function (jqXHR, textStatus) {
    //        $(this).before("<div class='bg-danger ft-error'>An unexpected error occurred: " + textStatus + "</div>");
    //      });
    //  });
    //});
    
    
    
    $(document).ready(function () {
      /*
        Client-side validation - need to also add php server-side validation
        
        Validate --> Fields don't have any html or javascript in them, or strip tags...figure out if there is a best practice in php or jquery to handle this
                 --> Accessible
                 --> Check all aspects of security to make sure the obvious attacks are prevented (need to add AJAX call security, etc.)
                 --> Email address is valid and hasn't been used already by another user
                 --> Add password hint in UI
                 --> Add validation on server-side as well
      */
      
      $("#btnSignUp").click(function() {
        
        var errors = validateInput();
        
        //validate email address - regex probably
        //add CAPTCHA, or similar?
        
        var emailResult = validateEmailAddress($("#inpUserEmail").val());
        if (emailResult !== "pass") {
          errors = errors + emailResult + "<br/>";
        }
        
        var passResult = validatePassword($("#inpPassword").val());
        
        if (passResult !== "pass") {
          errors = errors + passResult + "<br/>";
        }
        else {
          if ($("#inpPassword").val() !== $("#inpConfirmPassword").val()) {
            errors = errors + "Password and Confirm Password must match exactly.<br/>";
            $("#inpPassword, #inpConfirmPassword").addClass("input-error");
          }
          else {
            $("#inpPassword, #inpConfirmPassword").removeClass("input-error");
          }
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
              $("#btnSignUp").before(data);
            }
          })
          .fail(function (jqXHR, textStatus) {
            $("#btnSignUp").before("<div class='bg-danger ft-error'>An unexpected error occurred: " + textStatus + "</div>");
          });
        }
        else {
          $(this).before("<div class='bg-danger ft-error'>" + errors + "</div>");
        }
        
      });
    });
    
  </script>
<?php require 'templates/footer.php';?>


