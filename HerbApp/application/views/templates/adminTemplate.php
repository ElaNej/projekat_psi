<html>
   
    <head>
        <title>
           HerbApp Admin
        </title>
        <script>
            function validacija() {

                var x = document.getElementById("korisnickoIme").value;
                if (x == null || x == "") {
                    alert("Korisnicko ime nije uneto");
                    return false;
                }
                x = document.getElementById("lozinka").value;
                if (x == null || x == "") {
                    alert("Lozinka nije uneta");
                    return false;
                }
                var e = document.getElementById("kategorija");
                x = e.selectedIndex;
                if (x == -1){
                    alert("Kategorija nije izabrana");
                    return false;
                }


            }




        </script>
    </head>
    
    <body>
     
        <h2>Admin Template</h2>
         
        <div class="wrapper">
             
            <?php echo $body; ?>
             
        </div>
         
    </body>
    
</html>
