            
            <?php echo form_open('admin/updateSirovina/'.$sirovina->idSirovine.'/'.$sirovina->magacinRez); ?>

           <table class="table">
			<tr>
			<td>
            <label for="naziv">Naziv:</label></td><td>
            <?php
            /*$naziv = array(
                'name' => 'naziv',
                'id' => 'naziv',
                'value' => $sirovina->naziv,
            );*/
            echo form_input('naziv', $sirovina->naziv);
            ?></td>
             </tr>        
            
           <tr>
		   <td>
            <label for="serBr">Serijski broj:</label></td><td>
            <?php
            echo form_input('serBr', $sirovina->serBr);
            ?></td>
            </tr>
            
            <tr><td>
            <label for="vremePristiz">Vreme pristizanja:</label></td><td>
            <?php
            echo form_input('vremePristiz', $sirovina->vremePristiz);
            ?></td>
            </tr>
            
            <tr><td>
            <label for="magacinUk">Ukupno u magacinu:</label></td><td>
            <?php
            echo form_input('magacinUk', $sirovina->magacinUk);
            ?></td>
            </tr>
            
           <tr><td>
            <label for="magacinRez">Rezervisano u magacinu:</label></td><td>
            
            <?php echo form_label($sirovina->magacinRez, 'magacinRez'); ?></td>
           </tr>
            
            <tr><td>
            <label for="jedinica">Jedinica:</label></td><td>
            <?php
            echo form_input('jedinica', $sirovina->jedinica);
            ?></td>
           </tr>
            <tr><td colspan=2 align=center>
            <input type="submit" value="Sacuvaj"  class="btn btn-success"/>
            <?php echo form_close(); ?></td>
			</tr>
			</table>
			