<?php
require ('includes/header.php');
require ('includes/mysqli.php');
?>

<body>
    <div id="body">
        <?php
        require ('includes/navbar.php');
        ?>
        <?php
        require ('includes/carousel.php');
        ?>
        <?php
        require ('includes/rodape.php');
        ?>
        <?php
        require ('includes/menu.php');
        ?>
        <div id="noticias">
            <div id="conteudo">
            <?php
            require ('includes/conteudo.php');
            ?>
            </div>
        </div>
    </div>
</body>

</html>