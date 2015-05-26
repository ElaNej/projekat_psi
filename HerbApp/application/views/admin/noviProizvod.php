

<?php echo form_open('admin/createProizvod'); ?>

<table class="table">
    <tr >
        <td><label>Naziv: </label></td>
        <td><input type="text" name="naziv" value="" id="naziv" /></td>
    </tr>
    
    
    <tr style="height:100px;">
        <td><label>Serijski broj: </label></td>
        <td><input type="text" name="serBr" value="" id="serBr" /></td>
    </tr>
    
    
    <tr style="height:400px;" valign="middle">
	
		<td align=center><h4>Lista sirovina koje proizvod sadrzi:</h4></br>
		<table class="table">
		<div id="lista">
		</div>
		</table>
				
		</td>
        
		
		
		
	<td align="right" >
		
		
		<!--tabela sa sirovinama-->
	<div style="width:600px" class="input-group">
	<span class="input-group-addon">Dodaj sirovine:</span>

    <input id="filter" type="text" class="form-control" placeholder="Trazi...">
    </div>
	
    <div class="tablecontainer">
	<table  class="table table-condensed table-responsive table-striped"> 
    <thead>
        <tr class="specTR">
            <th class="specTH">Naziv</th>
            <th  class="specTH">Serijski broj</th>
            <th  class="specTH"></th>
        </tr>
    </thead>
    <tbody class="searchable spectbody" >
	
	
	
					<?php foreach ($sirovine as $val) { ?>
					 <tr  class="specTR">
						<td  class="specTH"><?php echo $val->naziv; ?></td>
						<td  class="specTH"><?php echo $val->serBr; ?></td>																		<!--dugmence za modal-->
						<td  class="specTH"> <button type="button" class="btn btn-success mojModal" data-id=<?php echo $val->idSirovine;?> data-name=<?php echo $val->naziv;?>   data-toggle="modal" data-target="#myModal">dodaj</button></td>
							</tr>	
					<?php } ?>
					
    </tbody>
</table>
		
</div>
		
	</td>
    </tr>
   
    <tr>
        <td colspan='2' align='center'><input type='submit' name='potvrdi' value='Potvrdi' class='btn btn-success' />
    </tr>
    
    <tr>
        
        <?php
            echo form_close();
            echo form_open('Admin/prozivodiPregled');
            echo "<td colspan='2' align='center'><input type='submit' name='odustani' value='Odustani' class='btn btn-default' />";
			echo form_close();
        ?>
    </tr>
</table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
	 
               <h2> <div id="sirID" ></div></h2>
			   <br/>
			   Količina sirovine u proizvodu: <input type="number" min="0" id="kol" >


      </div>
      <div class="modal-footer" align="center">
        <button align="center" type="button" name="dodaj" class="btn btn-success">Dodaj sirovinu</button>

      </div>
    </div>
  </div>
</div>

<script>
var sirnaz='';
var sirovine=[]; //sve sirovine
var sir={naziv:'', kolicina:0};

//skripta za pretragu
 $(document).ready(function () {

    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

});


//skripta za modal
$(document).on("click", ".mojModal", function () {
	
     var sirovina = $(this).data('name');
     $(".modal-body #sirID").html( sirovina );
	 sirnaz=sirovina;
	 
});


//skripta za kolicinu iz modala    
$('button[name="dodaj"]').click(function() {
	
var value = $('input[id="kol"]').val();
if (value=='') alert("Unesite kolicinu!");
else{
 sir={naziv:sirnaz, kolicina:value};
 sirovine.push(sir);
 
 $("#lista").append("<tr><td>"+sir['naziv']+"</td><td>"+sir['kolicina']+"</td><td></td></tr>");
 $('#myModal').modal('hide');

 
 
 }
 
 
 
 });
    


</script>


<style>

.tablecontainer { width: 600px; overflow; hidden;}
.specTR {display: block; }
.specTH { width: 200px; }
.spectbody { display: block; height: 200px; overflow: auto;}

</style>