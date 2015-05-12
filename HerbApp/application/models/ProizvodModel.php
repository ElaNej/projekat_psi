<?php

class ProizvodModel extends CI_Model{
    
    //Funkcija za kreiranje proizvoda
    public function create($naziv, $neto, $serBr, $kolicinaMagacin){
        
        $proizvod = array(
            'naziv' => $naziv,
            'neto' => $neto,
            'serBr' => $serBr,
            'kolicinaMagacin' => $kolicinaMagacin,
            );
        
        $this->db->insert('proizvod',$proizvod);
    }
    
    //Ukoliko odredjeno polje ne treba da se update-uje proslediti vrednost starog podatka, nikako null!
    //Id odredjuje koji proizvod se update-uje.
    public function update($id,$naziv, $neto, $serBr, $kolicinaMagacin){
        
        $proizvod = array(
            'naziv' => $naziv,
            'neto' => $neto,
            'serBr' => $serBr,
            'kolicinaMagacin' => $kolicinaMagacin,
            );
        
        $this->db->where('idProizvoda',$id);
        $this->db->update('proizvod',$proizvod);
    }
    
    //Brisanje proizvoda
    public function delete($id){
        $this->db->where('idProizvoda', $id);
        $this->db->delete('proizvod');
    }
}
?>
