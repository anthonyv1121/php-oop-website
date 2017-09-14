<?php
// Start Session
session_start();

//Include Config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

$bootstrap = new Bootstrap($_GET); // get super global (based on htaccess settings)

$controller = $bootstrap->createController();
if($controller){
  $controller->executeAction();
}
