<h2>Aktivni zahtevi</h2>
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
            
            <?php echo form_open('Proizvodnja/confirmActiveRequest/'.$zahtev->idZahtev); ?>
            <td><input type="submit" value="Potvrdi" class="btn btn-success" /></td>				<!-- stari css: .etfDugme -->
            <?php echo form_close(); ?>
            
            <td>
            <?php if(strcmp($zahtev->status, 'rejected') != 0){
                
                echo form_open('Proizvodnja/rejectActiveRequest/'.$zahtev->idZahtev);
                $attributes = array(
                  'class' => "btn btn-danger",    //isto promenjeno ime dugmeta
                    'value' => 'Ponisti'
                );
                echo form_submit($attributes);
                echo form_close();
            }
                ?>
            </td>
            
        </tr>
      <?php } ?>
    </table>
