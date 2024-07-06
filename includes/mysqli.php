<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_jornal";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);
}
?>
