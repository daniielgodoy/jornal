<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'mysqli.php';

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkEmailQuery = "SELECT email FROM tbl_login WHERE email = ?";
    $stmt = $mysqli->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo '<script>
        alert("Este e-mail já está registrado. Por favor, use outro e-mail.");
        window.location.href = "../index.php";
    </script>';

    } else {
        $insertQuery = "INSERT INTO tbl_login (nome, sobrenome, email, senha, nivel, assinante)
                        VALUES (?, ?, ?, ?, 'User', 0)";
        $stmt = $mysqli->prepare($insertQuery);
        if ($stmt) {
            $stmt->bind_param("ssss", $nome, $sobrenome, $email, $password);
            if ($stmt->execute()) {
                header('Location: ../index.php');
            } else {
                echo "Erro ao cadastrar: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $mysqli->error;
        }
    }

    $mysqli->close();
}
?>