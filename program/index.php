<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();
if(isset($_GET['action'])){
    switch($_GET['action']){
        case 'add':
            $members->toForm();
        break;
        case 'edit':
            $members->toForm($_GET['id']);
        break;
        case 'delete':
            $members->delete($_GET['id']);
        break;
    }
}else if(isset($_POST['submit'])){
    if($_POST['id'] != null) {
        $id = $_POST['id'];
        $members->update($id, $_POST);
    } else {
        $members->add($_POST);
    }
}
else{
    $members->index();
}
