<?php
session_start();
require('includes/header.php');
require('includes/mysqli.php');
?>

<body>
    <?php
    require('includes/verificaassinatura.php');
    ?>
    <div id="body">
        <?php
        require('includes/navbar.php');
        require('includes/menu.php'); // Include the menu here
        ?>

            <?php
            if (isset($_GET['id'])) {
                $idNoticia = $mysqli->real_escape_string($_GET['id']);

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
            ?>
                    <div id="noticiatop">
                        <h2><?php echo $titulo; ?></h2>
                        <h3><?php echo $subtitulo; ?></h3>
                        <p>Autor: <?php echo $autor; ?>ㅤ<?php echo $data; ?></p>
                        <img src="<?php echo $imagem; ?>" alt="Imagem da notícia">
                        <p><?php echo $texto; ?></p>
                    </div>
            <?php
                } else {
                    echo "Notícia não encontrada.";
                }
            } else {
                echo "ID da notícia não especificado.";
            }

            $mysqli->close();
            ?>

        <?php require('includes/rodape.php'); ?>
    </div>


</body>
</html>
