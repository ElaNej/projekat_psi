<?php

class SirovinaModel extends CI_Model{
    
    //Funkcija za kreiranje sirovine
    public function create($naziv, $serBr, $vremePristiz, $jedinica, $magacinUk, $magacinRez){
        
        $sirovina = array(
            'naziv' => $naziv,
            'serBr' => $serBr,
            'vremePristiz' => $vremePristiz,
            'jedinica' => $jedinica,
            'magacinUk' => $magacinUk,
            'magacinRez' => $magacinRez,
            );
        
        $this->db->insert('sirovina',$sirovina);
    }
    
    //Ukoliko odredjeno polje ne treba da se update-uje proslediti vrednost starog podatka, nikako null!
    //Id odredjuje koja sirovina se update-uje.
    public function update($id, $naziv, $serBr, $vremePristiz, $jedinica, $magacinUk, $magacinRez){
        
        $sirovina = array(
            'naziv' => $naziv,
            'serBr' => $serBr,
            'vremePristiz' => $vremePristiz,
            'jedinica' => $jedinica,
            'magacinUk' => $magacinUk,
            'magacinRez' => $magacinRez,
            );
        
        $this->db->where('idSirovine',$id);
        $this->db->update('sirovina',$sirovina);
    }
    
    //Brisanje sirovine
    public function delete($id){
        $this->db->where('idSirovine', $id);
        $this->db->delete('sirovina');
    }
}
?>
