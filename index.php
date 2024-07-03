<?php
session_start();
require('includes/header.php');
require('includes/mysqli.php');
?>

<body>
    <div id="body">
        <?php
        require('includes/navbar.php');
        require('includes/carousel.php');
        require('includes/menu.php');
        ?>

        <div id="noticias">
            <div id="conteudo">
                <?php require('includes/conteudo.php'); ?>
            </div>
        </div>

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
