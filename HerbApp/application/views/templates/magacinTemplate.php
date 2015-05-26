<html style="height:100%">
   
    <head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/nav.css'); ?>" >


	   <title>
           HerbApp Magacin
        </title>
		<script>
            
            $("document").ready(function(){
                $("#search").bind('input',function() {
                     var dataString = $(this).serialize();
                     var str = $('#search').val();
                     if(str == "") str = "sveSirovine";
                     $.ajax({
                        type : 'post',
                        url  : '<?php echo base_url()?>index.php/magacin/pretraga/'+str,
                        data : dataString,
                        dataType : 'json',
                        success : function(res) {

                            $("#searchDiv").empty();
                            $("#searchDiv").append("<th>Naziv:</th><th>serijski broj:</th><th>Kolicina u magacinu:</th><th></th>");
                            $.each(res, function(index, val) {
                                var aStr = '<?php echo base_url()?>index.php/magacin/azurirajSirovinu/' + val.idSirovine;
                                $("#searchDiv").append("<tr><td>" + val.naziv + "</td><td>" + val.serBr + "</td><td>" + val.magacinUk + "</td><td><a href=" + aStr + "><input type='submit' value='Azuriraj' class='btn btn-default'></td></a></tr>");
                               
                            });
                         
                         
                        
                         
                        }
                      });
                });
                
                var str = $('#search').val();
                if(str == "") str = "sveSirovine";
                var dataString = $(this).serialize();
                     $.ajax({
                        type : 'post',
                        url  : '<?php echo base_url()?>index.php/magacin/pretraga/'+str,
                        data : dataString,
                        dataType : 'json',
                        success : function(res) {
                            $("#searchDiv").empty();
                            $("#searchDiv").append("<th>Naziv:</th><th>Serijski broj:</th><th>Kolicina u magacinu:</th><th></th>");
                            $.each(res, function(index, val) {
                                var aStr = '<?php echo base_url()?>index.php/magacin/azurirajSirovinu/' + val.idSirovine;
                                $("#searchDiv").append("<tr><td>" + val.naziv + "</td><td>" + val.serBr + "</td><td>" + val.magacinUk + "</td><td><a href=" + aStr + "><input type='submit' value='Azuriraj' class='btn btn-default'></td></a></tr>");
                               
                            });
                         
                         
                            
                         
                        }
                      });
                
            });
</script>
    </head>
	
	
    
 <body style="height:100%;">
 
 
 <div class="container-fluid">   
 
 
 
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" rel="home" href="<?php echo site_url('magacin/listaMagacin') ?>" title="pocetna">
        <img style="max-width:120px; margin-top: -15px;"
             src="<?php echo base_url('assets/img/logo.png'); ?>">
    </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="<?php echo site_url('Magacin/KompletanPregledMagacin'); ?>">Pregled stanja magacina</a></li>
            <li><a href="<?php echo site_url('Magacin/azurirajStanjeProizvoda'); ?>">Azuriranje stanja proizvoda</a></li>
			<li><a href="<?php echo site_url('Magacin/azurirajStanjeSirovina'); ?>">Azuriranje stanja sirovina</a></li>

            <li><a href="<?php echo site_url('Magacin/PregledArhive'); ?>">Arhiva-dodatna f.ja</a></li>
			<li><a href="<?php echo site_url('Magacin/kreirajSirovinu'); ?>">Kreiranje nove sirovine</a></li>
                        
                <li><a href="<?php echo site_url('login/logout/') ?>">Logout</a></li>
            
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
 
 
	




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
	<script>

</script>
</html>
