<div id="navbar">
    <div id="menu">
        <div id="barras"><i class="fas fa-bars fa-2x" onclick="toggleMenu()"></i></div>
    </div>
    <div id="logo">
        <img id="logo" src="images/logo-png.png" alt="logo" onclick="logoindex()">
    </div>
    <div class="navbar-itens">
    <nav id="pesquisa">
            <form action="index.php" method="GET">
                <input name="campo_pesquisa" type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </nav>

    </div>
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('menuzin');
        menu.classList.toggle('hidden');
        menu.classList.toggle('visible');
    }

    function logoindex() {
        window.location.href = 'index.php'; 

        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok' && $_SESSION['nivel'] !== 'User'): ?>
            window.location.href = 'admin.php';
        <?php endif; ?>
    }
</script>
