<?php

  class GymFormView {
    public function render($mode, $data=null){
      
      $form = null;
      $tpl = new Template("templates/form_gym.html");
      $tpl->replace("VALUE_ID", @$data['id']);
      $tpl->replace("VALUE_NAMA_GYM", "'" . @$data['nama_gym'] . "'");
      $tpl->replace("VALUE_ALAMAT", "'" . @$data['alamat'] . "'");
      $tpl->replace("VALUE_JAM_BUKA", @$data['jam_buka']);
      $tpl->replace("VALUE_JAM_TUTUP", @$data['jam_tutup']);
      

      $tpl->write(); 
    }
  }
?>