<!-- Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal TP 4 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin -->

<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController(); //instansiasi controller
if(isset($_GET['action'])){ //periksa apakah ada parameter action pada url
    switch($_GET['action']){//bila ada maka cek value dari params action
        case 'add'://memanggil fungsi pada controller sesuai value params action
            $members->toForm();
        break;
        case 'edit':
            $members->toForm($_GET['id']);
        break;
        case 'delete':
            $members->delete($_GET['id']);
        break;
    }
}else if(isset($_POST['submit'])){ //cek apakah ada request post berupa submit form
    if($_POST['id'] != null) {//cek juga apakah ada form data id pada request bila ada maka panggil fungsi update bila tidak maka create
        $id = $_POST['id'];
        $members->update($id, $_POST);
    } else {
        $members->add($_POST);
    }
}
else{
    $members->index();
}
