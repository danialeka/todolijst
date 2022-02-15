<?php
include './includes/initialize.php';

$foutmeldingen = [];

if ($_POST) {
    if (empty($_POST['username'])) {
        $foutmeldingen['username'] = "Username is verplicht";
    }
    if (empty($_POST['email'])) {
        $foutmeldingen['email'] = "E-mailadres is verplicht";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $foutmeldingen['email'] = "Vul een geldig e-mailadres in";
    }
    if (empty($_POST['password'])) {
        $foutmeldingen['password'] = "Wachtowoord is verplicht";
    }

    if (empty($foutmeldingen)) {
        $query = $pdo->prepare('INSERT INTO gebruikers (username, email, password) VALUES (:username, :email, :password )');
        $query->execute([
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        ]);
        header('location: aanmelden.php');
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
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div>
            <label for="">Username</label>
            <input value="<?php echo $_POST['username'] ?? '' ?>" type="text" name="username" id="username">
            <?php if (isset($foutmeldingen['username'])) : ?>
                <span class="error"><?php echo $foutmeldingen['username'] ?></span>
            <?php endif ?>
        </div>
        <div>
            <label for="">E-mailadres</label>
            <input value="<?php echo $_POST['email'] ?? '' ?>" type="text" name="email" id="email">
            <?php if (isset($foutmeldingen['email'])) : ?>
                <span class="error"><?php echo $foutmeldingen['email'] ?></span>
            <?php endif ?>
        </div>
        <div>
            <label for="password">Wachtwoord</label>
            <input value="<?php echo $_POST['password'] ?? '' ?>" type="text" name="password" id="password">
            <?php if (isset($foutmeldingen['password'])) : ?>
                <span class="error"><?php echo $foutmeldingen['password'] ?></span>
            <?php endif ?>
        </div>
        <div>
            <label for="password_confirm">Wachtwoord confirmatie</label>
            <input value="<?php echo $_POST['password_confirm'] ?? '' ?>" type="text" name="password_confirm" id="password_confirm">
            <?php if (isset($foutmeldingen['password_confirm'])) : ?>
                <span class="error"><?php echo $foutmeldingen['password_confirm'] ?></span>
            <?php endif ?>
        </div>
        <div>
            <input type="submit" value="Registreren">
        </div>

    </form>
</body>

</html>