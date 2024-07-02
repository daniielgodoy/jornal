<form action="includes/cadastro.php" method="POST">
    <div id="telacadastro">
        <div class="textos">
            <div id="titulo">
                <h2>Sign Up</h2>
            </div>
            <div id="logos">
                <i class="fa-brands fa-facebook fa-2x"></i>
                <i class="fa-brands fa-google fa-2x"></i>
                <i class="fa-brands fa-linkedin fa-2x"></i>
            </div>
            <div id="useaccount">
                <p>or use your email for registration</p>
            </div>
            <div id="nomes">
                <input type="text" name="nome" id="nome" placeholder="First Name" required>
                <input type="text" name="sobrenome" id="sobrenome" placeholder="Second Name" required>
            </div>
            <div id="email"><input type="email" name="email" id="email" placeholder="Email" required></div>
            <div id="password"><input type="password" name="password" id="password" placeholder="Password" required></div>
            <div id="signup"><button type="submit">Sign Up</button></div>
            <div id="enteraccount" onclick="enteraccount()"><button type="button">or enter in your account.</button></div>
        </div>
    </div>
</form>
<script>
    function enteraccount() {
        let signin = document.querySelector("div#telalogin");
        signin.style.display = "flex";

        let cadastro = document.querySelector("div#telacadastro");
        cadastro.style.display = "none";
    }
</script>
