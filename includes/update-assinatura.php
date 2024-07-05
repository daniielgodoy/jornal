<?php
session_start();
require('mysqli.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    $update_query = "UPDATE tbl_login SET assinante = 1 WHERE id = '$id'";

    if ($mysqli->query($update_query)) {
$result = $mysqli->query("SELECT assinante FROM tbl_login WHERE id = '$id'");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['assinante'] = $row['assinante'];
}        exit();
    } else {
        echo "Erro ao atualizar o nível de acesso: " . $mysqli->error;
    }
} else {
    echo "ID de sessão não encontrado ou método de requisição inválido.";
    exit();
}
?>