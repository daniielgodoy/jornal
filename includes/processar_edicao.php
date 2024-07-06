<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Incluir arquivo de conexão com o banco de dados
    require('mysqli.php');

    // Função para limpar e validar os dados recebidos
    function validar_dados($dados) {
        // Implemente a validação dos dados conforme necessário
        return htmlspecialchars(trim($dados));
    }

    // Variáveis vindas do formulário de edição
    $id = validar_dados($_POST['id']); // ID da notícia a ser editada
    $titulo = validar_dados($_POST['titulo']);
    $subtitulo = validar_dados($_POST['subtitulo']);
    $texto = validar_dados($_POST['texto']);
    $categoria = validar_dados($_POST['categoria']);
    $principal = validar_dados($_POST['principal']);

    // Query SQL para atualizar a notícia no banco de dados
    $sql = "UPDATE tbl_noticias SET titulo = ?, subtitulo = ?, texto = ?, categoria = ?, principal = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssssi", $titulo, $subtitulo, $texto, $categoria, $principal, $id);

    if ($stmt->execute()) {
        header('Location: ../admin.php');
    } else {
        echo "Erro ao atualizar notícia: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Erro: o formulário de edição não foi submetido.";
}
?>
