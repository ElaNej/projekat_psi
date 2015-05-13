<?php

class ZahtevProizvodnjaModel extends CI_Model{
    
    //Funkcija za kreiranje zahteva
    public function create($idProizvod, $datum, $kolicina, $status){
        
        $proizvodnjaZahtev = array(
            'idProizvod' => $idProizvod,
            'datum' => $datum,
            'kolicina' => $kolicina,
            'status' => $status,
            );
        
        $this->db->insert('zahtevproizvodnja',$proizvodnjaZahtev);
        return $this->db->insert_id();
    }
    
    //Ukoliko odredjeno polje ne treba da se update-uje proslediti vrednost starog podatka, nikako null!
    //Id odredjuje koji zahtev se update-uje.
    public function update($id, $idProizvod, $datum, $kolicina){
        
        $proizvodnjaZahtev = array(
            'idProizvod' => $idProizvod,
            'datum' => $datum,
            'kolicina' => $kolicina,
            'status' => $status,
            );
        
        $this->db->where('idZahtev',$id);
        $this->db->update('zahtevproizvodnja',$proizvodnjaZahtev);
    }
    
    //Brisanje zahteva
    public function delete($id){
        $this->db->where('idZahtev', $id);
        $this->db->delete('zahtevproizvodnja');
    }
    
    //public function addProizvod;
}
?>
