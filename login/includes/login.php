<?php
    session_start();

    require('mysqli.php');

    $result = $mysqli->query('SELECT id, nome, sobrenome, email, senha, nivel, assinante  FROM tbl_login WHERE email = "' . $_POST['campo_email'] . '" AND senha = "' . $_POST['campo_senha'] . '"');

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['logado'] = 'Ok';
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['sobrenome'] = $row['sobrenome'];
        $_SESSION['email'] = $_POST['campo_email'];
        $_SESSION['nivel'] = $row['nivel'];
        $_SESSION['assinante'] = $row['assinante'];
        
        header('Location: ../../admin.php');
    } else {
        session_destroy();
        header('Location: ../index.php');
    }   
?>