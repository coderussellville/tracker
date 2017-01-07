<?php require 'templates/header.php';?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form class="x-input-form">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Register</h3>
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
          <div class="addl-info">
            By creating an account, you agree with the <a href="#" target="_blank">Terms and Conditions</a>.
          </div>
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up!</button>
        </form>
      </div>
    </div>
  </div>
<?php require 'templates/footer.php';?>