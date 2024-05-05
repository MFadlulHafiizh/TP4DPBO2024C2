<?php
include_once("connection.php");
include_once("models/Gym.class.php");
include_once("views/Gym.view.php");
include_once("views/GymForm.view.php");

class GymController {
  private $gym;

  function __construct(){
    $this->gym = new Gym(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  public function index() {
    $this->gym->open();
    $this->gym->getGym();
    
    $data = array(
      'gym' => array()
    );
    while($row = $this->gym->getResult()){
      array_push($data['gym'], $row);
    }
    $this->gym->close();

    $view = new GymView();
    $view->render($data);
  }

  function toForm($id=null){
    $mode = "create";
    $data = null;
    if($id != null){
      $this->gym->open();
      $this->gym->getGymById($id);
      $data = $this->gym->getResult();
      $this->gym->close();
      $mode = "update";
    }

    $view = new GymFormView();
    $view->render($mode, $data);
  }
  
  function add($data){
    $this->gym->open();
    $this->gym->add($data);
    $this->gym->close();
    
    header("location:gym.php");
  }

  function update($id, $data){
    $this->gym->open();
    $this->gym->update($id, $data);
    $this->gym->close();

    header("location:gym.php");
  }

  function delete($id){
    $this->gym->open();
    $this->gym->delete($id);
    $this->gym->close();

    header("location:gym.php");
  }

}