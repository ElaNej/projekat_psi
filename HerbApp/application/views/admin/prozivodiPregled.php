   <table class='table'>    <!--etfTable staro-->
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
            
            <?php echo form_open('admin/showProizvod/'.$proizvod->idProizvoda); ?>
            <td><input type="submit" value="Azuriraj" class="btn btn-default"/></td>
            <?php echo form_close(); ?>
            
        </tr>
      <?php } ?>
    </table>

            <br/> <br/>
            <?php echo form_open('admin/newProizvod/'); ?>
            <td><input type="submit" value="New" class="btn btn-success "/></td>
            <?php echo form_close(); ?>