<?php

include './includes/initialize.php';

$query = $pdo->prepare('SELECT * FROM todo_items WHERE  id=:id');
$query->execute([
    'id' => $_GET['id']
]);

$item = $query->fetch();

$datum = new DateTime($item['datum']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items details</title>
    <link rel="stylesheet" href="todolijst.css">
</head>

<body>
    <header>
        <h1>Todo items</h1>

        <p>
            <a href="index.php">Todo items</a>
        </p>
    </header>
    <h2>To do: <?php echo $item['omschrijving'] ?></h2>

    <div>
        <p>
            <a href="item-aanpassen.php?id=<?php echo $item['id'] ?>">aanpassen</a>
            <a href="item-verwijderen.php?id=<?php echo $item['id'] ?>">verwijderen</a>
        </p>
    </div>

    <h2>Categorie: </h2>

    <h2>Aangemaakt op: <?php $datum->format('d M Y') ?></h2>
    <p><b>Prioriteit <?php echo $item['prioriteit'] ?></b></p>
    <p><b>Status</b> <?php echo $item['afgewerkt'] ? 'Afgewerkt' : 'Nog af te werken' ?></p>

</body>

</html>
