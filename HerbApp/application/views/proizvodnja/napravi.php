<p>
     Naziv proizvoda: <?php echo $proizvod->naziv ?>
</p>   
     <?php echo form_open('Proizvodnja/rezervisiSirovine/'.$proizvod->idProizvoda); ?>
        <p>
            <label for="kolicina">Kolicina:</label>
            <input type="text" name ="kolicina" id="kolicina">
        </p>
        
        <p>
            Datum: <input type="text" id="datepicker">
        </p>
        
        <p>
            <input type ="submit" value="Rezervisi sirovine"/>
        </p>
    <?php echo form_close(); ?>
   
