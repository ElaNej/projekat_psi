<?php

class Proizvodnja extends CI_Controller{
 
    public function listaProizvoda(){
         $proizvodi = $this->proizvodModel->getAll();
         $data['proizvodi'] = $proizvodi;
         $this->template->load('proizvodnjaTemplate', 'proizvodnja/proizvodiPregled', $data);
    }
    
    public function napraviProizvod($id){

        $proizvod = $this->proizvodModel->getById($id);
        $data['proizvod'] =  $proizvod;
        if($proizvod != null){
        $this->template->load('proizvodnjaTemplate', 'proizvodnja/napravi', $data);
        }
        else
            $this->listaProizvoda();
    }
    
    //Ova f-ja rezervise sirovine ili za sve proizvode, ili samo za one koje moze
    public function rezervisiSirovine($idProizvod){
        //$this->zahtevSirovinaModel->create($id, $row->idSirovina, date('Y/m/d'), date('Y/m/d'), $kolicina, 'complete');
        $proizvodSadrzi = $this->proizvodModel->getProizvodSadrzi($idProizvod);
        $num = $this->input->post('kolicina');
        
        $time = strtotime($this->input->post('datum'));
        $datum = date('Y/m/d', $time);
        /*
         * Statusi za zahtev za PROIZVOD su
         * 1.Reserved - sve potrebne sirovine su rezervisane, korisnik treba da potvrdi da je zahtev ispunjen
         * 2.Pending - ceka se da se rezervisu sve potrebne sirovine.
         * 3.Complete - KorisnikProizvodnja je potvrdio da je zahtev ispunjen(sve sirovine su rezervisane)
         * 4.Incomplete - KorisnikProizvodnja je otkazao zahtev, nabavka je odbila zahtev ili nije na vreme odgovorila na zahteve
         */
        $zahtevProizvodId = $this->zahtevProizvodnjaModel->create($idProizvod, $datum, $num, 'reserved');
        
        $isReserved = true;
        foreach($proizvodSadrzi as $row){
            
            $kolicina = $row->kolicina;
            $ukKolicina = $kolicina * $num; 
            $sirovina = $this->sirovinaModel->getById($row->idSirovina);
            $slobodno = $sirovina->magacinUk - $sirovina->magacinRez;
            
            /*Statusi za zahtev za SIROVINU su :
             * 1.Complete - sirovine su rezervisane
             * 2.Pending - ceka se da nabavka odobri zahtev za sirovinama
             * 3.Approved - nabavka je odobrila zahtev, ali se ceka da sirovine pristignu(kada pristignu zahtev postaje complete)
             */
            if($ukKolicina <= $slobodno){
               $this->zahtevSirovinaModel->create($zahtevProizvodId, $row->idSirovina, date('Y/m/d'), date('Y/m/d'), $ukKolicina, $ukKolicina, 'reserved');
               $this->sirovinaModel->addToRezervisano($sirovina->idSirovine, $ukKolicina);
            }
            else{
               $isReserved = false;
               $this->zahtevSirovinaModel->create($zahtevProizvodId, $row->idSirovina, date('Y/m/d'), date('Y/m/d'), $ukKolicina, $slobodno, 'pending');
               $this->sirovinaModel->addToRezervisano($sirovina->idSirovine, $slobodno);
            }
        }
                
        if(!$isReserved) $this->zahtevProizvodnjaModel->update($zahtevProizvodId, $idProizvod, $datum, $num, 'pending');
        
        $this->listaProizvoda();
    }
}
?>
