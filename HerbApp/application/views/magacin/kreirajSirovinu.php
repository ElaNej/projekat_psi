            <?php echo form_open('magacin/createSirovina/'); ?>
	<table align=center>
		<tr>
            <td>   
            <label for="naziv">Naziv:</label>
			</td>
			<td> 
            <?php
            echo form_input('naziv', '');
            ?>
			</td> 
         </tr>            
            
         <tr>
		 <td> 
            <label for="serBr">Serijski broj:</label>
			</td> 
			<td> 
            <?php
            echo form_input('serBr', '');
            ?>
			</td> 
         </tr>
            
         <tr>
		 <td> 
            <label for="vremePristiz">Vreme pristizanja:</label>
			</td> 
			<td> 
            <?php
            echo form_input('vremePristiz', '');
            ?>
			</td> 
         </tr>
            
         <tr>
		 <td> 
            <label for="magacinUk">Ukupno u magacinu:</label>  </td> <td> 
            <?php
            echo form_input('magacinUk', '');
            ?>
			</td> 
         </tr>
            
         <tr>
		 <td> 
            <label for="jedinica">Jedinica:</label></td> <td> 
            <?php
            echo form_input('jedinica', '');
            ?></td> 
         </tr>
          <tr> <td colspan=2 align=center>  
            <input type="submit" value="Save"/>
            <?php echo form_close(); ?> </td>
		</tr>
	</table>