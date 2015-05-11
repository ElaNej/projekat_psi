<?php

//Sva komunikacija sa bazom podataka se nalazi u Modelima
//Kada god se napravi nov model dodati ga u application/confin/autoload.php u autoload model array(poslednja linija autoload.php) 
class KorisnikModel extends CI_Model{
    
    //Proverava da li je korisnik sa zadatim korisnickim imenom i lozinkom u bazi i vraca kategoriju korisnika
    
    public function getLoginKategorija($korIme, $lozinka){
        
        $this->db->select();
        $this->db->from('korisnik');
        $this->db->where('korisnickoIme', $korIme);
        $this->db->where('lozinka', $lozinka);
        $upit = $this->db->get();
        
        //Legitimne kategorije korisnika su : admin, zapProizvodnja, zapNabavka i zapMagacin
        //Ukoliko korisnik ne pripada nekoj od ovih kategorija, znaci da ga admin jos uvek nije odobrio
        //Prilikom registracije kategorija se pamti bez zap prefiksa, koji se dodaje kada admin odobri korisnika
        if($upit->num_rows() > 0){
            $result = $upit->result();
            $korisnik = $result[0];
            if((strcmp($korisnik->kategorija, 'zapProizvodnja') == 0)
                    || (strcmp($korisnik->kategorija, 'zapNabavka') == 0)
                            || (strcmp($korisnik->kategorija, 'zapMagacin') == 0)
                    || (strcmp($korisnik->kategorija, 'admin') == 0))
                    
                return $korisnik;
        }
        return null;
    }
}
?>
