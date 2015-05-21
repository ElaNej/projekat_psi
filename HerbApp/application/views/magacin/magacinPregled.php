<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<div style="float:width:45%;" align=center >
<!-- pretraga  -->
<table class="table">
<tr>
	<td>
		<input name="trazi" list="listaSir" id="ime">
		<input type="button" value="pretraga" id="search" onClick='trazi()'  class="btn btn-default">

		

	
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
			<td><?php echo $val->naziv; ?><br>
			serijski broj: <?php echo $val->serBr; ?><br>kolicina u magacinu: <?php echo $val->magacinUk; ?>
			
			</td>
			<td>
			<?php echo form_open('magacin/azurirajSirovinu/'.$val->idSirovine); ?>
            <input type="submit" value="azuriraj" class="btn btn-default"/>
            <?php echo form_close(); ?>
		</td>

		
			
			
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
				    $("#odg").html('<tr><td>'+obj['ime']+'<br>serijski broj:'+obj['serBr']+'<br>kolicina u magacinu:'+obj['kol']+'</td><td><input type="button" class="btn btn-default" value="azuriraj" id="azuriraj"></td></tr>');
					
					
				   
					 },
					error: function() {alert("error!")},
               });

	 
	 }   
	 
	 

</script>

</div>