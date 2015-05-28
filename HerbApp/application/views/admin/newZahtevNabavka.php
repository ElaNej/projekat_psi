            
            <?php echo form_open('admin/createZahtevNabavka/'.$idProizv); ?>

           <table class="table">
               
                <tr>
		     <td>
            <label for="naziv">Sirovina:</label>

            <?php echo form_dropdown('nazivSirovine', $options, ''); ?>
            
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
            <label for="naziv">Ukupno: </label>
            <?php
            echo form_input('kolicina', '');
                            ?>
                     </td>
                </tr>
                
                <tr>
		     <td>
            <label for="naziv">Rezervisano: </label>
            <?php
            echo form_input('rezervisano', '');
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
            
                <br/><br/>
            <tr><td colspan=1 align=center>
            <input type="submit" value="Save"  class="btn btn-success"/>
            <?php echo form_close(); ?></td>
			</tr>
			
           </table>
			
