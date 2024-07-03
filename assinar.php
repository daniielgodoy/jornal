<?php
session_start();

require ('includes/header.php');
require ('includes/mysqli.php');
?>

<body>
    <div id="body">
        <?php
        require ('includes/navbar.php');
        require ('includes/menu.php');
        ?>

        <div class="container">
            <div class="header">
                <h1>GP News Premium</h1>
                <p>Bem-vindo ao GP News Premium, onde a paixão pela Fórmula 1 está ao seu alcance!</p>
            </div>

            <div class="section">
                <h2>Sobre Nós</h2>
                <p>O GP News Premium é mais do que um simples jornal de automobilismo. Somos uma plataforma dedicada a
                    oferecer notícias precisas, análises profundas e conteúdos exclusivos sobre a Fórmula 1. Nossa
                    equipe de jornalistas experientes trabalha incansavelmente para garantir que você esteja sempre bem
                    informado
                    sobre todos os detalhes e bastidores da principal categoria do automobilismo mundial.</p>
            </div>

            <div class="section">
                <h2>Benefícios da Assinatura</h2>
                <ul>
                    <li>Notícias Exclusivas: Acesso a reportagens investigativas e conteúdos exclusivos sobre a Fórmula
                        1.</li>
                    <li>Análises e Opiniões: Artigos de opinião e análises detalhadas de especialistas renomados no
                        mundo do automobilismo.</li>
                    <li>Atualizações em Tempo Real: Receba notificações e atualizações em tempo real sobre as corridas,
                        classificações e treinos.</li>
                    <li>Arquivo Completo: Acesso ao nosso vasto arquivo de edições passadas e especiais sobre momentos
                        históricos da Fórmula 1.</li>
                    <li>Eventos e Webinars: Participação em eventos exclusivos e webinars com nossos jornalistas e
                        convidados especiais do mundo do automobilismo.</li>
                    <li>Experiência Sem Anúncios: Navegação livre de anúncios para uma leitura mais agradável e focada.
                    </li>
                </ul>
            </div>

            <div class="section">
                <h2>Plano de Assinatura</h2>
                <div class="plans">
                    <div class="plan">
                        <h3>Plano Mensal: R$ 29,90/mês</h3>
                        <p>Acesso ilimitado a todas as matérias e conteúdos exclusivos.</p>
                        <p>Participação em eventos mensais.</p>
                        <p>Atendimento prioritário ao assinante.</p>
                        <div id="paypal-button-container-P-63W33769AM2102809M2CEEFQ"></div>
                        <script
                            src="https://www.paypal.com/sdk/js?client-id=AYh9pZ74ZDDRa5kmq4YlFeU30xgr7JxXowaRCJCcOGMMZV8gNwQ2FUjLRdO4cPoGr6ib045m8tCdJmMt&vault=true&intent=subscription"
                            data-sdk-integration-source="button-factory"></script>
                        <script>
                            paypal.Buttons({
                                style: {
                                    shape: 'rect',
                                    color: 'gold',
                                    layout: 'vertical',
                                    label: 'subscribe'
                                },
                                createSubscription: function (data, actions) {
                                    return actions.subscription.create({
                                        /* Creates the subscription */
                                        plan_id: 'P-63W33769AM2102809M2CEEFQ'
                                    });
                                },
                                onApprove: function (data, actions) {
                                    alert(data.subscriptionID); // You can add optional success message for the subscriber here
                                    window.location('https://google.com')
                                }
                            }).render('#paypal-button-container-P-63W33769AM2102809M2CEEFQ'); // Renders the PayPal button
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <?php require ('includes/rodape.php'); ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var linhaDiv = document.getElementById('linha');
            <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == 'Ok'): ?>
                var nome = "<?php echo $_SESSION['nome']; ?>";
                var sobrenome = "<?php echo $_SESSION['sobrenome']; ?>";
                linhaDiv.innerHTML = `
                            <div>
                                <i class="fa-regular fa-circle-user fa-3x"></i>
                                <div id="acesso">${nome} ${sobrenome}</div>
                            </div>
                            <div id="perfil-logout">
                                <a href="includes/perfil.php">Perfil</a> |
                                <a href="includes/logout.php">Logout</a>
                            </div>
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
    </script>
</body>

</html>