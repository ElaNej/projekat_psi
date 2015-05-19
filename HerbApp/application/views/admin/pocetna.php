<?php
    echo 'Dobrodosli, ime<br><br>';

    echo form_open('Admin/korisnici/'); ?>
    <input type="submit" value="Zaposleni"/>
    <?php echo form_close(); ?>

    <?php echo form_open('Admin/home/'); ?>
    <input type="submit" value="Proizvodi"/>
    <?php echo form_close(); ?>

    <?php echo form_open('Admin/sirovinePregled/'); ?>
    <input type="submit" value="Sirovine"/>
    <?php echo form_close(); ?>

    <?php echo form_open('Admin/home/'); ?>
    <input type="submit" value="Nabavka"/>
    <?php echo form_close(); ?>