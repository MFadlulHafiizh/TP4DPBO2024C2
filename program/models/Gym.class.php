<?php

class Gym extends DB{
    function getGym(){
        $query = "SELECT *, (SELECT COUNT(*) FROM members JOIN gym ON members.gym_id = gym.id) as total_member FROM gym";
        return $this->execute($query);
    }
    function getGymById($id){
        $query = "SELECT * FROM gym WHERE id=$id";
        return $this->execute($query);
    }

    function add($request){
        $nama_gym = $request['nama_gym'];
        $alamat = $request['alamat'];
        $jam_buka = $request['jam_buka'];
        $jam_tutup = $request['jam_tutup'];
        $query = "INSERT INTO gym VALUES('', '$nama_gym', '$alamat', '$jam_buka', '$jam_tutup')";
        return $this->executeAffected($query);
    }

    function update($id, $request){
        $nama_gym = $request['nama_gym'];
        $alamat = $request['alamat'];
        $jam_buka = $request['jam_buka'];
        $jam_tutup = $request['jam_tutup'];

        $query = "update gym set nama_gym='$nama_gym', alamat='$alamat', jam_buka='$jam_buka', jam_tutup='$jam_tutup' where id='$id'";
        return $this->executeAffected($query);
    }

    function delete($id){
        $query = "DELETE from `gym` where id=$id";
        return $this->executeAffected($query);
    }

}