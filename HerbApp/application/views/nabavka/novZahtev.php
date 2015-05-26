<div class="row">
<div class="col-lg-4"></div>
 <div class="col-lg-3">

<div class="form-group" align=center>

<p>
     Naziv sirovine: <?php echo $sirovina->naziv ?>
</p>
<p>
     Serijski broj: <?php echo $sirovina->serBr ?>
</p>
<p>
     Vreme pristizanja: <?php echo $sirovina->vremePristiz ?>
</p>
<p>
     Ukupno: <?php echo $sirovina->magacinUk.' '.$sirovina->jedinica ?>
</p>
<p>
     Slobodno: <?php echo ($sirovina->magacinUk - $sirovina->magacinRez).' '.$sirovina->jedinica ?>
</p>

     <?php echo form_open('nabavka/createZahtev/'.$sirovina->idSirovine); ?>
        <p>
            <label for="kolicina">Kolicina:</label>
            <input type="text" name ="kolicina" id="kolicina" placeholder="Unesite kolicinu" class="form-control">
        </p>
        
        <p>
            <input type ="submit" value="Poruci" class="btn btn-success"/>
        </p>
    <?php echo form_close(); ?>
   
</div>

</div>
<div class="col-lg-4"></div>
</div>
