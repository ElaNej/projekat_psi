            
            <?php echo form_open('admin/updateZahtevNabavka/'.$zahtev->idZahtevProiz.'/'.$zahtev->idZahtevSirov); ?>

           <table class="table">
               
                <tr>
		     <td>
            <label for="naziv">Sirovina:</label>

            <?php echo form_label($sirovina->naziv); ?>
            
                     </td>
                </tr>               
                
                <tr>
		     <td>
            <label for="datum">Datum:</label>
            <?php echo form_input('datum', $zahtev->datumComplete); ?>
                     </td>
                </tr>
                
                 <tr>
		     <td>
            <label for="naziv">Ukupno: </label>
            <?php
            echo form_input('kolicina', $zahtev->kolicina);
                            ?>
                     </td>
                </tr>
                
                <tr>
		     <td>
            <label for="naziv">Rezervisano: </label>
            <?php
            echo form_input('rezervisano', $zahtev->rezervisano);
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
            
                <br/><br/>
            <tr><td colspan=1 align=center>
            <input type="submit" value="Save"  class="btn btn-success"/>
            <?php echo form_close(); ?></td>
			</tr>
			
           </table>
			