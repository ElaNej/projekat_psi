<?php

class Proizvodnja extends CI_Controller {

    public function listaProizvoda() {
        $this->load->library('session');
        if (!($this->session->userdata('kategorija') === 'zapProizvodnja')) {
            echo "Nemate pravo pristupa";
            return;
        }

        $proizvodi = $this->proizvodModel->getAll();
        $data['proizvodi'] = $proizvodi;
        $this->template->load('proizvodnjaTemplate', 'proizvodnja/proizvodiPregled', $data);
    }

    public function napraviProizvod($id) {
        $this->load->library('session');
        if (!($this->session->userdata('kategorija') === 'zapProizvodnja')) {
            echo "Nemate pravo pristupa";
            return;
        }
        $proizvod = $this->proizvodModel->getById($id);
        $data['proizvod'] = $proizvod;
        if ($proizvod != null) {
            $this->template->load('proizvodnjaTemplate', 'proizvodnja/napravi', $data);
        } else
            $this->listaProizvoda();
    }

    //Ova f-ja rezervise sirovine ili za sve proizvode, ili samo za one koje moze
    public function rezervisiSirovine($idProizvod) {
        $this->load->library('session');
        if (!($this->session->userdata('kategorija') === 'zapProizvodnja')) {
            echo "Nemate pravo pristupa";
            return;
        }
        //$this->zahtevSirovinaModel->create($id, $row->idSirovina, date('Y/m/d'), date('Y/m/d'), $kolicina, 'complete');
        $proizvodSadrzi = $this->proizvodModel->getProizvodSadrzi($idProizvod);
        $proizvod = $this->proizvodModel->getById($idProizvod);
        $num = $this->input->post('kolicina');

        if ($num < 0 || !(is_numeric($num))) {

            $error = 'Uneta nedozvoljena vrednost za kolicinu';
            $data['error'] = $error;
            $data['proizvod'] = $proizvod;
            $this->template->load('proizvodnjaTemplate', 'proizvodnja/napravi', $data);
            return;
        }

        $time = strtotime($this->input->post('datum'));
        $datum = date('Y/m/d', $time);

        if (strtotime($datum) < strtotime(date('Y/m/d'))) {
            $error = 'Ne moze se uneti datum iz proslosti';
            $data['error'] = $error;
            $data['proizvod'] = $proizvod;
            $this->template->load('proizvodnjaTemplate', 'proizvodnja/napravi', $data);
            return;
        }
        /*
         * Statusi za zahtev za PROIZVOD su
         * 1.Reserved - sve potrebne sirovine su rezervisane, korisnik treba da potvrdi da je zahtev ispunjen
         * 2.Pending - ceka se da se rezervisu sve potrebne sirovine.
         * 3.Complete - KorisnikProizvodnja je potvrdio da je zahtev ispunjen(sve sirovine su rezervisane)
         * 4.Rejected - KorisnikProizvodnja je otkazao zahtev Nabavka je odbila zahtev ili nije na vreme odgovorila na zahteve
         * 5. Incomplete - KorisnikProizvodnja je otkazao zahtev, ili video da je nabavka nije odgovorila na vreme/odbila zahtev.
         */
        $zahtevProizvodId = $this->zahtevProizvodnjaModel->create($idProizvod, $datum, $num, 'reserved');

        $isReserved = true;
        foreach ($proizvodSadrzi as $row) {

            $kolicina = $row->kolicina;
            $ukKolicina = $kolicina * $num;
            $sirovina = $this->sirovinaModel->getById($row->idSirovina);
            $slobodno = $sirovina->magacinUk - $sirovina->magacinRez;

            /* Statusi za zahtev za SIROVINU su :
             * 1.Complete - sirovine su rezervisane
             * 2.Pending - ceka se da nabavka odobri zahtev za sirovinama
             * 3.Approved - nabavka je odobrila zahtev, ali se ceka da sirovine pristignu(kada pristignu zahtev postaje complete)
             */
            if ($ukKolicina <= $slobodno) {
                $this->zahtevSirovinaModel->create($zahtevProizvodId, $row->idSirovina, date('Y/m/d'), date('Y/m/d'), $ukKolicina, $ukKolicina, 'reserved');
                $this->sirovinaModel->addToRezervisano($sirovina->idSirovine, $ukKolicina);
            } else {
                $isReserved = false;
                $this->zahtevSirovinaModel->create($zahtevProizvodId, $row->idSirovina, date('Y/m/d'), $datum, $ukKolicina, $slobodno, 'pending');
                $this->sirovinaModel->addToRezervisano($sirovina->idSirovine, $slobodno);
            }
        }

        if (!$isReserved)
            $this->zahtevProizvodnjaModel->update($zahtevProizvodId, $idProizvod, $datum, $num, 'pending');

        $this->listaProizvoda();
    }

