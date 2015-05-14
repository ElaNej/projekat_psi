<p>
<h2>
    <?php
        echo 'Azuriranje korisnika '.$korisnik->ime.' '.$korisnik->prezime;
    ?>
</h2>


    <?php


    $this->load->helper('form');

    //otvaranje forme
    $js = 'onSubmit = "return validacija()"';
    echo form_open('Admin/azurirajKorisnika/',$js);

    //sakriven id
    echo form_hidden('idKor', $korisnik->idKor);
    echo form_hidden('status', 1);

    ?>

    <table>
        <tr>
            <td><label>Korisnicko ime:</label></td>
            <td><input type="text" name="korisnickoIme" value="<?php echo $korisnik->korisnickoIme ?>" id="korisnickoIme"  /></td>
        </tr>

        <tr>
            <td><label>Lozinka:</label></td>
            <td><input type="password" name="lozinka" value="<?php echo $korisnik->lozinka ?>" id="lozinka"  /></td>
        </tr>

        <tr>
            <td><label>Kategorija:</label></td>
            <td>
                <select name="kategorija" size="4">
                    <option value="zapProizvodnja" <?php if ($korisnik->kategorija === 'zapProizvodnja' ) echo 'selected'; ?> >proizvodnja</option>
                    <option value="zapNabavka" <?php if ($korisnik->kategorija === 'zapNabavka' ) echo 'selected'; ?> >nabavka</option>
                    <option value="zapMagacin" <?php if ($korisnik->kategorija === 'zapMagacin' ) echo 'selected'; ?> >magacin</option>
                    <option value="admin" <?php if ($korisnik->kategorija === 'admin' ) echo 'selected'; ?> >administrator</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><label>Ime:</label></td>
            <td><input type="text" name="ime" value="<?php echo $korisnik->ime ?>" id="ime"  /></td>
        </tr>

        <tr>
            <td><label>Prezime:</label></td>
            <td><input type="text" name="prezime" value="<?php echo $korisnik->prezime ?>" id="prezime"  /></td>
        </tr>

        <tr>
            <td><label>E-mail:</label></td>
            <td><input type="email" name="email" value="<?php echo $korisnik->email ?>" id="email"  /></td>
        </tr>

        <tr>
            <td><label>Zvanje:</label></td>
            <td><input type="zvanje" name="zvanje" value="<?php echo $korisnik->zvanje ?>" id="zvanje"  /></td>
        </tr>

        <tr>
            <td><label>Broj telefona:</label></td>
            <td><input type="brTel" name="brTel" value="<?php echo $korisnik->brTel ?>" id="brTel"  /></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Potvrdi"  />
        </tr>

        <tr>
            <?php
                echo form_close(); //zatvara glavnu formu
                echo form_open('Admin/korisnici/');  //otvara formu za odustani
            ?>
            <td colspan="2" align="center"><input type="submit" name="odustani" value="Odustani"  />
            <?php echo form_close(); ?>
        </tr>
    </table>

    <?php echo form_open('Admin/obrisiKorisnika/'.$korisnik->idKor); ?>
    <input type="submit" value="Obrisi korisnika"/>
    <?php echo form_close(); ?>


</p>