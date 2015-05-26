<div class="row">
<div class="col-lg-4"></div>
 <div class="col-lg-3">

<div class="form-group" align=center>
    
    <p>
        <?php
        if(isset($error)) echo $error;
        ?>
    </p>

<p>
     Naziv proizvoda: <?php echo $proizvod->naziv ?>
</p>   
     <?php echo form_open('Proizvodnja/rezervisiSirovine/'.$proizvod->idProizvoda); ?>
        <p >
            <label for="kolicina">Kolicina:</label>
            <input type="text" name ="kolicina" id="kolicina" placeholder="Unesite kolicinu" class="form-control">
        </p>
        
        <p>
			<label for="datepicker">Datum:</label>
            <input type="text" name ="datum" id="datepicker" placeholder="unesite datum" class="form-control">
        </p>
        
        <p>
            <input type ="submit" value="Rezervisi sirovine" class="btn btn-success"/>
        </p>
    <?php echo form_close(); ?>
   
</div>

</div>
<div class="col-lg-4"></div>
</div>