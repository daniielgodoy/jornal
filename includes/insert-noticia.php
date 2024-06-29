<?php
    require('mysqli.php');

    if (isset($_POST['campo_titulo'])) {
        $form_titulo = $_POST['campo_titulo'];
        $form_subtitulo = $_POST['campo_subtitulo'];
        $form_principal = $_POST['campo_principal'];

        $images_dir = '../images/';
        $images_file = $images_dir . basename($_FILES["campo_imagem"]["name"]);
        $images_url = 'images/' . basename($_FILES['campo_imagem']['name']);

        move_uploaded_file($_FILES["campo_imagem"]["tmp_name"], $images_file);
    }

    $mysqli->query("INSERT INTO tbl_noticias(titulo, subtitulo, principal, imagem) VALUES ('" . $form_titulo . "','" . $form_subtitulo . "','" . $form_principal . "','" . $images_url . "');");

    unset($_POST['campo_nome']); 

    header('Location: ../admin.php');
?>
