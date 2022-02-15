<?php

include './includes/initialize.php';

if (!isset($_SESSION['user'])) {
    header('location: aanmelden.php');
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Secret</h1>
    <p>Dit is een geheime die je enkel kan als je ingelogd bent</p>
    <p>
        <a href="logout.php">Afmelden</a>
    </p>
</body>

</html>