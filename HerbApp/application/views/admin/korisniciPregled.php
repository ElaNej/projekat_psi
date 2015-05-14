<p>
<h2>Korisnici</h2>
<table>
    <th>Ime</th>
    <th>Prezime</th>
    <th>Kategorija</th>
    <th></th>

    <?php foreach ($korisnici as $korisnik){
        if ($korisnik->status == 0) continue;
        ?>
        <tr>


            <td><?php echo $korisnik->ime; ?></td>
            <td><?php echo $korisnik->prezime; ?></td>
            <td><?php echo $korisnik->kategorija; ?></td>

            <?php echo form_open('Admin/azurirajKorisnikaPrikaz/'.$korisnik->idKor); ?>
            <td><input type="submit" value="Azuriraj"/></td>
            <?php echo form_close(); ?>

        </tr>
    <?php } ?>

</table>
</p>

<?php echo form_open('Admin/kreirajKorisnikaPrikaz/'); ?>
<input type="submit" value="Novi Korisnik"/>
<?php echo form_close(); ?>