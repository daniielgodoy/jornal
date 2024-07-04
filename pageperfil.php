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
        require('includes/perfil.php');
        require('includes/rodape.php');

        ?>
    </div>
</body>
</html>
