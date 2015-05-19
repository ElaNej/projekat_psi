<?php

class Admin extends CI_Controller{

    //pocenti prozor nakon logovanja
    //prikazuje sve delove sistema (korisnici, nabavke, prozivdnja, narudzbine)
    public function home(){

        $this->load->library('session');

        $this->template->load('adminTemplate', 'admin/pocetna');



    }


    public function neodobreniKorisnici(){
        $korisnici = $this->korisnikModel->getAll();
        $data['korisnici'] = $korisnici;
        $this->load->view('admin/neodobreniKorisniciPregled', $data);
    }


    //dodavanje, azuriranje korisnicka
    public function korisnici(){

        $this->korisniciPregled();
        $this->neodobreniKorisnici();

    }


    //prikaz svih korisnika
    public function korisniciPregled(){

        $korisnici = $this->korisnikModel->getAll();

        $data['korisnici'] = $korisnici;

        $this->template->load('adminTemplate', 'admin/korisniciPregled', $data);

    }


	public function kreirajKorisnika(){

        $korisnickoIme = $_POST['korisnickoIme'];
        $lozinka = $_POST['lozinka'];
        $kategorija = $_POST['kategorija'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $zvanje = $_POST['zvanje'];
        $brTel = $_POST['brTel'];
        $status = $_POST['status'];

        $this->korisnikModel->create($korisnickoIme, $ime, $prezime, $lozinka, $email, $kategorija, $zvanje, $brTel, $status);


        if($status == 1) echo 'Korisnik je uspenso kreiran';
        else echo 'Registracija je uspesna. Administrator mora da odobri vasu registraciju';




	}
	
	public function obrisiKorisnika($id){

	    $this->korisnikModel->delete($id);

        echo 'Korisnik id '.$id.' je uspesno obrisan';
	}

	public function azurirajKorisnika(){
	    $id = $_POST['idKor'];
        $korisnickoIme = $_POST['korisnickoIme'];
        $lozinka = $_POST['lozinka'];
        $kategorija = $_POST['kategorija'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $zvanje = $_POST['zvanje'];
        $brTel = $_POST['brTel'];
        $status = $_POST['status'];


        $this->korisnikModel->update($id, $korisnickoIme, $ime, $prezime, $lozinka, $email, $kategorija, $zvanje, $brTel, $status);


        echo $korisnickoIme.' je uspesno azuriran';


	}

    public function azurirajKorisnikaPrikaz($id){

        $korisnik = $this->korisnikModel->getById($id);
        $data['korisnik'] = $korisnik;
        $this->template->load('adminTemplate', 'admin/azurirajKorisnikaPrikaz', $data);

    }

    public function kreirajKorisnikaPrikaz(){

        $data['registracija'] = 0;
        $this->template->load('adminTemplate', 'admin/kreirajKorisnikaPrikaz', $data);

    }
	
	public function prihvatiKorisnika($id){
        $korisnik = $this->korisnikModel->getById($id);

        $this->korisnikModel->update($korisnik->idKor, $korisnik->korisnickoIme, $korisnik->ime, $korisnik->prezime, $korisnik->lozinka, $korisnik->email, $korisnik->kategorija, $korisnik->zvanje, $korisnik->brTel, 1);
	}
        
        public function sirovinePregled(){
            
            $sirovine = $this->sirovinaModel->getAll();
            $data['sirovine'] = $sirovine;
            
            $this->template->load('adminTemplate', 'admin/sirovinePregled', $data);
        }
        
        public function showSirovina($id){
            
            $sirovina = $this->sirovinaModel->getById($id);
            $data['sirovina'] = $sirovina;
            
            $this->template->load('adminTemplate', 'admin/sirovinaIzmena', $data);
        }
        
        public function updateSirovina($id, $magacinRez){
            
            $naziv = $this->input->post('naziv');
            $serBr = $this->input->post('serBr');
            $vremePristiz = $this->input->post('vremePristiz');
            $magacinUk = $this->input->post('magacinUk');
            $jedinica = $this->input->post('jedinica');
            
            $this->sirovinaModel->update($id, $naziv, $serBr, $vremePristiz, $jedinica, $magacinUk, $magacinRez);
            
            $this->sirovinePregled();
        }
        
        public function deleteSirovina($id){
            
            $this->sirovinaModel->delete($id);
            
            $this->sirovinePregled();
        }
        
        public function newSirovina(){
            
            $this->template->load('adminTemplate', 'admin/novaSirovina');
        }
        
        public function createSirovina(){
            
            $naziv = $this->input->post('naziv');
            $serBr = $this->input->post('serBr');
            $vremePristiz = $this->input->post('vremePristiz');
            $magacinUk = $this->input->post('magacinUk');
            $jedinica = $this->input->post('jedinica');
            
            $this->sirovinaModel->create($naziv, $serBr, $vremePristiz, $jedinica, $magacinUk, 0);
            
            $this->sirovinePregled();
        }
	
}
?>
