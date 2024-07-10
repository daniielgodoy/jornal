<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Incluir arquivo de conexão com o banco de dados
    require('mysqli.php');

    // Função para limpar e validar os dados recebidos
    function validar_dados($dados) {
        return htmlspecialchars(trim($dados));
    }

    // Variáveis vindas do formulário de edição
    $id = validar_dados($_POST['id']); // ID da notícia a ser editada
    $titulo = validar_dados($_POST['titulo']);
    $subtitulo = validar_dados($_POST['subtitulo']);
    $texto = validar_dados($_POST['texto']);
    $categoria = validar_dados($_POST['categoria']);
    $principal = validar_dados($_POST['principal']);

    // Consulta SQL para obter a imagem atual
    $query = "SELECT imagem FROM tbl_noticias WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($imagem_atual);
    $stmt->fetch();
    $stmt->close();

    // Verifica se uma nova imagem foi enviada
    if (!empty($_FILES["imagem"]["name"])) {
        $images_dir = '../images/';
        $images_file = $images_dir . basename($_FILES["imagem"]["name"]);
        $images_url = 'images/' . basename($_FILES['imagem']['name']);

        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $images_file)) {
            // Define a nova imagem
            $imagem = $images_url;

            // Remove a imagem antiga, se existir
            if (file_exists($imagem_atual)) {
                unlink($imagem_atual);
            }
        } else {
            echo "Falha ao enviar a nova imagem.";
            exit;
        }
    } else {
        // Mantém a imagem atual se uma nova não foi enviada
        $imagem = $imagem_atual;
    }

    // Query SQL para atualizar a notícia no banco de dados
    $sql = "UPDATE tbl_noticias SET titulo = ?, subtitulo = ?, texto = ?, categoria = ?, principal = ?, imagem = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssssi", $titulo, $subtitulo, $texto, $categoria, $principal, $imagem, $id);

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
