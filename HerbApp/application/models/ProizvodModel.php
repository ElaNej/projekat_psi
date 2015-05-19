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
    
    public function getAll(){
        $svi = $this->db->get('proizvod');
        return $svi->result();
    }
    
    public function getById($id){
        
        $this->db->select();
        $this->db->from('proizvod');
        $this->db->where('idProizvoda', $id);
        $upit = $this->db->get();
        
        $res = $upit->result();
        if($upit->num_rows() > 0)
        return $res[0];
        else
            return null;
    }
    
    public function getProizvodSadrzi($id){
        $this->db->select();
        $this->db->from('proizvodsadrzi');
        $this->db->where('idProizvod', $id);
        $upit = $this->db->get();
        return $upit->result();
    }
    
}
?>
