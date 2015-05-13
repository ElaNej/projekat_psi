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
    
}
?>
