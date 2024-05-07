<!-- Saya Muhammad Muhammad Fadlul Hafiizh [2209889] mengerjakan soal TP 4 dalam mata kuliah DPBO.
untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan, Aamiin -->
<?php
//untuk merender tampilan form gym baik create atau update
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