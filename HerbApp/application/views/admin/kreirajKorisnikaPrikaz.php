<p>
<h2>
   <?php
    if($registracija == 0) echo "Kreiranje novog korisnika";
    else echo "Registracija novog korisnika";
   ?>
   
</h2>


<?php


    $this->load->helper('form');

    //otvaranje forme
    $js = 'onSubmit = "return validacija()"';
    echo form_open('Admin/kreirajKorisnika/',$js);

    //registracija = 0 ako admin kreira novog korinika
    //registracija = 1 ako se korinisk registruje
    if($registracija == 0) echo form_hidden('status', 1);
    else echo form_hidden('status', 0);
    
?>

<table class="table">
    <tr>
        <td><label>Korisnicko ime:</label></td>
        <td><input type="text" name="korisnickoIme" value="" id="korisnickoIme"  /></td>
    </tr>

    <tr>
        <td><label>Lozinka:</label></td>
        <td><input type="password" name="lozinka" value="" id="lozinka"  /></td>
    </tr>

    <tr>
        <td><label>Kategorija:</label></td>
        <td>
            <select name="kategorija" id="kategorija" size="4">
                <option value="zapProizvodnja" >proizvodnja</option>
                <option value="zapNabavka" >nabavka</option>
                <option value="zapMagacin" >magacin</option>
                <option value="admin" >administrator</option>
            </select>
        </td>
    </tr>

    <tr>
        <td><label>Ime:</label></td>
        <td><input type="text" name="ime"  id="ime"  /></td>
    </tr>

    <tr>
        <td><label>Prezime:</label></td>
        <td><input type="text" name="prezime" value="" id="prezime"  /></td>
    </tr>

    <tr>
        <td><label>E-mail:</label></td>
        <td><input type="email" name="email" value="" id="email"  /></td>
    </tr>

    <tr>
        <td><label>Zvanje:</label></td>
        <td><input type="zvanje" name="zvanje" value="" id="zvanje"  /></td>
    </tr>

    <tr>
        <td><label>Broj telefona:</label></td>
        <td><input type="brTel" name="brTel" value="" id="brTel"  /></td>
    </tr>

    <tr>
        <td colspan="2" align="center"><input type="submit" name="submit" value="Potvrdi" class="btn btn-success" />
    </tr>

    <tr>
        <?php
            echo form_close(); //zatvara glavnu formu
            
            if($registracija == 0)echo form_open('Admin/korisnici/');
            else echo form_open('Login/index/');
              
        ?>
        <td colspan="2" align="center"><input type="submit" name="odustani" value="Odustani" class="btn btn-default" />
            <?php echo form_close(); ?>
    </tr>
</table>



</p>