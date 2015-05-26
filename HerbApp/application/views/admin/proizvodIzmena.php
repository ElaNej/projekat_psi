<?php echo form_open('admin/updateProizvod/'.$proizvod->idProizvoda); ?>

<table class="table">
    <tr>
        <td><label>Naziv: </label></td>
        <td><input type="text" name="naziv" value="<?php echo $proizvod->naziv; ?>" id="naziv" /></td>
    </tr>
    
    
    <tr>
        <td><label>Serijski broj: </label></td>
        <td><input type="text" name="serBr" value="<?php echo $proizvod->serBr; ?>" id="serBr" /></td>
    </tr>
    
    <!--
    <tr>
        <td><label>Lista sirovina: </label></td>
        <td>
        <select name="sir[]" id="sir" size="10" multiple="multiple" style=" width: 195px">
        <?php
            foreach($sirovine as $sirovina){
                echo "<option value=".$sirovina->idSirovine.">".$sirovina->naziv."</option>";
            }
        ?>
        </select>
        </td>
    </tr>
    -->
    
    <tr>
        <td colspan='2' align='center'><input type='submit' name='potvrdi' value='Potvrdi' class='btn btn-success' />
    </tr>
    
    <tr>
        
        <?php
            echo form_close();
            echo form_open('Admin/prozivodiPregled');
            echo "<td colspan='2' align='center'><input type='submit' name='odustani' value='Odustani' class='btn btn-default' />";
        ?>
    </tr>
    
    <tr>
        
        <?php
            echo form_close();
            echo form_open('Admin/deleteProizvod/'.$proizvod->idProizvoda);
            echo "<td colspan='2' align='center'><input type='submit' name='obrisi' value='Obrisi' class='btn btn-danger' />";
        ?>
    </tr>
</table>




