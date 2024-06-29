<div id="navbar">
    <div id="menu">
        <div id="barras"><i class="fas fa-bars fa-2x" onclick="toggleMenu()"></i></div>

    </div>
    <div id="logo">
        <img id="logo" src="images/logo-png.png" alt="logo">
    </div>
    <?php
    require ('includes/teams.php');
    ?>
    <div class="navbar-itens">
        <nav id="pesquisa">
            <input name="campo_pesquisa" type="text" class="form-control" id="exampleInputName1"
                aria-describedby="emailHelp">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </nav>
    </div>
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById('menuzin');
        menu.classList.toggle('hidden');
        menu.classList.toggle('visible');
    }
   



    function entershield() {
        let triangulo = document.querySelector("nav#triangle");
        triangulo.style.display = "block";

        let shield = document.querySelector("div#teamshield");
        shield.style.display = "block";
    }
    function leaveshield() {
        let triangulo = document.querySelector("nav#triangle");
        triangulo.style.display = "none";

        let shield = document.querySelector("div#teamshield");
        shield.style.display = "none";
    }
</script>