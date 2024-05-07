<!-- Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal TP 4 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin -->
<?php
//untuk merender tampilan daftar member
  class MembersView {
    public function render($data){
      $dataMembers = null;
      // echo "<pre>";
      // print_r($data['members']);
      // echo "</pre>";
      foreach($data['members'] as $val){
        list($id, $name, $email, $phone, $join_date, $gym_id, $nama_gym) = $val;
        $dataMembers .= "<tr>
                <td>" . $id . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $nama_gym . "</td>
                <td>
                  <a href='index.php?action=edit&id=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?action=delete&id=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
        
       
        $dataMembers .= "</tr>";
      }
      $tpl = new Template("templates/index.html");

      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write(); 
    }
  }
?>