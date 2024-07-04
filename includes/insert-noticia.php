<?php
session_start();
require('mysqli.php');

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['campo_titulo'])) {
    $form_titulo = $mysqli->real_escape_string($_POST['campo_titulo']);
    $form_subtitulo = $mysqli->real_escape_string($_POST['campo_subtitulo']);
    $form_principal = $mysqli->real_escape_string($_POST['campo_principal']);
    $form_categoria = $mysqli->real_escape_string($_POST['campo_categoria']);
    $form_texto = $mysqli->real_escape_string($_POST['campo_texto']);

    $autor_nome_completo = $_SESSION['nome'] . ' ' . $_SESSION['sobrenome'];

    $images_dir = '../images/';
    $images_file = $images_dir . basename($_FILES["campo_imagem"]["name"]);
    $images_url = 'images/' . basename($_FILES['campo_imagem']['name']);

    if (move_uploaded_file($_FILES["campo_imagem"]["tmp_name"], $images_file)) {
        $query = "INSERT INTO tbl_noticias (texto, categoria, titulo, subtitulo, principal, imagem, data, autor) 
                  VALUES ('$form_texto', '$form_categoria', '$form_titulo', '$form_subtitulo', '$form_principal', '$images_url', NOW(), '$autor_nome_completo')";

        if ($mysqli->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $mysqli->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

header('Location: ../admin.php');
?>
