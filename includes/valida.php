<?php

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== 'Ok' || $_SESSION['nivel'] === 'User') {
    header('Location: login/index.php');
    exit;
}
?>
