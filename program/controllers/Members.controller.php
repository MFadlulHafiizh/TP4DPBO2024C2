<?php
include_once("connection.php");
include_once("models/Members.class.php");
include_once("models/Gym.class.php");
include_once("views/Members.view.php");
include_once("views/MembersForm.view.php");

class MembersController {
  private $members,$gym;

  function __construct(){
    $this->members = new Members(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    $this->gym = new Gym(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->members->getMembers();
    
    $data = array(
      'members' => array()
    );
    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }
    $this->members->close();

    $view = new MembersView();
    $view->render($data);
  }

  function toForm($id=null){
    $mode = "create"; 
    $member=null;
    if($id != null){
      $this->members->open();
      $this->members->getMembersById($id);
      $member = $this->members->getResult();
      $this->members->close();
      $mode = "update";
    }
    $this->gym->open();
    $this->gym->getGym();
    $data = array(
      'gym' => array(),
      'member' => $member
    );
    while($row = $this->gym->getResult()){
      array_push($data['gym'], $row);
    }
    $this->gym->close();
    $view = new MembersFormView();
    $view->render($mode, $data);
  }
  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function update($id, $data){
    $this->members->open();
    $this->members->update($id, $data);
    $this->members->close();

    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();

    header("location:index.php");
  }

}