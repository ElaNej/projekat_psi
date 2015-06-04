  <table class='table'>    <!--etfTable staro-->
        <th>Naziv</th>        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 

        <th>Neto kolicina</th>
        <th>Serijski broj</th>
        <th>Kolicina u magacinu</th>
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 
        <th></th> 

        </table>
		 <div class="container" style=" overflow-y: scroll; height:60%">
<table class="table">
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
</div>
            <br/> <br/>
            <?php echo form_open('admin/newProizvod/'); ?>
            <td><input type="submit" value="Novi proizvod" class="btn btn-success "/></td>
            <?php echo form_close(); ?>
			
			