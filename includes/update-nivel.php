<?php
session_start();
require('mysqli.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $mysqli->real_escape_string($_POST['id']);
    $nivel = $mysqli->real_escape_string($_POST['nivel']);
    $assinante = isset($_POST['assinante']) ? 1 : 0; 

    $update_query = "UPDATE tbl_login SET nivel = '$nivel', assinante = $assinante WHERE id = $id";

    if ($mysqli->query($update_query)) {
        header("Location: ../admin.php");
        exit();
    } else {
        echo "Erro ao atualizar o nível de acesso: " . $mysqli->error;
    }
} else {
    header("Location: ../admin.php");
    exit();
}
?>
