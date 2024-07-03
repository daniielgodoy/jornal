<?php
session_start();
require('includes/header.php');
require('includes/mysqli.php');
?>

<body>
    <div id="body">
        <?php
        require('includes/navbar.php');
        require('includes/menu.php');
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var linhaDiv = document.getElementById('linha');
            <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok'): ?>
                var nome = "<?php echo $_SESSION['nome']; ?>";
                var sobrenome = "<?php echo $_SESSION['sobrenome']; ?>";
                linhaDiv.innerHTML = `
                    <div>
                        <i class="fa-regular fa-circle-user fa-3x"></i>
                        <div id="acesso">${nome} ${sobrenome}</div>
                    </div>
                    <div id="perfil-logout">
                        <a href="includes/perfil.php">Perfil</a> |
                        <a href="includes/logout.php">Logout</a>
                    </div>
                `;
            <?php else: ?>
                linhaDiv.innerHTML = `
                    <a href="login/index.php">
                        <i class="fa-regular fa-circle-user fa-3x"></i>
                        <div id="acesso">Acesse sua Conta</div>
                        <div id="gratis">ou crie uma grátis</div>
                    </a>
                `;
            <?php endif; ?>
        });
    </script>
</body>
</html>
