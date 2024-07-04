<?php
session_start();

if (!isset($_SESSION['assinante']) || $_SESSION['assinante'] == 0) {
    echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('assinanteModal');
            modal.style.display = 'block';
            document.body.classList.add('no-scroll');
        });
    </script>";
}
?>
<div id="assinanteModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Acesso Restrito</h2>
        <p>Este conteúdo é exclusivo para assinantes.</p>
        <div class="modal-footer">
            <button id="subscribe-button" class="btn-primary">
                <div id="assinar">
                    <i class="fa-solid fa-crown"></i>
                    Assine Já
                </div>
            </button>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        window.location.href = 'index.php';
    }

    document.getElementById('subscribe-button').addEventListener('click', function() {
        <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok'): ?>
            window.location.href = 'assinar.php';
        <?php else: ?>
            window.location.href = 'login/index.php';
        <?php endif; ?>
    });
</script>

</body>
</html>
