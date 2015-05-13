<?php

class ZahtevSirovinaModel extends CI_Model{
    
    //Funkcija za kreiranje zahteva
    public function create($idZahtevProiz, $idZahtevSirov, $datumKreiranja, $datumComplete, $kolicina, $rezervisano, $status){
        
        $sirovinaZahtev = array(
            'idZahtevProiz' => $idZahtevProiz,
            'idZahtevSirov' => $idZahtevSirov,
            'datumKreiranja' => $datumKreiranja,
            'datumComplete' => $datumComplete,
            'kolicina' => $kolicina,
            'rezervisano' => $rezervisano,
            'status' => $status,
            );
        
        $this->db->insert('zahtevsirovina', $sirovinaZahtev);
    }
    
    //Ukoliko odredjeno polje ne treba da se update-uje proslediti vrednost starog podatka, nikako null!
    //Id odredjuje koji zahtev se update-uje.
    //idZahtevProiz i idZahtevSirov ne mogu nikada da se promene, jer oni identifikuju zahtev za sirovinu
    public function update($idZahtevProiz, $idZahtevSirov, $datumKreiranja, $datumComplete, $kolicina, $rezervisano, $status){
        
        $sirovinaZahtev = array(
            //'idZahtevProiz' => $idZahtevProiz,
            //'idZahtevSirov' => $idZahtevSirov,
            'datumKreiranja' => $datumKreiranja,
            'datumComplete' => $datumComplete,
            'kolicina' => $kolicina,
            'rezervisano' => $rezervisano,
            'status' => $status,
            );
        
        $this->db->where('idZahtevProiz',$idZahtevProiz);
        $this->db->where('idZahtevSirov',$idZahtevSirov);
        $this->db->update('zahtevsirovina', $sirovinaZahtev);
    }
    
    //Brisanje
    public function delete($idZahtevProiz, $idZahtevSirov){
        $this->db->where('idZahtevProiz',$idZahtevProiz);
        $this->db->where('idZahtevSirov',$idZahtevSirov);
        $this->db->delete('zahtevsirovina');
    }
    
    
    public function updateStatus($idZahtevProiz, $idZahtevSirov, $newStatus){
        
        $sirovinaZahtev = array('status' => $newStatus);
        
        $this->db->where('idZahtevProiz',$idZahtevProiz);
        $this->db->where('idZahtevSirov',$idZahtevSirov);
        $this->db->update('zahtevsirovina', $sirovinaZahtev);
    }
    
    //Azurira status za prosledjeni niz zahteva
    //Poziva se iz funkcije refreshAllStatus
    //Ne pozivati ovu f-ju za update statusa, vec refreshAllStatus
    public function refreshZahteviArray($result){
        
        foreach($result as $zahtev){
            
            $potrebno = $zahtev->kolicina - $zahtev->rezervisano;
            $sirovina = $this->sirovinaModel->getById($zahtev->idZahtevSirov);
            $slobodno = $sirovina->magacinUk - $sirovina->magacinRez;
            if($slobodno == 0) break;
            
            if($potrebno <= $slobodno){
               $this->zahtevSirovinaModel->update($zahtev->idZahtevProiz, $zahtev->idZahtevSirov, $zahtev->datumKreiranja, date('Y/m/d'), $zahtev->kolicina,  $zahtev->kolicina, 'reserved');
               $this->sirovinaModel->addToRezervisano($sirovina->idSirovine, $potrebno);
               //Azurira status zahteva proizvodnje ako su sve sirovine pribavljene
               $this->zahtevProizvodnjaModel->refreshStatus($zahtev->idZahtevProiz);
            }
            //TODO Ako nema dovoljno, svejedno dopuni kolicinu, ali ne azurira status
        }
    }
    
    /*
     * Metoda koja update-uje status zahteva koji cekaju da budu ispunjeni.
     * Prvo se ispunjavai approved zahtevi, pa pending zahtevi
     * Pozivati funkciju kada se poveca stanje u magacinu neke sirovine.
     * Argument je id sirovina cije stanje se povecalo.
     */
    public function refreshAllZahtevi($idSirovine){
        
        //Approved zahtevi
        //TODO DA LI DOBRO VRACA REDOSLED DATUMA?
        $this->db->select();
        $this->db->from('zahtevsirovina');
        $this->db->where('status', 'approved');
        $this->db->where('idZahtevSirov', $idSirovine);
        $this->db->order_by('datumComplete', 'desc');
        $upitResvApproved = $this->db->get();
        
        $resultApproved = $upitResvApproved->result();
        
        $this->refreshZahteviArray($resultApproved);
        
        //Pending zahtevi
        $this->db->select();
        $this->db->from('zahtevsirovina');
        $this->db->where('status', 'pending');
        $this->db->where('idZahtevSirov', $idSirovine);
        $this->db->order_by('datumComplete', 'desc');
        $upitResvPending = $this->db->get();
        
        $resultPending = $upitResvPending->result();
        
        $this->refreshZahteviArray($resultPending);
    }
    
}
?>