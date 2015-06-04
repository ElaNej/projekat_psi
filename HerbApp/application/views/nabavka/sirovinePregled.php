 <div class="container" style=" overflow-y: scroll; height:70%">
 <table class='table'>
        <th>Naziv</th>
        <th>Serijski broj</th>
        <th>Vreme pristizanja(u danima)</th>
        <th>Ukupno u magacinu</th>
        <th>Slobodno u magacinu</th>
        <th>Jedinica</th>
        <th></th>
        <th></th>
        
      <?php foreach ($sirovine as $sirovina){ ?>
        <tr>
            
            <td><?php echo $sirovina->naziv; ?></td>
            <td><?php echo $sirovina->serBr; ?></td>
            <td><?php echo $sirovina->vremePristiz; ?></td>
            <td><?php echo $sirovina->magacinUk; ?></td>
            <td><?php echo ($sirovina->magacinUk - $sirovina->magacinRez); ?></td>
            <td><?php echo $sirovina->jedinica; ?></td>
            
            <?php echo form_open('nabavka/showNewZahtev/'.$sirovina->idSirovine); ?>
            <td><input type="submit" value="Nov Zahtev" class="btn btn-default"/></td>
            <?php echo form_close(); ?>
            
            
        </tr>
      <?php } ?>

    </table>
</div>
