<html>
   
    <head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	   <title>
           HerbApp Magacin
        </title>
    </head>
    
    <body>
     
        <h2>Magacin Template</h2>
         	<h1>Dobro dosli!</h1>
			<h2>magacin</h2>	
<div style="padding-left:20%;">

 <?php echo form_open('Magacin/KompletanPregledMagacin'); ?>
            <td><input type="submit" value="Pregled kompletnog stanja"/></td>
  <?php echo form_close(); ?>
  
  <?php echo form_open('Magacin/azurirajStanjeSirovina'); ?>
            <td><input type="submit" value="Azuriranje stanja sirovina u magacinu"/></td>
  <?php echo form_close(); ?>
  
  <?php echo form_open('Magacin/azurirajStanjeProizvoda'); ?>
            <td><input type="submit" value="Azuriranje stanja proizvoda u magacinu"/></td>
  <?php echo form_close(); ?>
 
  <?php echo form_open('Magacin/PregledArhive'); ?>
            <td><input type="submit" value="Pregled arhive"/></td>
  <?php echo form_close(); ?> 
  
  <?php echo form_open('Magacin/kreirajSirovinu'); ?>
            <td><input type="submit" value="Nova sirovina"/></td>
  <?php echo form_close(); ?>
  
</div>
        <div class="wrapper">
             
            <?php echo $body; ?>
             
        </div>
         
    </body>
    
</html>
