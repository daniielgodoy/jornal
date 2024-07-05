<div id="overlay"></div>
<div id="menuzin" class="hidden">
    <ul>
        <div id="linha">
            <a href="login/index.php">
                <i class="fa-regular fa-circle-user fa-3x"></i>
                <div id="acesso">Acesse sua Conta</div>
                <div id="gratis">ou crie uma grátis</div>
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
    <div class="botoescontainer">
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok' && $_SESSION['nivel'] == 'Admin'): ?>
            <button id="manageEmployeesBtn" class="btn" onclick="manageEmployees()"> <i class="fa-solid fa-user-pen"></i> Funcionários</button>
        <?php endif; ?>
        <button id="openModalBtn" class="btn" onclick="insert()"> <i class="fa-solid fa-newspaper"></i> Notícias</button>
        <button id="editNewsBtn" class="btn" onclick="editNews()"> <i class="fa-solid fa-newspaper"></i> Editar Notícias</button>
    </div>
</div>
<script>document.addEventListener('DOMContentLoaded', function () {
    var linhaDiv = document.getElementById('linha');
    <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok'): ?>
        var nome = "<?php echo $_SESSION['nome']; ?>";
        var sobrenome = "<?php echo $_SESSION['sobrenome']; ?>";
        var nivel = "<?php echo $_SESSION['nivel']; ?>";
        var assinante = <?php echo json_encode((int) $_SESSION['assinante']); ?>;
        var status = (assinante === 1) ? 'Premium' : 'Comum';
        linhaDiv.innerHTML = `
                                <div id="userlogado">
                                    <i class="fa-regular fa-circle-user fa-3x" onclick="abrirperfil()"></i>
                                    <div id="acesso">${nome} ${sobrenome}
                                    <div id="infos">${nivel} (${status}) -
                                    <a href="includes/logout.php">Logout</a></div>
                                </div>
                                <div id="perfil-logout"></div>
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
    window.location.href = 'pageperfil.php';
}

document.getElementById('subscribe-button')?.addEventListener('click', function () {
    <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok'): ?>
        window.location.href = 'assinar.php';
    <?php else: ?>
        window.location.href = 'login/index.php';
    <?php endif; ?>
});

function insert() {
    let cadastro = document.querySelector("div#cadastro");
    cadastro.style.display = "block";

    let overlay = document.getElementById('overlay');
    overlay.style.display = "block";

    document.body.classList.add("no-scroll");

    let menuzin = document.querySelector("div#menuzin");
    menuzin.style.display = "none";
}

function editNews() {
    let editNewsModal = document.querySelector("div#editNewsModal");
    editNewsModal.style.display = "block";

    let overlay = document.getElementById('overlay');
    overlay.style.display = "block";

    document.body.classList.add("no-scroll");

    let menuzin = document.querySelector("div#menuzin");
    menuzin.style.display = "none";
}


var btn = document.getElementById("manageEmployeesBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
    var modal = document.getElementById("employeeModal");
    modal.style.display = "block";

    let overlay = document.getElementById('overlay');
    overlay.style.display = "block";

    document.body.classList.add("no-scroll");

    let menuzin = document.querySelector("div#menuzin");
    menuzin.style.display = "none";
}

span.onclick = function () {
    window.location.href = 'admin.php';
}
function closeEditNewsModal(){
    window.location.href = 'admin.php';
}
</script>