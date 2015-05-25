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
		$this->load->helper('url');
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
	 
	 //azuriranje sirovine 
	 //Ivanova f.ja
	 public function updateSirovina($id, $magacinRez){
            
            $naziv = $this->input->post('naziv');
            $serBr = $this->input->post('serBr');
            $vremePristiz = $this->input->post('vremePristiz');
            $magacinUk = $this->input->post('magacinUk');
            $jedinica = $this->input->post('jedinica');
            
            $this->sirovinaModel->update($id, $naziv, $serBr, $vremePristiz, $jedinica, $magacinUk, $magacinRez);
            
            $this->listaMagacin();
        }
	 
	
	//arhiva-dodatna funkcionalnost
	public function PregledArhive(){
	
	$this->template->load('magacinTemplate', 'magacin/pregledArhive');
		//todo
	}
	
	//kreiranje sirovine pregled
	
	public function kreirajSirovinu(){
	$this->template->load('magacinTemplate', 'magacin/kreirajSirovinu');
	}
	
	////Ivanova f.ja za kreiranje sirovine
	public function createSirovina(){
			$naziv = $this->input->post('naziv');
            $serBr = $this->input->post('serBr');
            $vremePristiz = $this->input->post('vremePristiz');
            $magacinUk = $this->input->post('magacinUk');
            $jedinica = $this->input->post('jedinica');
            
            $this->sirovinaModel->create($naziv, $serBr, $vremePristiz, $jedinica, $magacinUk, 0);
            
            $this->listaMagacin();
        }
	
	
	//azuriranje stanja sirovine u magacinu - pregled
	public function azurirajStanjeSirovina(){
	$sirovine=$this->sirovinaModel->getAll();
	$data['sirovina']=$sirovine;
	$this->template->load('magacinTemplate','magacin/azuriranjeStanjaSirovine',$data);	
		
	}
	
	//azuriranje stanja proizvoda u magacinu - pregled
	public function azurirajStanjeProizvoda(){
	$proizvodi=$this->proizvodModel->getAll();	
	$data['proizvod']=$proizvodi;
	$this->template->load('magacinTemplate','magacin/azuriranjeStanjaProizvoda',$data);	
		
	}
		
	//azuriranje stanja sirovine
	public function updateStanjeSirovina(){	
		$id=$this->input->post('idSir');
		$kol=$this->input->post('Kol');
		$sir=$this->sirovinaModel->getById($id);
		$naziv=$sir->naziv;
		$serBr=$sir->serBr;
		$vremePristiz=$sir->vremePristiz;
		$jedinica=$sir->jedinica;
		$magacinUk=$kol;
		$magacinRez=$sir->magacinRez;
		$this->sirovinaModel->update($id, $naziv, $serBr, $vremePristiz, $jedinica, $magacinUk, $magacinRez);		
	}
	
	
	
	//vracanje stanja u magacinu AJAX skriptica
	public function VratiStanjeSir(){
		       $id= $this->input->post('idSir');
			   $sir=$this->sirovinaModel->getById($id);
			   $stanjeUk=$sir->magacinUk;
			   $stanjeRez=$sir->magacinRez;
			   $data['stanjeUk']=$stanjeUk;
			   $data['stanjeRez']=$stanjeRez;
			   echo json_encode($data);
	}

	
	//azuriranje stanja proizvoda
	public function updateStanjeProizvoda(){
		$id=$this->input->post('idPr');
		$kol=$this->input->post('Kol');
		$pr=$this->proizvodModel->getById($id);
		$naziv=$pr->naziv;
		$neto=$pr->neto;
		$serBr=$pr->serBr;
		$this->proizvodModel->update($id,$naziv,$neto,$serBr,$kol);
		
		
	}
	
	//vracanje stanja u magacinu AJAX skriptica
	public function VratiStanjePr(){
		       $id= $this->input->post('idPr');
			   $pr=$this->proizvodModel->getById($id);
			   $stanje=$pr->kolicinaMagacin;
			   //$data['stanje']=$stanje;
			   echo json_encode($stanje);
	}
	
	
	 
	public function pretraga($str) {
	
	$ime=$str;
	$rez = array();
    $sirovine=$this->sirovinaModel->getAll();
	if ($str=="sveSirovine") $rez=$sirovine;
	else 
		foreach($sirovine as $sirovina){
		 
            if (strpos($sirovina->naziv,$str) === 0) {
                array_push($rez, $sirovina);
            }
        }
        
    
	
	
	//foreach ($sirovine as $val) 
	//if ($val->naziv==$ime) break;
	//$data['id']=$val->idSirovine;
	//$data['ime']=$val->naziv;
//	$data['serBr']=$val->serBr;
//	$data['kol']=$val->magacinUk;

    echo json_encode($rez);
		
		}
	
	
	

}