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
</body>
</html>
