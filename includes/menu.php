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
    <?php if (!isset($_SESSION['logado']) || (isset($_SESSION['assinante']) && $_SESSION['assinante'] != 1)): ?>
    <div id="botao">
        <button id="subscribe-button">
            <div id="assinar">
                <i class="fa-solid fa-crown"></i>
                Assine Já
            </div>
        </button>
    </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
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

    document.getElementById('subscribe-button')?.addEventListener('click', function() {
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok'): ?>
            window.location.href = 'assinar.php';
        <?php else: ?>
            window.location.href = 'login/index.php';
        <?php endif; ?>
    });
</script>
