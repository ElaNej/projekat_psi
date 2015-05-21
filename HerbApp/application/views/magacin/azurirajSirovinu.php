<title>Ažuriranje sirovine</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <?php echo form_open('magacin/updateSirovina/'.$sirovina->idSirovine.'/'.$sirovina->magacinRez); ?>

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
			
			