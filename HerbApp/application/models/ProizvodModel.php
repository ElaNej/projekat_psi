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
		$this->db->where('idProizvod', $id);
		$this->db->delete('proizvodsadrzi');
		
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
    
    public function getByNaziv($naziv){
        
        $this->db->select();
        $this->db->from('proizvod');
        $this->db->where('naziv', $naziv);
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
	
	
	public function getByName($name){
		
		$svi = $this->db->get('proizvod');
        
        $proizvodi = $svi->result();
         foreach($proizvodi as $proizvod){
            if (($proizvod->naziv)===$name) {
               return $proizvod;
            }
        }
        }    
	
	
	
	public function newProizvodSadrzi($idPr,$idSir,$kol) {
		$proizvodsad = array(
            'idProizvod' => $idPr,
            'idSirovina' => $idSir,
            'kolicina' => $kol,
            );
		$this->db->insert('proizvodsadrzi',$proizvodsad);
	
	}
	
	public function updateproizvodsadrzi($id) {
		
		$this->db->where('idProizvod', $id);
		$this->db->delete('proizvodsadrzi');
		
		
	}
	
	
    
}
?>
