<?php

  class GymView {
    public function render($data){
      $dataGym = null;
      $no = 1;
      foreach($data['gym'] as $val){
        list($id, $nama_gym, $alamat, $jam_buka, $jam_tutup, $total_member) = $val;
        $dataGym .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama_gym . "</td>
                <td>" . $alamat . "</td>
                <td>" . $jam_buka . "</td>
                <td>" . $jam_tutup . "</td>
                <td>" . $total_member . "</td>
                <td>
                  <a href='gym.php?action=edit&id=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='gym.php?action=delete&id=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
        
       
        $dataGym .= "</tr>";
      }
      $tpl = new Template("templates/gym.html");

      $tpl->replace("DATA_TABEL", $dataGym);
      $tpl->write(); 
    }
  }
?>