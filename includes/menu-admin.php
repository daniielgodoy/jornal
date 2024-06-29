<div id="overlay" class="hidden"></div>
<div id="menuzin" class="hidden">
    <ul>
        <div id="linha"> <a href="login/index.php"> <i class="fa-regular fa-circle-user fa-3x"></i>
                <div id="acesso">
                    Acesse sua Conta
                </div>
                <div id="gratis">
                    ou crie uma grátis
                </div>
            </a>
        </div>
        <div class="blocos">
            <div id="bloquinho">
                <li><a href="#link2">F1</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">F2</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">Fórmula E</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">Fórmula Indy</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">Fórmula Truck</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">MotoGP</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">Nascar</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">Ralis</a></li>
            </div>
            <div id="bloquinho">
                <li><a href="#link3">Stock Car</a></li>
            </div>
        </div>
    </ul>
    <div class="container">
        <button id="openModalBtn" class="btn" onclick="insert()">Inserir Notícia</button>
    </div>
</div>
<button id="menu-toggle">Abrir Menu</button>
<script>
    function insert() {
        let cadastro = document.querySelector("div#cadastro");
        cadastro.style.display = "block"

        let body = document.querySelector("div#body");
        body.style.opacity = "0.4"
        body.classList.add("no-scroll");
    }
</script>