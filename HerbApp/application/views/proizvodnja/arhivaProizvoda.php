<h2>Arhivirani zahtevi</h2>

   <!-- <table class='etfTable'> -->
        <table class="table">
		
        <th>Proizvod</th> <th></th>

        <th>Datum</th><th></th>
        <th>Kolicina</th>
        <th>Status</th>
        </table>
		 <div class="container" style=" overflow-y: scroll; height:60%">

		<table class="table">
      <?php foreach ($zahtevi as $zahtev){ ?>
        <tr>
            
            <td><?php echo $proizvodi[$zahtev->idProizvod]->naziv; ?></td>
            <td><?php echo $zahtev->datum; ?></td><th></th><th></th>
            <td><?php echo $zahtev->kolicina; ?></td><th></th><th></th><th></th><th></th>
            <td><?php echo $zahtev->status; ?></td>     
            
            
        </tr>
      <?php } ?>
    </table>
</div>