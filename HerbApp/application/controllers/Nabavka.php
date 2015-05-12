<?php

class Nabavka extends CI_Controller{
    
    public function listaZahtevi(){
         $this->template->load('nabavkaTemplate', 'nabavka/zahteviPregled', null);
    }
}
?>