    public function redZaProizvodnju() {
        $this->load->library('session');
        if (!($this->session->userdata('kategorija') === 'zapProizvodnja')) {
            echo "Nemate pravo pristupa";
            return;
        }

        $zahtevi = $this->zahtevProizvodnjaModel->getActiveRequests();
        $data['zahtevi'] = $zahtevi;

        $proizvodi = array();
        foreach ($zahtevi as $zahtev) {
            $proizvod = $this->proizvodModel->getById($zahtev->idProizvod);
            $proizvodi[$zahtev->idProizvod] = $proizvod;
        }
        $data['proizvodi'] = $proizvodi;

        $this->template->load('proizvodnjaTemplate', 'proizvodnja/redProizvodnja', $data);
    }

    //Evidencija da je proizvodnja videla zahteve koji su potvrdjeni/odbijeni u potpunosti
    public function confirmActiveRequest($idZahtev) {
        $this->load->library('session');
        if (!($this->session->userdata('kategorija') === 'zapProizvodnja')) {
            echo "Nemate pravo pristupa";
            return;
        }

        $zahtev = $this->zahtevProizvodnjaModel->getbyId($idZahtev);
        if (strcmp($zahtev->status, 'reserved') == 0) {

            $this->zahtevProizvodnjaModel->confirmReservedProizvod($idZahtev);
            $this->zahtevProizvodnjaModel->updateStatus($idZahtev, 'complete');
        } else if (strcmp($zahtev->status, 'rejected') == 0) {

            $this->zahtevProizvodnjaModel->releaseReservedSirovine($idZahtev);
            $this->zahtevProizvodnjaModel->updateStatus($idZahtev, 'incomplete');
        }

        $this->redZaProizvodnju();
    }

    //Proizvodnja moze da odbije potvrdjene zahteve ili zahteve na cekanju
    public function rejectActiveRequest($idZahtev) {
        $this->load->library('session');
        if (!($this->session->userdata('kategorija') === 'zapProizvodnja')) {
            echo "Nemate pravo pristupa";
            return;
        }


        $this->zahtevProizvodnjaModel->releaseReservedSirovine($idZahtev);
        $this->zahtevProizvodnjaModel->updateStatus($idZahtev, 'incomplete');

        $this->redZaProizvodnju();
    }

    public function showArhiva() {
        $this->load->library('session');
        if (!($this->session->userdata('kategorija') === 'zapProizvodnja')) {
            echo "Nemate pravo pristupa";
            return;
        }

        $zahtevi = $this->zahtevProizvodnjaModel->getArchivedRequests();
        $data = array();
        $data['zahtevi'] = $zahtevi;

        $proizvodi = array();
        foreach ($zahtevi as $zahtev) {
            $proizvod = $this->proizvodModel->getById($zahtev->idProizvod);
            $proizvodi[$zahtev->idProizvod] = $proizvod;
        }
        $data['proizvodi'] = $proizvodi;

        $this->template->load('proizvodnjaTemplate', 'proizvodnja/arhivaProizvoda', $data);
    }

}

?>
