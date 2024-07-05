<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Conexão com o banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_jornal";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Variáveis vindas do formulário de edição
    $id = $_POST['id']; // supondo que você passe o ID da notícia a ser editada
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    // ... outras variáveis que você queira editar

    // Query SQL para atualizar a notícia no banco de dados
    $sql = "UPDATE tbl_noticias SET titulo = '$titulo', texto = '$texto' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Notícia atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar notícia: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Erro: o formulário de edição não foi submetido.";
}
?>
