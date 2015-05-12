<?php

class Proizvodnja extends CI_Controller{
 
    public function listaProizvoda(){
         $proizvodi = $this->proizvodModel->getAll();
         $data['proizvodi'] = $proizvodi;
         $this->template->load('proizvodnjaTemplate', 'proizvodnja/proizvodiPregled', $data);
    }
    
    public function napraviProizvod($id){

        $proizvod = $this->proizvodModel->getById($id);
        $data['proizvod'] =  $proizvod;
        if($proizvod != null){
            $days = array(1, 31);
        $this->template->load('proizvodnjaTemplate', 'proizvodnja/napravi', $data);
        }
        else
            $this->listaProizvoda ();
    }
    
    public function rezervisiSirovine($id){
        
        $sirovine = $this->proizvodModel->getSirovine($id);
        foreach($sirovine as $sirovina){
            
        }
    }
}
?>
