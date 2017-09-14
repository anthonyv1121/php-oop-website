<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shareboard</title>
    <meta name="description" content="DESCRIPTION">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/style.css">

    <!--[if lt IE 9]>
      <script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Shareboard</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo ROOT_URL;?>">Home</a></li>
          <li><a href="<?php echo ROOT_URL;?>shares">Shares</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php
           if(isset($_SESSION['is_logged_in'])) : ?>
           <li><span class="welcome"><?php echo "Welcome {$_SESSION['user_data'][name]}";?></span></li>
           <li><a href="<?php echo ROOT_URL;?>users/logout">Logout</a></li>

          <?php else : ?>
            <li><a href="<?php echo ROOT_URL;?>users/login">Login</a></li>
            <li><a href="<?php echo ROOT_URL;?>users/register">Register</a></li>
          <?php endif; ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">

    <div class="row">
      <?php Messages::display(); ?>
      <?php if($user_logged_out) : ?>
        <h4>You have sucessfully logged out</h4>
        <?php endif; ?>
         <?php require($view); ?>
    </div>

  </div><!-- /.container -->

</body>

</html>
