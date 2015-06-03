<?php

class TestController extends CI_Controller{
    
    public function testKorisnikCreate(){
        //create($korisnickoIme, $ime, $prezime, $lozinka, $email, $kategorija, $zvanje, $brTel, $status)
        $korisnik = $this->korisnikModel->getByUsername('testUser');
        if($korisnik != null){
            echo $this->unit->run(1, 0, 'Korisnik vec postoji u bazi');
            exit;
        }
        else{
            $this->korisnikModel->create('testUser','','','test123','','zapProizvodnja','','','');
        }
        $korisnik = $this->korisnikModel->getByUsername('testUser');
        echo $this->unit->run($korisnik->lozinka, 'test123', 'Model ne vraca korisnika');
        
    }
    
}
?>
