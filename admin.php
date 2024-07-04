<?php
session_start();
require ('includes/header.php');
require ('includes/mysqli.php');
require ('includes/valida.php');
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
</body>

</html>