<?php 
//TODO: Zavisno od odabrane opcije(Pending, Approved, Archived) se prikazuju razliciti zahtevi
?>
<h2>Zahtevi</h2>
    <table class="table">
        <th>Sirovina</th>
        <th>Kolicina</th>
        <th>Serijski broj</th>
        <th>Aktuelno jos(dana)</th>
        <th>Potvrdi</th>
        <th>Odbaci</th>
        
      <?php foreach ($zahtevi as $zahtev){ ?>
        <tr>
            
            <td><?php echo $sirovine[$zahtev->idZahtevSirov]->naziv; ?></td>
            <td><?php echo ($zahtev->kolicina - $zahtev->rezervisano); ?></td>
            <td><?php echo $sirovine[$zahtev->idZahtevSirov]->serBr; ?></td>
            
            <td><?php
            //TODO: Racunati i vreme potrebno za pristizanje sirovine
            $dateComplete = strtotime($zahtev->datumComplete);
            $now = time();
            $datediff = $dateComplete - $now;
             echo floor($datediff/(60*60*24));
            ?></td>

            
            <?php echo form_open('Nabavka/potvrdiZahtev/'.$zahtev->idZahtevProiz.'/'.$zahtev->idZahtevSirov); ?>
            <td><input type="submit" value="Potvrdi" class="btn btn-success"/></td>
            <?php echo form_close(); ?>
            
            <?php echo form_open('Nabavka/odbijZahtev/'.$zahtev->idZahtevProiz.'/'.$zahtev->idZahtevSirov); ?>
            <td><input type="submit" value="Odbaci" class="btn btn-danger"/></td>
            <?php echo form_close(); ?>
            
        </tr>
      <?php } ?>
    </table>    

