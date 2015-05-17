<?php

class Magacin extends CI_Controller{
 
 
 //lista proizvoda i sirovina u magacinu
    public function kompletanPregledMagacin(){
		$proizvodi=$this->proizvodModel->getAll();
		$sirovine=$this->sirovinaModel->getAll();
		$data['magacin'][1]=$proizvodi;
		$data['magacin'][2]=$sirovine;
        $this->template->load('magacinTemplate', 'magacin/KompletnoStanje', $data);
    }
	
	//POCETNA ZA MAGACIN
	//lista sirovina u magacinu 
	public function listaMagacin(){
		$sirovine=$this->sirovinaModel->getAll();
		$data['sirovina']=$sirovine;
		$data['pretraga']='';
		$this->template->load('magacinTemplate','magacin/magacinPregled',$data);
		
	}
	
	//azuriranje sirovine
	 public function azurirajSirovinu($idSirovina){
		$sirovina = $this->sirovinaModel->getById($idSirovina);
		$data['sirovina'] =  $sirovina;
        if($sirovina != null){
        $this->template->load('magacinTemplate', 'magacin/azurirajSirovinu', $data);
	  }     
	 }
	
	//arhiva-dodatna funkcionalnost
	public function PregledArhive(){
	
	$this->template->load('magacinTemplate', 'magacin/pregledArhive');
		//todo
	}
	
	//kreiranje sirovine
	public function kreirajSirovinu(){
		
	$this->template->load('magacinTemplate', 'magacin/kreirajSirovinu');
	}
	//azuriranje stanja u magacinu
	public function azurirajStanje(){
	$this->template->load('magacinTemplate','magacin/azuriranjeStanja');	
		
	}
	
	//PROBLEM!!
	public function pretraga($name){
		$data['name']=$name;
		//tbd proslednjivanje odgovarajuce sirovine itd.
		echo $this->load->view('search_view',$data,true);
	}

}