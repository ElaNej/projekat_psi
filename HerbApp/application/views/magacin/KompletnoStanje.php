<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<div align=center>
<table  class="table" >
<title>Pregled stanja u magacinu</title>
	
	<?php foreach ($magacin[1] as $proizvod){ ?>

		<tr>
			<td style="padding:20;"><?php echo $proizvod->naziv.'  br: '.$proizvod->serBr; ?>
			<br/>
			stanje u magacinu: <?php echo $proizvod->kolicinaMagacin; ?>
			</td>
			</tr>

		
	<?php } ?>
	</table>
	 <div class="container" style=" overflow-y: scroll; height:80%">

	<table class="table">
	<?php foreach ($magacin[2] as $sirovina){ ?>

		<tr>
			<td style="padding:20;"><?php echo $sirovina->naziv.'  br: '.$sirovina->serBr; ?>
			<br/>
			stanje u magacinu: <?php echo $sirovina->magacinUk; ?>
			</td>
			</tr>

		
	<?php } ?>
</table>
</div>
</div>









