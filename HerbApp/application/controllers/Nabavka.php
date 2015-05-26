<?php

class Nabavka extends CI_Controller{
    
    public function listaZahtevi(){
        
        $zahteviPending = $this->zahtevSirovinaModel->getAllPending();
        
        $sirovine = array();
        foreach($zahteviPending as $zahtev){
            $sirovina = $this->sirovinaModel->getById($zahtev->idZahtevSirov);
            $sirovine[$zahtev->idZahtevSirov] = $sirovina;
        }
        
        $data['zahtevi'] = $zahteviPending;
        $data['sirovine'] = $sirovine;
        $this->template->load('nabavkaTemplate', 'nabavka/zahteviPregled', $data);
    }
    
    public function potvrdiZahtev($idZahtevProiz, $idZahtevSirov){
        
        $this->zahtevSirovinaModel->updateStatus($idZahtevProiz, $idZahtevSirov, 'approved');
        $this->listaZahtevi();
    }
    
    public function odbijZahtev($idZahtevProiz, $idZahtevSirov){
        
        $this->zahtevProizvodnjaModel->updateStatus($idZahtevProiz, 'rejected');
        $this->zahtevProizvodnjaModel->releaseReservedSirovine($idZahtevProiz);
    }
    
    public function showArhiva(){
        
        $zahtevi = $this->zahtevSirovinaModel->getAllArchived();
        
        $sirovine = array();
        foreach($zahtevi as $zahtev){
            $sirovina = $this->sirovinaModel->getById($zahtev->idZahtevSirov);
            $sirovine[$zahtev->idZahtevSirov] = $sirovina;
        }
        
        $data['zahtevi'] = $zahtevi;
        $data['sirovine'] = $sirovine;
        $this->template->load('nabavkaTemplate', 'nabavka/arhivaPregled', $data);
    }
    
    //@Jecina f-ja iz Magacinlista proizvoda i sirovina u magacinu
    public function kompletanPregledMagacin(){
        
		$proizvodi=$this->proizvodModel->getAll();
		$sirovine=$this->sirovinaModel->getAll();
		$data['magacin'][1]=$proizvodi;
		$data['magacin'][2]=$sirovine;
                
        $this->template->load('nabavkaTemplate', 'nabavka/magacinPregled', $data);
    }
    
    public function showSirovine(){
        
        $sirovine = $this->sirovinaModel->getAll();
        $data['sirovine'] = $sirovine;
        
        $this->template->load('nabavkaTemplate', 'nabavka/sirovinePregled', $data);
    }
    
    public function showNewZahtev($id){
        
        $sirovina = $this->sirovinaModel->getById($id);
        $data['sirovina'] = $sirovina;
        
        $this->template->load('nabavkaTemplate', 'nabavka/novZahtev', $data);
    }
    
    public function createZahtev($id){
        $kolicina = $this->input->post('kolicina');
        
        $sirovina = $this->sirovinaModel->getById($id);
        $slobodno = $sirovina->magacinUk - $sirovina->magacinRez;
        
        if($kolicina <= $slobodno){
            $this->zahtevSirovinaModel->create(-1, $id, date('Y/m/d'), date('Y/m/d'), $kolicina, $kolicina, 'reserved');
            $this->sirovinaModel->addToRezervisano($sirovina->idSirovine, $kolicina);
        }
        else{
            $this->zahtevSirovinaModel->create(-1, $id, date('Y/m/d'), date('Y/m/d'), $kolicina, $slobodno, 'approved');
            $this->sirovinaModel->addToRezervisano($sirovina->idSirovine, $slobodno);
        }
        
        $this->showSirovine();
    }
}
?>
