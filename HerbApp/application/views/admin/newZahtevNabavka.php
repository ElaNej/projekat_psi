      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
        <script>
        $(function() {
          $( "#datepicker" ).datepicker();
        });
        </script>  

		



		   <?php echo form_open('admin/createZahtevNabavka/'.$idProizv); ?>

           <table class="table">
               
                <tr>
		     <td>
            <label for="naziv">Sirovina:</label>

            <?php echo form_dropdown('nazivSirovine', $options, ''); ?>
            
                     </td>
                </tr>               
                
                <tr>
		     <td>
            <label for="datum">Datum:</label>
            <input type="text" name ="datum" id="datepicker" placeholder="unesite datum">

                     </td>
                </tr>
                
                 <tr>
		     <td>
            <label for="naziv">Ukupno: </label>
            <?php
            echo form_input('kolicina', '');
                            ?>
                     </td>
                </tr>
                
                <tr>
		     <td>
            <label for="naziv">Rezervisano: </label>
            <?php
            echo form_input('rezervisano', '');
                            ?>
                     </td>
                </tr>
                
                <tr>
		     <td>
            <label for="naziv">Status: </label>
            <?php
            echo form_input('status', '');
                            ?>
                     </td>
                </tr>
            
                <br/><br/>
            <tr><td colspan=1 align=center>
            <input type="submit" value="Save"  class="btn btn-success"/>
            <?php echo form_close(); ?></td>
			</tr>
			
           </table>
