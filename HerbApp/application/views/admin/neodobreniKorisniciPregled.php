
<div class="row" style="padding-top:5%;">
						<div class="col-md-2 column"></div>
						<div class="col-md-8 column"> 
                                                
                                                
                                                <p>
                                                <h2>Novi zahtevi</h2>
                                                <table class="table">
                                                    <th>Ime</th>
                                                    <th>Prezime</th>
                                                    <th>Kategorija</th>
                                                    <th></th>
                                                    <th></th>

                                                    <?php

                                                        $count = 0;
                                                        foreach ($korisnici as $korisnik){

                                                            if ($korisnik->status == 1) continue;
                                                            $count++;

                                                            ?>

                                                        <tr>


                                                            <td><?php echo $korisnik->ime; ?></td>
                                                            <td><?php echo $korisnik->prezime; ?></td>
                                                            <td><?php echo $korisnik->kategorija; ?></td>

                                                            <?php echo form_open('Admin/prihvatiKorisnika/'.$korisnik->idKor); ?>
                                                            <td><input type="submit" value="Prihvati" class="btn btn-success" /></td>
                                                            <?php echo form_close(); ?>

                                                            <?php echo form_open('Admin/obrisiKorisnika/'.$korisnik->idKor); ?>
                                                            <td><input type="submit" value="Odbij" class="btn btn-default" /></td>
                                                            <?php echo form_close(); ?>

                                                        </tr>
                                                    <?php }
                                                        if ($count == 0) echo '<tr><td colspan="3">Nema novih zahteva</td></tr>';
                                                    ?>

                                                </table>
                                                </p>
                                                
                                                
                                                
                                                </div>
						<div class="col-md-2 column"></div>
					</div>

     
           
       </div>




