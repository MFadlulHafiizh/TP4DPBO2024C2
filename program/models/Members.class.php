<!-- Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal TP 4 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin -->
<?php

class Members extends DB{
    function getMembers(){
        $query = "SELECT members.*, gym.nama_gym FROM members JOIN gym ON members.gym_id = gym.id";
        return $this->execute($query);
    }
    function getMembersById($id){
        $query = "SELECT * FROM members WHERE id=$id";
        return $this->execute($query);
    }

    function add($request){
        $name = $request['name'];
        $email = $request['email'];
        $phone = $request['phone'];
        $join_date = date('Y-m-d');
        $gym_id = $request['gym_id'];
        $query = "INSERT INTO members VALUES('', '$name', '$email', '$phone', '$join_date', $gym_id)";
        return $this->executeAffected($query);
    }

    function update($id, $request){
        $name=$request["name"];
        $email=$request["email"];
        $phone=$request["phone"];

        $query = "update members set name='$name', email='$email', phone='$phone' where id='$id'";
        return $this->executeAffected($query);
    }

    function delete($id){
        $query = "DELETE from `members` where id=$id";
        return $this->executeAffected($query);
    }

}