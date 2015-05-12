<?php

class Magacin extends CI_Controller{
 
    public function listaMagacin(){
        $this->template->load('magacinTemplate', 'magacin/magacinPregled', null);
    }
}
?>
