<h2>Arhivirani zahtevi</h2>
   <!-- <table class='etfTable'> -->
        <table class="table">
		
        <th>Proizvod</th>
        <th>Datum</th>
        <th>Kolicina</th>
        <th>Status</th>
        <th></th>
        <th></th>
        <th></th>
        
      <?php foreach ($zahtevi as $zahtev){ ?>
        <tr>
            
            <td><?php echo $proizvodi[$zahtev->idProizvod]->naziv; ?></td>
            <td><?php echo $zahtev->datum; ?></td>
            <td><?php echo $zahtev->kolicina; ?></td>
            <td><?php echo $zahtev->status; ?></td>
            
            <td>
                <?php echo form_open('admin/showZahtevProizvodnja/'.$zahtev->idZahtev); ?>       
                        <p>
                            <input type ="submit" value="Edit" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>
            </td>
            
            <td>
                <?php echo form_open('admin/deleteZahtevProizvodnja/'.$zahtev->idZahtev); ?>       
                        <p>
                            <input type ="submit" value="Delete" class="btn btn-danger"/>
                        </p>
        
                <?php echo form_close(); ?>
            </td>
            
             <td>
                <?php echo form_open('admin/showZahteviSirovine/'.$zahtev->idZahtev); ?>       
                        <p>
                            <input type ="submit" value="Zahtevi sirovine" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>
            </td>
            
            
        </tr>
      <?php } ?>
    </table>
                <br/><br/>

                <?php echo form_open('admin/newZahtevProizvodnja/'); ?>       
                        <p>
                            <input type ="submit" value="Nov Zahtev Proizvodnja" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>
                <br/><br/>
                
                <?php
                $idProizv = -1;
                echo form_open('admin/newZahtevNabavka/'.$idProizv); ?>       
                        <p>
                            <input type ="submit" value="Nov Zahtev Nabavka" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>