<p>
<h2>Korisnici</h2>


<input id="search" name="search" size="50" placeholder="Pretraga.."/><br><br>
 <div class="container" style=" overflow-y: scroll; height:30%">
<table id="searchDiv" class="table"></table>
</div>

</p>

<?php echo form_open('Admin/kreirajKorisnikaPrikaz/'); ?>
<input type="submit" value="Novi Korisnik" class="btn btn-success" />
<?php echo form_close(); ?>