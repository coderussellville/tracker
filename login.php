<?php require 'templates/header.php';?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="frmLogin" class="x-input-form" method="post" action="">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Enter your account information to log in</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label for="inpUserEmail">Email address</label>
                <input type="email" class="form-control" id="inpUserEmail" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="inpPassword">Password</label>
                <input type="password" class="form-control" id="inpPassword" placeholder="Password">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Log In</button>
          <div id="divAddlInfo" class="addl-info">
            <br/>
            <p>If you do not have an account, <a href="register.php" >Register</a> today.</p>
            <p><a href="#">Forgot Account information?</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
      /*
        Client-side validation - need to also add php server-side validation
        
        Validate --> All fields entered
                 --> Email exists in system
                 --> Password is valid
      */
      
      $("#frmLogin").on("submit", function() {
        // Validate - possibly call off to a web service to log user in
      });
    });
  </script>
<?php require 'templates/footer.php';?>