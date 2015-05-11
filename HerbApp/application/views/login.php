<?php
/*
 * Ispod nema html, tittle, head itd. delova, sve to je
 * u template-u koji prosiruje ova stranica, a sama stranica
 * je samo sredisnji sadrzaj.
 */
?>
        <?php echo form_open('login/isLoginOK'); ?>
        <p>
            <label for="username">Korisnicko ime:</label>
            <input type="text" name ="username" id="username">
        </p>
        <p>
            <label for="password">Lozinka:</label>
            <input type="password" name ="password" id="password">
        </p>
        
        <p>
            <input type="submit" value="Login"/>
        </p>
        
        <?php echo form_close(); ?>