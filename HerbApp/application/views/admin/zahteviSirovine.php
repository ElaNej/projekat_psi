
<h2>Zahtevi nabavka</h2>
    <table class="table">
        <th>Sirovina</th>
        <th>Serijski broj</th>
        <th>Kolicina</th>
        <th>Datum</th>
        <th>Status</th>
        <th></th>
        <th></th>
        
      <?php foreach ($zahtevi as $zahtev){ ?>
            <tr>
            <td><?php echo $sirovine[$zahtev->idZahtevSirov]->naziv; ?></td>
            <td><?php echo $sirovine[$zahtev->idZahtevSirov]->serBr; ?></td>
            <td><?php echo $zahtev->kolicina ?></td>
            <td><?php echo $zahtev->datumComplete ?></td>
            <td><?php echo $zahtev->status ?></td>
            
            <td>
                <?php echo form_open('admin/showZahtevNabavka/'.$zahtev->idZahtevProiz.'/'.$zahtev->idZahtevSirov); ?>       
                        <p>
                            <input type ="submit" value="Edit" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>
            </td>
            
            <td>
                <?php echo form_open('admin/deleteZahtevNabavka/'.$zahtev->idZahtevProiz.'/'.$zahtev->idZahtevSirov); ?>       
                        <p>
                            <input type ="submit" value="Delete" class="btn btn-danger"/>
                        </p>
        
                <?php echo form_close(); ?>
            </td>
            </tr>
      <?php } ?>
    </table>
                <br/><br/>

                <?php
                      echo form_open('admin/newZahtevNabavka/'.$zahtev->idZahtevProiz); ?>       
                         <p>
                            <input type ="submit" value="Nov Zahtev Nabavka" class="btn btn-success"/>
                        </p>
        
                <?php echo form_close(); ?>




