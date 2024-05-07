<?php
//untuk merender tampilan form member baik create atau update
  class MembersFormView {
    public function render($mode, $data=null){
      $form = null;
      $tpl = new Template("templates/form_members.html");
      $tpl->replace("VALUE_ID", @$data['member']['id']);
      $tpl->replace("VALUE_NAME", "'". @$data['member']['name']. "'");
      $tpl->replace("VALUE_EMAIL", "'". @$data['member']['email'] . "'");
      $tpl->replace("VALUE_PHONE", "'". @$data['member']['phone'] . "'");

      $gymOpt = "";
      foreach ($data['gym'] as $key => $value) {
        list($id, $nama_gym, $alamat, $jam_buka, $jam_tutup, $total_member) = $value;
        $is_selected = @$data['member']['gym_id'] == $id ? 'selected' : '';
        $gymOpt .= "<option value='$id' $is_selected>$nama_gym</option>";
      }

      $tpl->replace('DATA_GYM', $gymOpt);
      

      $tpl->write(); 
    }
  }
?>