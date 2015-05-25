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
    }
    
    public function odbijZahtev($idZahtevProiz, $idZahtevSirov){
        
        $this->zahtevProizvodnjaModel->updateStatus($idZahtevProiz, 'rejected');
        $this->zahtevProizvodnjaModel->releaseReservedSirovine($idZahtevProiz);
    }
}
?>
