<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Gym.controller.php");

$gym = new GymController();
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'add':
            $gym->toForm();
        break;
        case 'edit':
            $gym->toForm($_GET['id']);
        break;
        case 'delete':
            $gym->delete($_GET['id']);
        break;
    }
}else if(isset($_POST['submit'])){
    if($_POST['id'] != null) {
        $id = $_POST['id'];
        $gym->update($id, $_POST);
    } else {
        $gym->add($_POST);
    }
}
else{
    $gym->index();
}
