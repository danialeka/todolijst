<?php

include './includes/initialize.php';

$query = $pdo->prepare('SELECT * FROM items_categorieen WHERE  id=:id');
$query->execute([
    'id' => $_GET['id']
]);

$item = $query->fetch();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Categorieen</title>
    <link rel="stylesheet" href="todolijst.css">
</head>

<body>
    <header>
        <h1>Todo items</h1>

        <p>
            <a href="index.php">Todo items</a>
        </p>
    </header>
    <!-- <h2>Categorieën</h2> -->

    <!-- <h2>Categorieën: <?php echo $categorieen['naam'] ?></h2> -->
    <div>
        <div>

            <label for="huis">Huis</label>
            <input type="radio" id="huis" name="categorie" value="" checked>
        </div>

        <div>

            <label for="tuin">Tuin</label>
            <input type="radio" id="tuin" name="categorie" value="">
        </div>

        <div>

            <label for="school">School</label>
            <input type="radio" id="school" name="categorie" value="">
        </div>
        <div>

            <label for="boodschappen">Boodschappen</label>
            <input type="radio" id="boodschappen" name="categorie" value="">
        </div>

    </div>

    <div>
        <input type="submit" value="Aanpassen">
        <a href="categoriee-verwijderen.php?id=<?php echo $item['id'] ?>">Verwijderen Categoriee</a>
    </div>

</body>

</html>