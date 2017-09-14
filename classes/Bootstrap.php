<?php
class Bootstrap{
  private $controller;
  private $action;
  private $request;

  // get URL request: php.dev/controller/action
  public function __construct($request){
    $this->request = $request;

    if($this->request['controller']== ""){ // check if at the root
      $this->controller = 'home';
    } else{
      $this->controller = $this->request['controller'];
    }
    if($this->request['action'] == ""){
      $this->action = "index"; // if no sub folder set to index
    }else{
      $this->action = $this->request['action'];
    }
  //echo $this->action;
  }
  public function createController(){
    //check class
    if(class_exists($this->controller)){ // check if there is a match class file to the controller name
      $parents = class_parents($this->controller); // get the parent class of the controller
    //print_r($parents);
      //Check extend
      if(in_array("Controller", $parents)){ // is there a base controller class
          if(method_exists($this->controller, $this->action)){ // is there a method name (action=index) in controller class
            return new $this->controller($this->action, $this->request); //if so insantiate class
          }else{
            //Method Doesn't exist
            echo "<h1>Method Doesn't Exist</h1>";
          }
      }else{
        //Base Controller Isn't Found
        echo "<h1>Base Controller Isn't Found</h1>";
      }
    }else{
      //Controller Class Doesn't Exist
      echo "<h1>Controller Class Doesn't Exist</h1>";
    }
  }
}
