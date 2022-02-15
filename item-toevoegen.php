<?php
$pdo = new PDO("mysql:host=localhost;dbname=todo_applicatie", "root", "");
$foutmeldingen = [];

if ($_POST) {
    include './includes/item-validation.php';
    include './includes/categorieen-validation.php';
    if (empty($foutmeldingen)) {
        $query = $pdo->prepare("INSERT INTO todo_items (omschrijving, prioriteit, gebruiker_id) (:omschrijving, :prioriteit, :gebruiker_id)");
        $query->execute([
            'omschrijving' => $_POST['omschrijving'],
            'prioriteit' => $_POST['prioriteit']
        ]);
        header('location: index.php');
        exit;
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items toevoegen</title>
    <link rel="stylesheet" href="todolijst.css">
</head>

<body>
    <header>
        <h1>Todo items</h1>
        <p>
            <a href="index.php">Todo items</a>
        </p>
    </header>
    <h2>Item toevoegen</h2>

    <form method="post">
        <?php include './includes/item-form.php' ?>

        <div>
            <input type="submit" value="Toevoegen">
        </div>
    </form>

</body>

</html>