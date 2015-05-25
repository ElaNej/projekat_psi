<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>	 


	 
            <table align=center class="table">
			<!--listica proizvoda-->
			<tr>
				<td>
					<label for="naziv">Naziv:</label></td><td>
						<select id="sirovina" name="naziv" onChange="menjaj()" >
						<option selected disabled hidden value=''></option>
							<?php foreach ($sirovina as $val) { ?>
			 
										<option id="<?php echo $val->idSirovine; ?>">
				
										<?php echo $val->naziv; ?>
				
				
										</option>
		   
							<?php } ?>
						</select>
				</td>
			 </tr>
			 <!--kraj listice proizvoda-->
			 			

			 <tr> 
				<td>
					Trenutno stanje slobodnih sirovina u magacinu: <br> (Negativna vrednost indikuje da je rezervisano vise sirovina nego sto ih ima u magacinu)
				</td>
				<td>
					<input type="text" disabled="true" id="trVr">
				</td>
			 
			
				
			
				
			 </tr>
		
			 <tr>
				<td> 
					Unesite azurirano stanje:
				</td>
				<td>
				<input type="text" id="novaVr"/>
				
				</td>
			</tr>
			<tr>
			 <td>ili:</td>
			</tr>
			<tr>
			<td>
			Broj oduzetih/dodatih sirovina: </td>
			<td>
			<input type="number" id="NovaVrNmb">
			</td>
			</tr>
            <tr>
			<td colspan=2 align=center>
            <input type="button" value="Sacuvaj" onClick="azuriraj()"/  class="btn btn-success">
			</tr>
			
			
			
			</table>


<script>
var stanjeUkupno=0;
function isInt(n) {
   return n % 1 === 0;
}
  function menjaj()  
  {
     var options=document.getElementById("sirovina").options;
	 var id = options[options.selectedIndex].id;
	 
	 var base_url = '<?php echo site_url();?>';
	 $.ajax({
                    url : base_url + '/Magacin/VratiStanjeSir',
                    type : 'POST', //the way you want to send data to your URL
                    data : {'idSir':id},
					datatype:'json',
                    success : function(res){ //probably this request will return anything, it'll be put in var "res"
                      // alert('Successful!');

					   var obj = jQuery.parseJSON(res);
					   stanjeUkupno=parseInt(obj['stanjeUk']);
						var container = $('#trVr'); //jquery selector (get element by id)
					   var result=parseInt(obj['stanjeUk'])-parseInt(obj['stanjeRez']);
					   //alert(result);
                       container.val(result);
                    },
					error: function() {alert("error!")},
                });
	 }      
		 
	function azuriraj() {
		var options=document.getElementById("sirovina").options;
		var id = options[options.selectedIndex].id;
		var inp1=document.getElementById("novaVr").value;
		var inp2=document.getElementById("NovaVrNmb").value;
		var stanje=document.getElementById("trVr").value;
		if (inp1!='' && inp2!='' ) alert("Greska! Nije dozvoljeno popunjavanje oba polja!");
     	else if (inp1<0 || isNaN(inp1) || !isInt(inp1)) alert("Greska! Nedozvoljeno stanje magacina!");
			//sve je okej sto se tice unosa, ajax poziv!
			else { 
				 if (inp1!='') var kolicina=inp1;
				 else var kolicina=stanjeUkupno+parseInt(inp2);
				
				 var base_url = '<?php echo site_url();?>';
					$.ajax({
                    url : base_url + '/Magacin/updateStanjeSirovina',
                    type : 'POST', //the way you want to send data to your URL
                    data : {'idSir':id, 'Kol':kolicina},
					datatype:'json',
                    success : function(res){ //probably this request will return anything, it'll be put in var "data"
                       alert('Uspesno azurirane sirovine!');
                    },
					error: function() {alert("error!")},
                });
		
			}
	}		 
</script>			