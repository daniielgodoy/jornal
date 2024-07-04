<?php
session_start();
require ('includes/header.php');
require ('includes/mysqli.php');
?>

<body>
    <?php
        require ('includes/modals.php');
    ?>
    <div id="body">
        <?php
        require ('includes/navbar.php');
        require ('includes/carousel.php');
        require ('includes/menu-admin.php');
        ?>

        <div id="noticias">
            <div id="conteudo">
                <?php require ('includes/conteudo.php'); ?>
            </div>
        </div>

        <?php require ('includes/rodape.php'); ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var linhaDiv = document.getElementById('linha');
            <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok'): ?>
                var nome = "<?php echo $_SESSION['nome']; ?>";
                var sobrenome = "<?php echo $_SESSION['sobrenome']; ?>";
                var nivel = "<?php echo $_SESSION['nivel']; ?>";
                var assinante = <?php echo json_encode((int) $_SESSION['assinante']); ?>; 
                var status = (assinante === 1) ? 'Premium' : 'Comum';
                linhaDiv.innerHTML = `
                            <div id="userlogado">
                                <i class="fa-regular fa-circle-user fa-3x"onclick="abrirperfil()"></i>
                                <div id="acesso">${nome} ${sobrenome}
                                <div id="infos">${nivel} (${status}) -
                                <a href="includes/logout.php">Logout</a></div>

                            </div>
                            <div id="perfil-logout">
                                
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
        function abrirperfil() {
        window.location.href = 'includes/perfil.php'
    }
    </script>
</body>

</html>