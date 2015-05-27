<h2>Arhivirani zahtevi</h2>
   <!-- <table class='etfTable'> -->
        <table class="table">
		
        <th>Proizvod</th>
        <th>Datum</th>
        <th>Kolicina</th>
        <th>Status</th>
        <th></th>
        <th></th>
        
      <?php foreach ($zahtevi as $zahtev){ ?>
        <tr>
            
            <td><?php echo $proizvodi[$zahtev->idProizvod]->naziv; ?></td>
            <td><?php echo $zahtev->datum; ?></td>
            <td><?php echo $zahtev->kolicina; ?></td>
            <td><?php echo $zahtev->status; ?></td>
            
            <td>
                <?php echo form_open('admin/showZahtev/'.$zahtev->idZahtev); ?>       
                        <p>
                            <input type ="submit" value="Edit" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>
            </td>
            
            <td>
                <?php echo form_open('admin/deleteZahtev/'.$zahtev->idZahtev); ?>       
                        <p>
                            <input type ="submit" value="Delete" class="btn btn-danger"/>
                        </p>
        
                <?php echo form_close(); ?>
            </td>
            
            
        </tr>
      <?php } ?>
    </table>
<br/>

                <?php echo form_open('admin/newZahtev/'); ?>       
                        <p>
                            <input type ="submit" value="Nov Zahtev" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>
