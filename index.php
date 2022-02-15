<?php

include './includes/initialize.php';

$query = $pdo->query('SELECT * FROM todo_items WHERE afgewerkt=0');
$todoitems = $query->fetchAll();

$query = $pdo->query('SELECT * FROM todo_items WHERE afgewerkt=1');
$completed_items = $query->fetchAll();

// // $query = $pdo->query('SELECT * FROM todo_items WHERE id=gebruikers_id'); 
// $_SESSION = $query->fetchAll();





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="todolijst.css">

</head>

<body>
    <h1>LOGING</h1>

    <p>
        <?php if (isset($_SESSION['user'])) : ?>
            Hallo, <b><?php echo $_SESSION['user']['username'] ?></b>!Welkom op deze website.

    <header>
        <h1>Todo items</h1>
        <p>
            <a href="item-toevoegen.php">Nieuw item toevoegen</a>
        </p>
    </header>
    <?php if (count($todoitems)) : ?>
        <ul>
            <?php foreach ($todoitems as $item) : ?>
                <?php include './includes/item-listitem.php' ?>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Er zijn geen todo items te doen!</p>
    <?php endif; ?>



    <section>
        <h2>Afgewerkte items</h2>

        <?php if (count($completed_items)) : ?>
            <ul>
                <?php foreach ($completed_items as $item) : ?>
                    <?php include './includes/item-listitem.php' ?>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Er zijn geen todo items te doen!</p>
        <?php endif; ?>
    </section>
    <?php else : ?>
    Je bent niet ingelogd, 
<?php endif ?>
</p>
<ul>
    <?php if (!isset($_SESSION['user'])) : ?>
        <li><a href="aanmelden.php">Aanmelden</a></li>
        <li><a href="registratie.php">Registreren</a></li>
    <?php else : ?>
        <!-- <li><a href="secret.php">Top Secret</a></li> -->
        <li><a href="logout.php">Afmelden</a></li>
    <?php endif ?>
</ul>

</body>


</html>