
 
<p>
	Dobro dosli!
	<h2>magacin</h2>	

	
<div style="float:right;width:45%;">
<!-- pretraga  -->
<table>
<tr>
	<td>
		<input name="trazi" list="listaSir" id="ime">
		<input type="submit" value="pretraga" id="search">

		<!--problematicna f.ja-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
    $("#search").click(function(e){
    e.preventDefault();
    var id = $('#ime').val();
	var site_url = "<?php echo site_url('Magacin/pretraga/'); ?>" +id; //append id at end
    $("#odg").load(site_url);
    });
    });

</script>
	
	<!-- lista sirovina  -->
	
			<datalist id="listaSir">
					<?php foreach ($sirovina as $val) {?>
							<option value=<?php echo $val->naziv; ?> />
					<?php } ?>
			</datalist>
			
	</td>
</tr>
<tr>

	<td>
		<div id="odg">
		ODGOVOR
		<!-- odgovor na pretragu  -->	
		</div>

	</td>
</tr>

<!-- tabela sa pregledom sirovina  -->

	
	<?php foreach ($sirovina as $val){ ?>

		<tr>
			<td><?php echo $val->naziv; ?></td>
			<?php echo form_open('magacin/azurirajSirovinu/'.$val->idSirovine); ?>
            <td><input type="submit" value="azuriraj"/></td>
            <?php echo form_close(); ?>
		</tr>

		<tr>
			<td>serijski broj: <?php echo $val->serBr; ?></td>
			<td>kolicina u magacinu: <?php echo $val->magacinUk; ?></td>
		</tr>
	<?php } ?>

</table>
</div>

<!-- dugmici levo  -->	

<div style="padding-left:20%;">

 <?php echo form_open('Magacin/KompletanPregledMagacin'); ?>
            <td><input type="submit" value="Pregled kompletnog stanja"/></td>
  <?php echo form_close(); ?>
  
  <?php echo form_open('Magacin/azurirajStanje'); ?>
            <td><input type="submit" value="Azuriranje stanja u magacinu"/></td>
  <?php echo form_close(); ?>
 
  <?php echo form_open('Magacin/PregledArhive'); ?>
            <td><input type="submit" value="Pregled arhive"/></td>
  <?php echo form_close(); ?> 
  
  <?php echo form_open('Magacin/kreirajSirovinu'); ?>
            <td><input type="submit" value="Nova sirovina"/></td>
  <?php echo form_close(); ?>
  
</div>

</p>


