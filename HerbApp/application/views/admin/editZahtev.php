            
            <?php echo form_open('admin/updateZahtev/'.$zahtev->idZahtev); ?>

           <table class="table">
               
                <tr>
		     <td>
            <label for="naziv">Naziv proizvoda:</label>

            <?php echo form_dropdown('nazivProizvoda', $options, $zahtev->idProizvod); ?>
            
                     </td>
                </tr>               
                
                <tr>
		     <td>
            <label for="datum">Datum:</label>
            <?php echo form_input('datum', $zahtev->datum); ?>
                     </td>
                </tr>
                
                 <tr>
		     <td>
            <label for="naziv">Kolicina: </label>
            <?php
            echo form_input('kolicina', $zahtev->kolicina);
                            ?>
                     </td>
                </tr>
                
                <tr>
		     <td>
            <label for="naziv">Status: </label>
            <?php
            echo form_input('status', $zahtev->status);
                            ?>
                     </td>
                </tr>
            
                <br/>
            <tr><td colspan=1 align=center>
            <input type="submit" value="Save"  class="btn btn-success"/>
            <?php echo form_close(); ?></td>
			</tr>
			
           </table>
			