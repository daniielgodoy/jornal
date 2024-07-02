<?php
require('includes/header.php');
require('includes/mysqli.php');

// Verifica se o ID da notícia foi passado via GET
if (isset($_GET['id'])) {
    // Sanitiza o ID da notícia para evitar SQL Injection
    $idNoticia = $mysqli->real_escape_string($_GET['id']);
    
    // Consulta para obter os detalhes da notícia
    $query = "SELECT * FROM tbl_noticias WHERE id = $idNoticia";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = $row['titulo'];
        $subtitulo = $row['subtitulo'];
        $imagem = $row['imagem'];
        $data = $row['data'];
        $autor = $row['autor'];
        $texto = $row['texto'];
        $categoria = $row['categoria'];

        // Exibe os detalhes da notícia conforme o layout desejado
?>
        <body>
            <div id="body">
                <?php require('includes/navbar.php'); ?>
                <?php require('includes/menu.php'); ?>
                <div id="noticiatop">
                    <h2><?php echo $titulo; ?></h2>
                    <h3><?php echo $subtitulo; ?></h3>
                    <p>Autor: <?php echo $autor; ?>ㅤ<?php echo $data; ?></p>
                    
                    <img src="<?php echo $imagem; ?>" alt="Imagem da notícia">
                    <p><?php echo $texto; ?></p>
                </div>
                <?php
        require ('includes/rodape.php');
        ?>
            </div>
        </body>
<?php
    } else {
        echo "Notícia não encontrada.";
    }
} else {
    echo "ID da notícia não especificado.";
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>
