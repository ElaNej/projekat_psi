<?php

class ZahtevNabavkaModel extends CI_Model{
    
    //Funkcija za kreiranje zahteva
    public function create($idZahtevProiz, $datumKreiranja, $datumNabavke, $status){
        
        $nabavkaZahtev = array(
            'idZahtevProiz' => $idZahtevProiz,
            'datumKreiranja' => $datumKreiranja,
            'datumNabavke' => $datumNabavke,
            'status' => $status,
            );
        
        $this->db->insert('zahtevnabavka',$nabavkaZahtev);
    }
    
    //Ukoliko odredjeno polje ne treba da se update-uje proslediti vrednost starog podatka, nikako null!
    //Id odredjuje koji zahtev se update-uje.
    public function update($id,$idZahtevProiz, $datumKreiranja, $datumNabavke, $status){
        
        $nabavkaZahtev = array(
            'idZahtevProiz' => $idZahtevProiz,
            'datumKreiranja' => $datumKreiranja,
            'datumNabavke' => $datumNabavke,
            'status' => $status,
            );
        
        $this->db->where('idZahtevNab',$id);
        $this->db->update('zahtevnabavka',$nabavkaZahtev);
    }
    
    //Brisanje zahteva
    public function delete($id){
        $this->db->where('idZahtevNab', $id);
        $this->db->delete('zahtevnabavka');
    }
}
?>
