<?php
// Base Controller
abstract class Controller{
  protected $request;
  protected $action;
  public function __construct($action, $request){
    $this->action=$action;
    $this->request=$request;
  }
  public function executeAction(){
    return $this->{$this->action}(); // trigger method passed is $action
  }
  protected function returnView($viewModel, $fullView){
    $view = 'views/' . get_class($this) . '/' .  $this->action . '.php'; // get view file for whatever the action is
    // views/ClassName/action.php
    if($fullView){
      require('views/main.php'); // main layout file (global elements you want on every page)
    }else{
      require($view);
    }
  }
}
