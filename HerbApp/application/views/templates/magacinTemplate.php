<html style="height:100%">
   
    <head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


	   <title>
           HerbApp Magacin
        </title>
    </head>
    
 <body style="height:100%;">
 
 <div class="container-fluid">   
<div class="navbar">
  
    <a class="navbar-brand" rel="home" href="<?php echo site_url('magacin/listaMagacin') ?>" title="pocetna">
        <img style="max-width:100px; margin-top: -7px;"
             src="<?php echo base_url('assets/img/logo.png'); ?>">
    </a>

	
	
	

<ul class="nav nav-tabs">
		<li class="active">
			<a href="<?php echo site_url('Magacin/KompletanPregledMagacin'); ?>">Pregled kompletnog stanja magacina</a>
		</li>
		<li class="active">
			<a href="<?php echo site_url('Magacin/azurirajStanjeSirovina'); ?>">Azuriranje stanja sirovina u magacinu</a>
		</li>
		<li class="active">
			<a href="<?php echo site_url('Magacin/azurirajStanjeProizvoda'); ?>">Azuriranje stanja proizvoda u magacinu</a>
		</li>
		<li class="active">
			<a href="<?php echo site_url('Magacin/PregledArhive'); ?>">Arhiva-dodatna f.ja</a>
		</li>
		<li class="active">
			<a href="<?php echo site_url('Magacin/kreirajSirovinu'); ?>">Kreiranje nove sirovine</a>
		</li>
		
		
</ul>
</div>	
  <div class="row" style="padding-top:5%;">
						<div class="col-md-2 column"></div>
						<div class="col-md-8 column"> <?php echo $body; ?></div>
						<div class="col-md-2 column"></div>
					</div>

     
           
       </div>
	    
	 
             
    </body>
	 <footer class="footer" style="position:absolute;bottom:0;width: 100%;height: 60px;background-color: #f5f5f5;">
      <div class="container">
        <p class="text-muted">Tim RĐA © 2015</p>
      </div>
    </footer>
</html>
