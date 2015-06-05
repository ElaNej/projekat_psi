
<h2>Proizvodi</h2>
 <div class="container" style=" overflow-y: scroll; height:60%">

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
            
            <?php echo form_open('Proizvodnja/napraviProizvod/'.$proizvod->idProizvoda); ?>
            <td><input type="submit" value="Napravi" class="btn btn-default"/></td>
            <?php echo form_close(); ?>
            
        </tr>
      <?php } ?>
    </table>    
</div>