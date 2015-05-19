            
            <?php echo form_open('admin/updateSirovina/'.$sirovina->idSirovine.'/'.$sirovina->magacinRez); ?>

            <p>
            <label for="naziv">Naziv:</label>
            <?php
            /*$naziv = array(
                'name' => 'naziv',
                'id' => 'naziv',
                'value' => $sirovina->naziv,
            );*/
            echo form_input('naziv', $sirovina->naziv);
            ?>
            </p>          
            
            <p>
            <label for="serBr">Serijski broj:</label>
            <?php
            echo form_input('serBr', $sirovina->serBr);
            ?>
            </p>
            
            <p>
            <label for="vremePristiz">Vreme pristizanja:</label>
            <?php
            echo form_input('vremePristiz', $sirovina->vremePristiz);
            ?>
            </p>
            
            <p>
            <label for="magacinUk">Ukupno u magacinu:</label>
            <?php
            echo form_input('magacinUk', $sirovina->magacinUk);
            ?>
            </p>
            
            <p>
            <label for="magacinRez">Rezervisano u magacinu:</label>
            
            <?php echo form_label($sirovina->magacinRez, 'magacinRez'); ?>
            </p>
            
            <p>
            <label for="jedinica">Jedinica:</label>
            <?php
            echo form_input('jedinica', $sirovina->jedinica);
            ?>
            </p>
            
            <input type="submit" value="Save"/>
            <?php echo form_close(); ?>
