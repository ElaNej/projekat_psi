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
        echo $this->unit->run($sirovina->magacinUk, $old, 'Uspesno dodavanje srovine u magacin');

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
        echo $this->unit->run($sirovina->magacinUk, $old, 'Uspesno uzimanje sirovine iz magacina');
    
    }
    
    public function testZahtevSirovina(){
        
        $this->proizvodModel->create('testProizvod',500,33,0);
        $proizvod = $this->proizvodModel->getByNaziv('testProizvod');
	echo $this->unit->run($proizvod->naziv,'testProizvod', 'Uspesno kreiran proizvod');
        
        $this->sirovinaModel->create('testSirovina', '6789', 7, 'g', 0, 0);
        $sirovina = $this->sirovinaModel->getByNaziv('testSirovina');
        echo $this->unit->run($sirovina->naziv, 'testSirovina', 'Uspesno kreirana sirovina');
        
        $this->zahtevSirovinaModel->create($proizvod->idProizvoda, $sirovina->idSirovine, '2015-08-26', '2015-08-26', 100, 100, '');
        $zahtev = $this->zahtevSirovinaModel->getById($proizvod->idProizvoda, $sirovina->idSirovine);
        echo $this->unit->run($zahtev->idZahtevProiz, $proizvod->idProizvoda, 'Uspesano kreiran zahtev za sirovinu');
     
        $this->zahtevSirovinaModel->update($proizvod->idProizvoda, $sirovina->idSirovine, '2015-08-26', '2015-08-26', 100, 100, 'completed');
	$zahtev = $this->zahtevSirovinaModel->getById($proizvod->idProizvoda, $sirovina->idSirovine);
	echo $this->unit->run($zahtev->status, 'completed', 'Uspesan update zahteva za sirovinu');
        
        
        $this->zahtevSirovinaModel->delete($proizvod->idProizvoda, $sirovina->idSirovine);
	$zahtev = $this->zahtevSirovinaModel->getById($proizvod->idProizvoda, $sirovina->idSirovine);
	echo $this->unit->run($zahtev,'is_null', 'Uspesno obrisan zahtev za sirovinu');
        
    }
    
    
    	public function testoviZahtevProizvodnja() {
		$this->load->model('proizvodmodel');

		$this->proizvodModel->create('testProizvod',500,33,0);
		$pr=$this->proizvodModel->getByNaziv('testProizvod');
		echo $this->unit->run($pr->naziv,'testProizvod', 'Uspesno kreiran proizvod');
		$this->load->model('zahtevproizvodnjamodel');

		$id=$this->zahtevProizvodnjaModel->create($pr->idProizvoda,'2015-08-26','33','');
		$zahtev=$this->zahtevProizvodnjaModel->getById($id);
		echo $this->unit->run($zahtev->idProizvod, $pr->idProizvoda, 'Uspesan zahtev za proizvod');
		$this->zahtevProizvodnjaModel->update($zahtev->idZahtev,'0','0','0','updated');
		$zahtev=$this->zahtevProizvodnjaModel->getById($id);
		echo $this->unit->run($zahtev->status,'updated', 'Uspesan update zahteva za proizvod');
		$this->zahtevProizvodnjaModel->delete($id);
		$zahtev=$this->zahtevProizvodnjaModel->getById($id);
		echo $this->unit->run($zahtev,'is_null', 'Uspesno obrisan zahtev za proizvod');
	}
        
        
	public function testoviGetZahtevSirovina(){
		$this->load->model('zahtevsirovinamodel');
		$this->zahtevsirovinamodel->create('-66',"","","","","","pending");
		$pending=$this->zahtevsirovinamodel->getAllPending();
		foreach ($pending as $p) {
			if ($p->idZahtevProiz=='-66')
				$uspesan=1;
			} 
		echo $this->unit->run($uspesan,1, 'Upesan getall pending');
		$byId=$this->zahtevsirovinamodel->getById("-66","");
		echo $this->unit->run($byId,'is_object', 'Upesan getById');
		$this->zahtevsirovinamodel->updateStatus($byId->idZahtevProiz,$byId->idZahtevSirov,'rejected');
		$byIdNew=$this->zahtevsirovinamodel->getById($byId->idZahtevProiz,$byId->idZahtevSirov);
		echo $this->unit->run($byIdNew->status,'rejected', 'Upesan statusUpdate');
		$rejected=$this->zahtevsirovinamodel->getAllarchived();
		foreach ($rejected as $r) {
			if ($r->idZahtevProiz==$byIdNew->idZahtevProiz)
				$uspesan=1;
			} 
		echo $this->unit->run($uspesan,1, 'Upesan getall archived');

	}

}
?>
