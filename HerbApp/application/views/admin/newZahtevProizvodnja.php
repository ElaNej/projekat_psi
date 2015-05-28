            
            <?php echo form_open('admin/createZahtevProizvodnja/'); ?>

           <table class="table">
               
                <tr>
		     <td>
            <label for="naziv">Naziv proizvoda:</label>

            <?php echo form_dropdown('nazivProizvoda', $options, ''); ?>
            
                     </td>
                </tr>               
                
                <tr>
		     <td>
            <label for="datum">Datum:</label>
            <?php echo form_input('datum', ''); ?>
                     </td>
                </tr>
                
                 <tr>
		     <td>
            <label for="naziv">Kolicina: </label>
            <?php
            echo form_input('kolicina', '');
                            ?>
                     </td>
                </tr>
                
                <tr>
		     <td>
            <label for="naziv">Status: </label>
            <?php
            echo form_input('status', '');
                            ?>
                     </td>
                </tr>
            
                <br/>
            <tr><td colspan=1 align=center>
            <input type="submit" value="Create"  class="btn btn-success"/>
            <?php echo form_close(); ?></td>
			</tr>
			
           </table>
			
