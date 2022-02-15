<?php
if (empty($_POST['omschrijving'])) {
    $foutmeldingen['omschrijving'] = 'Omschrijving is verplicht';
} elseif (strlen($_POST['omschrijving']) > 255) {
    $foutmeldingen['omschrijving'] = 'Omschrijving mag maximum 255 tekens zijn';
}
