            <?php echo form_open('admin/createSirovina/'); ?>

            <p>
            <label for="naziv">Naziv:</label>
            <?php
            echo form_input('naziv', '');
            ?>
            </p>          
            
            <p>
            <label for="serBr">Serijski broj:</label>
            <?php
            echo form_input('serBr', '');
            ?>
            </p>
            
            <p>
            <label for="vremePristiz">Vreme pristizanja:</label>
            <?php
            echo form_input('vremePristiz', '');
            ?>
            </p>
            
            <p>
            <label for="magacinUk">Ukupno u magacinu:</label>
            <?php
            echo form_input('magacinUk', '');
            ?>
            </p>
            
            <p>
            <label for="jedinica">Jedinica:</label>
            <?php
            echo form_input('jedinica', '');
            ?>
            </p>
            
            <input type="submit" value="Save"/>
            <?php echo form_close(); ?>
