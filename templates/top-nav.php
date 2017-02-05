    <nav class="navbar navbar-inverse">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Memories</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="main-navbar-collapse">
          <ul class="nav navbar-nav">
          <!-- Determine what shows when logged in vs. not logged in -->
            <li>
              <a href="#top" title="<?php echo $siteTitle ?>"><i class="fa fa-home"></i> Home</a>
            </li>
            <li>
              <a href="#about" title="About <?php echo $siteTitle ?>"><i class="fa fa-user"></i> About</a>
            </li>
            <!--
            <li>
              <a href=#services title="<?php echo $siteTitle ?>"><i class="fa fa-cogs"></i> Services</a>
            </li>
            <li>
              <a href="#portfolio" title="<?php echo $siteTitle ?>"><i class="fa fa-file-code-o"></i> Portfolio</a>
            </li>
            -->
            <li>
              <a href="#contact" title="Contact <?php echo $siteTitle ?>"><i class="fa fa-phone"></i> Contact</a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>