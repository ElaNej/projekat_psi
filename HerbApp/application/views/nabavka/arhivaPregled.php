<?php 
//TODO: Zavisno od odabrane opcije(Pending, Approved, Archived) se prikazuju razliciti zahtevi
?>
<h2>Arhivirani zahtevi</h2>
 <div class="container" style=" overflow-y: scroll; height:70%">
 <table class="table">
        <th>Sirovina</th>
        <th>Serijski broj</th>
        <th>Kolicina</th>
        <th>Datum</th>
        <th>Status</th>
        
      <?php foreach ($zahtevi as $zahtev){ ?>
        <tr>
            
            <td><?php echo $sirovine[$zahtev->idZahtevSirov]->naziv; ?></td>
            <td><?php echo $sirovine[$zahtev->idZahtevSirov]->serBr; ?></td>
            <td><?php echo $zahtev->kolicina ?></td>
            <td><?php echo $zahtev->datumComplete ?></td>
            <td><?php echo $zahtev->status ?></td>
            

            
        </tr>
      <?php } ?>
    </table>    
</div>
