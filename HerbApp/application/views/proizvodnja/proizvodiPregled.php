
<h2>Proizvodi</h2>
    <table class='etfTable'>
        <th>Naziv</th>
        <th>Neto kolicina</th>
        <th>Serijski broj</th>
        <th>Kolicina u magacinu</th>
        <th></th>
        
      <?php foreach ($proizvodi as $proizvod){ ?>
        <tr>
            
            <td><?php echo $proizvod->naziv; ?></td>
            <td><?php echo $proizvod->neto; ?></td>
            <td><?php echo $proizvod->serBr; ?></td>
            <td><?php echo $proizvod->kolicinaMagacin; ?></td>
            
            <?php echo form_open('Proizvodnja/napraviProizvod/'.$proizvod->idProizvoda); ?>
            <td><input type="submit" value="Napravi" class='etfDugme'/></td>
            <?php echo form_close(); ?>
            
        </tr>
      <?php } ?>
    </table>    
