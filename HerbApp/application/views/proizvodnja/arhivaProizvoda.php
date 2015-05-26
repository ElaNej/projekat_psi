<h2>Arhivirani zahtevi</h2>
   <!-- <table class='etfTable'> -->
        <table class="table">
		
        <th>Proizvod</th>
        <th>Datum</th>
        <th>Kolicina</th>
        <th>Status</th>
        
      <?php foreach ($zahtevi as $zahtev){ ?>
        <tr>
            
            <td><?php echo $proizvodi[$zahtev->idProizvod]->naziv; ?></td>
            <td><?php echo $zahtev->datum; ?></td>
            <td><?php echo $zahtev->kolicina; ?></td>
            <td><?php echo $zahtev->status; ?></td>     
            
            
        </tr>
      <?php } ?>
    </table>
