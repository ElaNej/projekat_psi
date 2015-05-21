<p>
<h2>Korisnici</h2>


<input id="search" name="search" size="50" placeholder="Search"/><br><br>
<table id="searchDiv" class="table"></table>


</p>

<?php echo form_open('Admin/kreirajKorisnikaPrikaz/'); ?>
<input type="submit" value="Novi Korisnik" class="btn btn-success" />
<?php echo form_close(); ?>