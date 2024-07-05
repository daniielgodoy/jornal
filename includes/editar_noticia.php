<?php
// Verifica se o parâmetro ID foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Conexão com o banco de dados (substitua pelas suas configurações)
    $mysqli = new mysqli('localhost', 'root', '', 'bd_jornal');

    // Verifica se houve erro na conexão
    if ($mysqli->connect_error) {
        die('Erro na conexão: ' . $mysqli->connect_error);
    }

    // Função para limpar e validar os dados recebidos
    function validar_dados($dados) {
        // Implemente a validação dos dados conforme necessário
        return htmlspecialchars(trim($dados));
    }

    // Obtém o ID da notícia da URL
    $id = validar_dados($_GET['id']);

    // Consulta SQL para selecionar os dados da notícia pelo ID
    $query = "SELECT id, titulo, subtitulo, texto, categoria, principal FROM tbl_noticias WHERE id = $id";
    $result = $mysqli->query($query);

    // Verifica se a consulta retornou resultados
    if ($result && $result->num_rows > 0) {
        // Obtém os dados da notícia
        $noticia = $result->fetch_assoc();

        // Libera o resultado da consulta
        $result->free();

        // Fecha a conexão com o banco de dados
        $mysqli->close();
    } else {
        // Se não encontrou a notícia, redireciona ou exibe uma mensagem de erro
        $mysqli->close();
        die('Notícia não encontrada.');
    }
} else {
    // Se o parâmetro ID não foi passado, redireciona ou exibe uma mensagem de erro
    die('ID da notícia não foi especificado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Notícia</title>
    <!-- Incluir seus estilos CSS aqui -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Notícia</h1>
    <form action="processar_edicao.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $noticia['id']; ?>">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $noticia['titulo']; ?>"><br><br>
        <label for="subtitulo">Subtítulo:</label>
        <input type="text" id="subtitulo" name="subtitulo" value="<?php echo $noticia['subtitulo']; ?>"><br><br>
        <label for="texto">Texto:</label><br>
        <textarea id="texto" name="texto" rows="4" cols="50"><?php echo $noticia['texto']; ?></textarea><br><br>
        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo $noticia['categoria']; ?>"><br><br>
        <label for="principal">Principal:</label>
        <input type="text" id="principal" name="principal" value="<?php echo $noticia['principal']; ?>"><br><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
