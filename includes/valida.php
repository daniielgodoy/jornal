<?php
session_start();
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== 'Ok') {
    header('Location: login/index.php');
    exit;
}
?>
