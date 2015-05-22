<?php
/*
 * Ispod nema html, tittle, head itd. delova, sve to je
 * u template-u koji prosiruje ova stranica, a sama stranica
 * je samo sredisnji sadrzaj.
 */

?>




<div class="row" style="padding-top:5%;">
		<div class="col-md-4 column"></div>
		<div class="col-md-4 column"> 

						<div class="form-group">
						<?php echo form_open('login/isLoginOK'); ?>
        
						<label for="username">Korisnicko ime:</label>
						<input type="text" name ="username" id="username" class="form-control" placeholder="Unesite korisnicko ime">
        
        
						<label for="password">Lozinka:</label>
						<input type="password" name ="password" id="password" class="form-control" placeholder="Unesite sifru">
						<br/>
						<input type="submit" value="Login" class="btn btn-default"/>
        
						<?php echo form_close(); ?>
						<br>
						<a href="<?php echo site_url('login/registracija') ?>">Registruj se</a>
						</div>
		
		
		</div>
		<div class="col-md-4 column"></div>
</div>