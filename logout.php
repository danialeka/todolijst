<?php

include './includes/initialize.php';

unset($_SESSION['user']);
header('location: aanmelden.php');
exit;
