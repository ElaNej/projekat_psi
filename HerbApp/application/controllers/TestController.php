<?php

class TestController extends CI_Controller{
    
    public function testKorisnikCreate(){

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
    
    public function testKorisnikUpdate(){
        
        $korisnik = $this->korisnikModel->getByUsername('testUser');
        if($korisnik == null){
             echo $this->unit->run(1, 0, 'Korisnik ne postoji u bazi');
             exit;
        }
        $this->korisnikModel->update($korisnik->idKor, 'novoIme', $korisnik->ime, $korisnik->prezime, 
                'novo123', $korisnik->email, $korisnik->kategorija, $korisnik->zvanje, $korisnik->brTel, $korisnik->status);
        
        $korisnik = $this->korisnikModel->getByUsername('novoIme');
        echo $this->unit->run($korisnik->lozinka, 'novo123', 'Update korisnika');
        
    }
    
    public function testKorisnikDelete(){
        
        $korisnik = $this->korisnikModel->getByUsername('novoIme');
        if($korisnik == null){
            echo $this->unit->run(1, 0, 'Korisnik ne postoji u bazi');
            exit;
        }
        $id = $korisnik->idKor;
        $this->korisnikModel->delete($id);
        
        $korisnik = $this->korisnikModel->getById($id);
        echo $this->unit->run($korisnik, null, 'Uspesno brisanje');
    }
    
    public function testProizvodCreate(){
        
        $proizvod = $this->proizvodModel->getByNaziv('testProizvod');
        if($proizvod != null){
            echo $this->unit->run(1, 0, 'Proizvod vec postoji u bazi');
            exit;
        }
        $this->proizvodModel->create('testProizvod', '100 g', '1111', 1);
        
        $proizvod = $this->proizvodModel->getByNaziv('testProizvod');
        echo $this->unit->run($proizvod->serBr, '1111', 'Kreiranje proizvoda');
        
    }
    
    public function testProizvodUpdate(){
        
        $proizvod = $this->proizvodModel->getByNaziv('testProizvod');
        if($proizvod == null){
            echo $this->unit->run(1, 0, 'Proizvod ne postoji u bazi');
            exit;
        }
        
        $this->proizvodModel->update($proizvod->idProizvoda,'novProizvod', '50 g', '9999', 1);
        $proizvod = $this->proizvodModel->getByNaziv('novProizvod');
        if($proizvod == null){
            echo $this->unit->run(1, 0, 'Neuspesan update');
            exit;
        }
        
        echo $this->unit->run($proizvod->serBr, '9999', 'Update proizvoda');
    }
    
    public function testProizvodDelete(){
        
        $proizvod = $this->proizvodModel->getByNaziv('novProizvod');
        $id = $proizvod->idProizvoda;
        if($proizvod == null){
            echo $this->unit->run(1, 0, 'Ne postoji proizvod u bazi');
            exit;
        }
        
        $this->proizvodModel->delete($id);
        
        $proizvod = $this->proizvodModel->getById($id);
        echo $this->unit->run($proizvod, null, 'Brisanje proizvoda');
    }
    
    public function testSirovinaCreate(){

        $sirovina = $this->sirovinaModel->getByNaziv('testSirovina');
        if($sirovina != null){
            echo $this->unit->run(1, 0, 'Vec postoji test sirovina u bazi');
            exit;
        }
        
        $this->sirovinaModel->create('testSirovina', '111', 7, 'g', 0, 0);
        
        $sirovina = $this->sirovinaModel->getByNaziv('testSirovina');
        echo $this->unit->run($sirovina->serBr, '111', 'Create sirovine');
    }
    
    public function testSirovinaUpdate(){
        
        $sirovina = $this->sirovinaModel->getByNaziv('testSirovina');
        if($sirovina == null){
            echo $this->unit->run(1, 0, 'Ne postoji test sirovina u bazi');
            exit;
        }
        
        $this->sirovinaModel->update($sirovina->idSirovine, 'novaSirovina', '999', 7, 'g', 100, 0);
        
        $sirovina = $this->sirovinaModel->getByNaziv('novaSirovina');
        echo $this->unit->run($sirovina->serBr, '999', 'Update sirovine');
    }
    
    public function testSirovinaDelete(){
        
        $sirovina = $this->sirovinaModel->getByNaziv('novaSirovina');
        if($sirovina == null){
            echo $this->unit->run(1, 0, 'Ne postoji test sirovina u bazi');
            exit;
        }
        $id = $sirovina->idSirovine;
        
        $this->sirovinaModel->delete($id);
        $sirovina = $this->sirovinaModel->getById($id);
        echo $this->unit->run($sirovina, null, 'Delete sirovine');
    }
 
    
    
    
    public function testAddToMagacin(){
        
        $sirovina = $this->sirovinaModel->getByNaziv('nana');
        if($sirovina == null){
            echo $this->unit->run(1, 0, 'Ne postoji sirovina u magacinu');
            exit;
        }
        
        $old = $sirovina->magacinUk + 5;

        
        $this->sirovinaModel->addToMagacin($sirovina->idSirovine, 5);
        
        $sirovina = $this->sirovinaModel->getByNaziv('nana');
       
        
        echo $this->unit->run($sirovina->magacinUk, $old, 'Uspesno dodavanje pozitivne vrednosti');
    
    }
    
    
    public function testRemoveFromMagacin(){
        
        $sirovina = $this->sirovinaModel->getByNaziv('nana');
        if($sirovina == null){
            echo $this->unit->run(1, 0, 'Ne postoji sirovina u magacinu');
            exit;
        }
        
        $old = $sirovina->magacinUk - 5;

        
        $this->sirovinaModel->removeFromMagacin($sirovina->idSirovine, 5);
        
        $sirovina = $this->sirovinaModel->getByNaziv('nana');

        echo $this->unit->run($sirovina->magacinUk, $old, 'Add to magacin');
    
    }
    
    

}
?>
