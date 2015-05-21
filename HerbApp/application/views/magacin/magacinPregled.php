

<div style="float:width:45%;" align=center >
<!-- pretraga  -->
<table>
<tr>
	<td>
		<input name="trazi" list="listaSir" id="ime">
		<input type="button" value="pretraga" id="search" onClick='trazi()'>

		

	
	<!-- lista sirovina  -->
	
			<datalist id="listaSir">
					<?php foreach ($sirovina as $val) {?>
							<option value=<?php echo $val->naziv; ?> />
					<?php } ?>
			</datalist>
			
	</td>
</tr>
<tr>

	<td colspan=2>
		<div id="odg">
		
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


<script>
//PROBLEM! ne znam kako da dodam ovde azuriranje na klik, ugnjezdeni ajax ne radi
 function trazi()  
  {	
	 var ime=document.getElementById("ime").value;
	 var base_url = '<?php echo site_url();?>';
	$.ajax({
             url : base_url + '/Magacin/pretraga',
             type : 'POST', //the way you want to send data to your URL
             data : {'ime':ime},
	  		 datatype:'json',
			 
                  success : function(res){ //probably this request will return anything, it'll be put in var "res"
                  // alert('Successful!');
				   var obj = jQuery.parseJSON(res);
				   var result=obj['id'];
				    $("#odg").html('<tr><td>'+obj['ime']+'</td><td><input type="button" value="azuriraj" id="azuriraj"></td></tr><tr><td>serijski broj:'+obj['serBr']+'</td><td>kolicina u magacinu:'+obj['kol']+'</td></tr>');
					
					
				   
					 },
					error: function() {alert("error!")},
               });

	 
	 }   
	 
	 

</script>

</div>