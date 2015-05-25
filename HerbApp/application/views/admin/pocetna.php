
	
	<!--tbd meni-->
	<?php
    echo 'Dobrodosli <br><br>'; ?>

	<div class="btn-group btn-group-justified" role="group" aria-label="...">
	
	<div class="btn-group" role="group">
    <?php echo form_open('Admin/korisnici/'); ?>
	<button type="submit" value="Zaposleni" class="btn btn-default"/>Zaposleni</button>
    <?php echo form_close(); ?>
	</div>

	<div class="btn-group" role="group">
    <?php echo form_open('Admin/home/'); ?>
    <button type="submit" value="Proizvodi" class="btn btn-default"/>Proizvodi</button>
    <?php echo form_close(); ?>
	</div>
	<div class="btn-group" role="group">
    <?php echo form_open('Admin/sirovinePregled/'); ?>
    <button type="submit" value="Sirovine" class="btn btn-default"/>Sirovine</button>
    <?php echo form_close(); ?>
	</div>
	<div class="btn-group" role="group">
    <?php echo form_open('Admin/home/'); ?>
    <button type="submit" value="Nabavka" class="btn btn-default"/>Nabavka</button>
    <?php echo form_close(); ?>
	</div>
</div>