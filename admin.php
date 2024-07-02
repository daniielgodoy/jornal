<?php
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
        ?>
        <?php
        require ('includes/carousel.php');
        ?>

        <?php
        require ('includes/menu-admin.php');
        ?>
        <div id="noticias">
            <div id="conteudo">
                <?php
                require ('includes/conteudo.php');
                ?>
            </div>
        </div>
        <?php
        require ('includes/rodape.php');
        ?>
    </div>

</body>

</html>