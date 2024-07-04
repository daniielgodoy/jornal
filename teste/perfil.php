<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header('Location: login/index.php');
    exit;
}


?>




<script>
    function enableEditing() {
        document.getElementById('nome').disabled = false;
        document.getElementById('sobrenome').disabled = false;
        document.getElementById('email').disabled = false;
        document.getElementById('senha').disabled = false;
        document.getElementById('confirma-senha').disabled = false;
        document.getElementById('salvar').style.display = 'block';
        document.getElementById('editar').style.display = 'none';
    }
</script>



<div class="container">
    <h1>Perfil de <?php echo $_SESSION['nome'] . ' ' . $_SESSION['sobrenome']; ?></h1>

    <form>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $_SESSION['nome'] ?>" disabled required>

        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $_SESSION['sobrenome'] ?>" disabled
            required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" disabled required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" value="<?php echo $_SESSION['senha'] ?>" disabled required>

        <label for="confirma-senha">Confirme a Senha:</label>
        <input type="password" id="confirma-senha" name="confirma-senha" value="<?php echo $_SESSION['senha'] ?>"
            disabled required>

        <button type="button" id="editar" onclick="enableEditing()">Editar</button>
        <button type="submit" id="salvar" style="display: none;">Salvar</button>
    </form>
</div>