<?php
include './includes/initialize.php';

$foutmeldingen = [];

if ($_POST) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $foutmeldingen['username'] = "Username en wachtwoord is verplicht in te vullen";
    }


    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('SELECT * FROM gebruikers WHERE username=:username LIMIT 1');
        $query->execute(['username' => $_POST['username']]);
        $user = $query->fetch();



        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            header('location: index.php');
            exit;
        } else {
            $foutmeldingen['username'] = 'We kunnen je niet aanmelden met deze gegevens';
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanmelden</title>
</head>

<body>
    <form method="post">
        <div>
            <label for="username">Username</label>
            <input value="<?php echo $_POST['username'] ?? '' ?>" type="text" name="username" id="username">
            <?php if (isset($foutmeldingen['username'])) : ?>
                <span class="error"><?php echo $foutmeldingen['username'] ?></span>
            <?php endif ?>
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password">

        </div>

        <div>
            <input type="submit" value="Aanmelden">
        </div>

    </form>
</body>

</html>