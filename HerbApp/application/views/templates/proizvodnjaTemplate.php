<html>
   
    <head>
        <title>
           HerbApp Proizvodnja
        </title>
       <link rel="stylesheet" href="<?php echo base_url('assets/css/stilovi.css'); ?>">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
        $(function() {
          $( "#datepicker" ).datepicker();
        });
        </script>
  
    </head>
    
    <body>
        <ul id="menu-bar">
            <li class>
            <a href="<?php echo site_url('proizvodnja/listaProizvoda/') ?>">Proizvodi</a>
            </li>
           
            <li class>
            <a href="<?php echo site_url('proizvodnja/redZaProizvodnju/') ?>">Red za Proizvodnju</a>
            </li>
        </ul>  
         
        <div class="wrapper">
            
            <div class ="centrirani">
             
            <?php echo $body; ?>
                
            </div>
        </div>
         
    </body>
    
</html>
