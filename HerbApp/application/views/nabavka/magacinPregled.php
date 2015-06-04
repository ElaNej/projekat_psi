<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<h4>Pregled stanja u magacinu</h4>

 <div class="container" style=" overflow-y: scroll; height:70%">

<table  class="table" >
	
	<?php foreach ($magacin[1] as $proizvod){ ?>

		<tr>
			<td style="padding:20;"><?php echo $proizvod->naziv.'  br: '.$proizvod->serBr; ?>
			<br/>
			stanje u magacinu: <?php echo $proizvod->kolicinaMagacin; ?>
			</td>
			</tr>

		
	<?php } ?>
	
	<?php foreach ($magacin[2] as $sirovina){ ?>

		<tr>
			<td style="padding:20;"><?php echo $sirovina->naziv.'  br: '.$sirovina->serBr; ?>
			<br/>
			Ukupno: <?php echo $sirovina->magacinUk.' '.$sirovina->jedinica; ?>
                        <br/>
                        Slobodno: <?php echo ($sirovina->magacinUk - $sirovina->magacinRez).' '.$sirovina->jedinica; ?>
			</td>
                        
		</tr>
		
	<?php } ?>
</table>
</div>
