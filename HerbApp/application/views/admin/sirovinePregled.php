    <table>
        <th>Naziv</th>
        <th>Serijski broj</th>
        <th>Vreme pristizanja(u danima)</th>
        <th>Ukupno u magacinu</th>
        <th>Slobodno u magacinu</th>
        <th>Jedinica</th>
        <th>Edit</th>
        <th>Delete</th>
        
      <?php foreach ($sirovine as $sirovina){ ?>
        <tr>
            
            <td><?php echo $sirovina->naziv; ?></td>
            <td><?php echo $sirovina->serBr; ?></td>
            <td><?php echo $sirovina->vremePristiz; ?></td>
            <td><?php echo $sirovina->magacinUk; ?></td>
            <td><?php echo ($sirovina->magacinUk - $sirovina->magacinRez); ?></td>
            <td><?php echo $sirovina->jedinica; ?></td>
            
            <?php echo form_open('admin/showSirovina/'.$sirovina->idSirovine); ?>
            <td><input type="submit" value="Edit"/></td>
            <?php echo form_close(); ?>
            
            <?php echo form_open('admin/deleteSirovina/'.$sirovina->idSirovine); ?>
            <td><input type="submit" value="Delete"/></td>
            <?php echo form_close(); ?>
            
        </tr>
      <?php } ?>

    </table>

            <br/> <br/>
            <?php echo form_open('admin/newSirovina/'); ?>
            <td><input type="submit" value="New"/></td>
            <?php echo form_close(); ?>
