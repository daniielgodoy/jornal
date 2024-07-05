<?php
session_start();
require('mysqli.php');

if (!isset($_SESSION['logado'])) {
    header('Location: login/index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário
    $id = $_SESSION['id'];
    $nome = $mysqli->real_escape_string($_POST['nome']);
    $sobrenome = $mysqli->real_escape_string($_POST['sobrenome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $confirma_senha = $mysqli->real_escape_string($_POST['confirma-senha']);

    // Verifica se a senha e a confirmação de senha são iguais
    if ($senha === $confirma_senha) {
        // Atualiza os dados do usuário no banco de dados
        $query = "UPDATE tbl_login SET nome='$nome', sobrenome='$sobrenome', email='$email', senha='$senha' WHERE id='$id'";
        if ($mysqli->query($query) === TRUE) {
            // Atualiza os dados na sessão
            $_SESSION['nome'] = $nome;
            $_SESSION['sobrenome'] = $sobrenome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            // Redireciona para a página de perfil com uma mensagem de sucesso
            header('Location: ../pageperfil.php');
        } else {
            // Redireciona para a página de perfil com uma mensagem de erro
            header('Location: ../pageperfil.php');
        }
    } else {
        // Redireciona para a página de perfil com uma mensagem de erro de senha
        header('Location: ../pageperfil.php');
    }
} else {
    // Redireciona para a página de perfil se o método de solicitação não for POST
    header('Location: ../pageperfil.php');
}
?>
