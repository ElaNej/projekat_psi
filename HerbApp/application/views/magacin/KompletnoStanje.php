<div align=center>
<table border=1; >
<title>Pregled stanja u magacinu</title>
	
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
			stanje u magacinu: <?php echo $sirovina->magacinUk; ?>
			</td>
			</tr>

		
	<?php } ?>
</table>
</div>