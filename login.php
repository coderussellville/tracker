<?php require 'templates/header.php';?>
  <div class="container-fluid">
    <div class="row">
      
      
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <form id="login">
                <div class="form-group">
                  <label for="inpUsernameEmail">Username or Email address</label>
                  <input type="email" class="form-control" id="inpUsernameEmail" placeholder="Username or Email">
                </div>
                <div class="form-group">
                  <label for="inpPassword">Password</label>
                  <input type="password" class="form-control" id="inpPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
              </form>
            </div>
          </div>
        </div>
      
      
      
    </div>
  </div>
<?php require 'templates/footer.php';?>