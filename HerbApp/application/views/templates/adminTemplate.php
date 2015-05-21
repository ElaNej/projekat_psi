<html>
   
    <head>
        <title>
           HerbApp Admin
        </title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>
            
            $("document").ready(function(){

                $("#search").bind('input',function() {
                     var dataString = $(this).serialize();
                     var str = $('#search').val();
                     if(str == "") str = "sviKorisniciPrintdfadsuhfiusdhfoais";
                     $.ajax({
                        type : 'post',
                        url  : '<?php echo base_url()?>index.php/admin/search/'+str,
                        data : dataString,
                        dataType : 'json',
                        success : function(res) {
                            $("#searchDiv").empty();
                            $("#searchDiv").append("<th>Ime</th><th>Prezime</th><th>Kategorija</th><th></th>");
                            $.each(res, function(index, val) {
                                var aStr = '<?php echo base_url()?>index.php/Admin/azurirajKorisnikaPrikaz/' + val.idKor;
                                $("#searchDiv").append("<tr><td>" + val.ime + "</td><td>" + val.prezime + "</td><td>" + val.kategorija + "</td><td><a href=" + aStr + "><input type='submit' value='Azuriraj'></td></a></tr>");
                               
                            });
                         
                         
                         //var aStr = '<?php echo base_url()?>Admin/azurirajKorisnikaPrikaz/' + val.idKor;
                         //<form method="post" action=aStr><td><input type="submit" value="Azuriraj"></td></form>      
                         
                        }
                      });
                });
                
                var str = $('#search').val();
                if(str == "") str = "sviKorisniciPrintdfadsuhfiusdhfoais";
                var dataString = $(this).serialize();
                     $.ajax({
                        type : 'post',
                        url  : '<?php echo base_url()?>index.php/admin/search/'+str,
                        data : dataString,
                        dataType : 'json',
                        success : function(res) {
                            $("#searchDiv").empty();
                            $("#searchDiv").append("<th>Ime</th><th>Prezime</th><th>Kategorija</th><th></th>");
                            $.each(res, function(index, val) {
                                var aStr = '<?php echo base_url()?>index.php/Admin/azurirajKorisnikaPrikaz/' + val.idKor;
                                $("#searchDiv").append("<tr><td>" + val.ime + "</td><td>" + val.prezime + "</td><td>" + val.kategorija + "</td><td><a href=" + aStr + "><input type='submit' value='Azuriraj'></td></a></tr>");
                               
                            });
                         
                         
                         //var aStr = '<?php echo base_url()?>Admin/azurirajKorisnikaPrikaz/' + val.idKor;
                         //<form method="post" action=aStr><td><input type="submit" value="Azuriraj"></td></form>      
                         
                        }
                      });
                
            });
            
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
