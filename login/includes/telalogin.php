<?php
require ('header.php');
?>
<form action="includes/login.php" method="POST">
    <div id="telalogin">
        <div class="textos">
            <div id="titulo">
                <h2>Sign in</h2>
            </div>
            <div id="logos">
                <i class="fa-brands fa-facebook fa-2x"></i>
                <i class="fa-brands fa-google fa-2x"></i>
                <i class="fa-brands fa-linkedin fa-2x"></i>
            </div>
            <div id="useaccount">
                <p>or use your account</p>
            </div>
            <div id="email"><input type="email" name="campo_email" id="email" placeholder="Email"></div>
            <div id="password"><input type="password" name="campo_senha" id="password" placeholder="Password"></div>
            <div id="forgot">
                <a href="" onclick="forgotPassword(event)">Forgot your password?</a>
            </div>
            <div id="signin"><button type="submit">Sign In</button></div>
            <div id="novaconta"><button type="button" onclick="createaccount()">or create a new account.</button></div>
        </div>
    </div>
</form>

<script>
    function forgotPassword(event) {
        event.preventDefault();
    }

    function createaccount() {
        let signin = document.querySelector("div#telalogin");
        signin.style.display = "none";

        let cadastro = document.querySelector("div#telacadastro");
        cadastro.style.display = "flex";
    }
</script>