<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login/index.php');
    exit;
}
?>
<body>
    <h1>Perfil de <?php echo $_SESSION['nome'] . ' ' . $_SESSION['sobrenome']; ?></h1>
</body>
</html>
