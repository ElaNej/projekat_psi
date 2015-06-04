 
    <table class='table'>
        <th>Naziv</th><th></th>
        <th>Serijski broj</th>
        <th>Vreme pristizanja<br/>   (u danima)</th>
        <th>Ukupno <br/>u magacinu</th>
        <th>Slobodno<br/> u magacinu</th>
        <th>Jedinica</th>
        <th></th>
        <th></th><th></th><th></th><th></th><th></th><th></th>
		</table>
        <div class="container" style=" overflow-y: scroll; height:60%">
		<table class="table">
      <?php foreach ($sirovine as $sirovina){ ?>
        <tr>
            
            <td><?php echo $sirovina->naziv; ?></td>
            <td><?php echo $sirovina->serBr; ?></td><th></th><th></th>
            <td><?php echo $sirovina->vremePristiz; ?></td><th></th><th></th><th></th><th></th><th></th>
            <td><?php echo $sirovina->magacinUk; ?></td><th></th><th></th><th></th><th></th>
            <td><?php echo ($sirovina->magacinUk - $sirovina->magacinRez); ?></td><th></th><th></th>
            <td><?php echo $sirovina->jedinica; ?></td><th></th><th></th>
            
            <?php echo form_open('admin/showSirovina/'.$sirovina->idSirovine); ?>
            <td><input type="submit" value="Izmeni" class="btn btn-default"/></td>
            <?php echo form_close(); ?>
            
            <?php echo form_open('admin/deleteSirovina/'.$sirovina->idSirovine); ?>
            <td><input type="submit" value="Obrisi" class="btn btn-danger"/></td>
            <?php echo form_close(); ?>
            
        </tr>
      <?php } ?>

    </table>
</div>
            <br/> <br/>
            <?php echo form_open('admin/newSirovina/'); ?>
            <td><input type="submit" value="Nova sirovina" class="btn btn-success"/></td>
            <?php echo form_close(); ?>
