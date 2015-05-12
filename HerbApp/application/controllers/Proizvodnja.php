<?php

class Proizvodnja extends CI_Controller{
 
    public function listaProizvoda(){
         $this->template->load('proizvodnjaTemplate', 'proizvodnja/proizvodiPregled', null);
    }
}
?>
