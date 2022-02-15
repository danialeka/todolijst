<?php
include './includes/initialize.php';
$categorieen = [];
if (!isset($_GET['id'])) {
    header('location: index.php');
    exit;
}


$foutmeldingen = [];
if ($_POST) {
    if (empty($_POST['omschrijving'])) {
        $foutmeldingen['omschrijving'] = 'Omschrijving is verplicht';
    }
    elseif (strlen($_POST['omschrijving']) > 255) {
        $foutmeldingen['omschrijving'] = 'Omschrijving mag maximum 255 tekens zijn';
    }
    if (empty($foutmeldingen)) {
        $query = $pdo->prepare("UPDATE todo_items SET omschrijving=:omschrijving, categorie_id=:categorie_id, prioriteit=:prioriteit, afgewerkt=:afgewerkt WHERE id=:id");
        $query->execute([
            'id' => $_GET['id'],
            'omschrijving' => $_POST['omschrijving'],
            'prioriteit' => $_POST['prioriteit'],
            'categorie_id' => $_POST['categorie_id'],
            'afgewerkt' => $_POST['afgewerkt'] ?? 0
        ]);
        header('location: item-details.php?id='.$_GET['id']);
        exit;
    }
} else {


    
    $query = $pdo->prepare('SELECT * FROM todo_items WHERE id=:id');
    $query->execute([ 
    'id' => $_GET['id']
]);
$_POST = $query->fetch();
}







$query = $pdo->prepare('SELECT * FROM items_categorieen');
$query->execute();
$categorieen = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanpassen</title>
    <link rel="stylesheet" href="todolijst.css">
</head>

<body>
    <header>
        <h1>Todo items</h1>
        <p>
            <a href="index.php">Todo items</a>
        </p>
    </header>

    <h2>Item aanpassen</h2>
    <form method="post">
        <?php include './includes/item-form.php' ?>

        <div>

            <label>
                <input <?php if(isset($_POST['afgewerkt']) && $_POST['afgewerkt'] == 1) {
                            echo 'checked';
                        } ?> type="checkbox" name="afgewerkt" id="afgewerkt" value="1">Item is afgewerkt
             </label>
        </div>


        <p>Categorieën:</p>
      <div>


            <div>
                <?php foreach ($categorieen as $categorie) : ?>
                    
                    <label for="<?php echo $categorie ?>"><?php echo $categorie ['naam']?></label>
                    <input type="radio" id="<?php echo $categorie['naam'] ?>" name="<?php echo $categorie ?>" value="<?php echo $categorie['naam'] ?>">
                    
                    <button><a href="categoriee-verwijderen.php?id=<?php echo $categorie['id'] ?>">Verwijderen Categoriee</a></button><br>
                <?php endforeach; ?>
            
             
            </div>


        </div> 



        <div>
            <input type="submit" value="Aanpassen">

        </div>

    </form>
</body>

</html>