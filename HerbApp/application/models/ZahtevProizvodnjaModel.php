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
    public function update($id, $idProizvod, $datum, $kolicina, $status){
        
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
    
    public function getById($id){
                
        $this->db->select();
        $this->db->from('zahtevproizvodnja');
        $this->db->where('idZahtev', $id);
        $upit = $this->db->get();
        
        $res = $upit->result();
        if($upit->num_rows() > 0)
        return $res[0];
        else
            return null;
    
    }
    
    public function getAllZahtevSirovineForZahtevProizvod($id){
        
        $this->db->select();
        $this->db->from('zahtevsirovina');
        $this->db->where('idZahtevProiz', $id);
        $upit = $this->db->get();
        
        return $upit->result();
    }
    
    //Updateuje se status proizvoda ukoliko su sve potrebne sirovine rezervisane.
    //Funkcija se poziva kada se promeni status nekog zahteva za sirovinom.
    public function refreshStatus($id){
        
        $zahtevi = $this->getAllZahtevSirovineForZahtevProizvod($id);
        
        $isReserved = true;
        foreach($zahtevi as $zahtev){
            if((strcmp($zahtev->status,'reserved')) != 0)
                $isReserved = false;
        }
        
        if($isReserved) 
        {
            $zahtevPr = $this->getById($id);
            $this->update($id, $zahtevPr->idProizvod, $zahtevPr->datum, $zahtevPr->kolicina, 'reserved');
        }
    }
    
    //public function addProizvod;
}
?>
