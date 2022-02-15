<div>
    <label for="omschrijving">Omschrijving:</label>
    <input value="<?php echo $_POST['omschrijving'] ?? '' ?>" type="text" name="omschrijving" id="omschrijving">
    <?php if (isset($foutmeldingen['omschrijving'])) : ?>
        <span class="error"><?php echo $foutmeldingen['omschrijving'] ?></span>
    <?php endif ?>
</div>
<div>
    <label for="prioriteit">Prioriteit:</label>
    <select name="prioriteit" id="prioriteit">
        <?php for ($i = 0; $i < 5; $i++) : ?>
            <option <?php if (isset($_POST['prioriteit']) && $_POST['prioriteit'] == $i) {
                        echo 'selected';
                    } ?> value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php endfor ?>

    </select>
</div>
<div>

<label for="categorie">Categorie:<br></label>
<input type="radio" id="<?php echo $_POST['categorie_id'] ?? '' ?>" name="<?php echo $_POST['categorie_id'] ?? '' ?>" value="<?php echo $_POST['gebruiker_id'] ?? '' ?>checked>
</div>




