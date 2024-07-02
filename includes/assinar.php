<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assinatura - F1 Informativo Premium</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: #ff1a1a;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .section {
            margin: 20px 0;
        }

        .section h2 {
            color: #ff1a1a;
        }

        .plans {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .plan {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 45%;
        }

        .plan h3 {
            margin-top: 0;
        }

        .testimonials {
            margin-top: 20px;
        }

        .testimonials p {
            font-style: italic;
        }

        .cta-button {
            background: #ff1a1a;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }

        .footer {
            background: #f8f8f8;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
        }

        .footer a {
            color: #ff1a1a;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>GP News Premium</h1>
            <p>Bem-vindo ao GP News Premium, onde a paixão pela Fórmula 1 está ao seu alcance!</p>
        </div>

        <div class="section">
            <h2>Sobre Nós</h2>
            <p>O GP News Premium é mais do que um simples jornal de automobilismo. Somos uma plataforma dedicada a
                oferecer notícias precisas, análises profundas e conteúdos exclusivos sobre a Fórmula 1. Nossa equipe de
                jornalistas experientes trabalha incansavelmente para garantir que você esteja sempre bem informado
                sobre todos os detalhes e bastidores da principal categoria do automobilismo mundial.</p>
        </div>

        <div class="section">
            <h2>Benefícios da Assinatura</h2>
            <ul>
                <li>Notícias Exclusivas: Acesso a reportagens investigativas e conteúdos exclusivos sobre a Fórmula 1.
                </li>
                <li>Análises e Opiniões: Artigos de opinião e análises detalhadas de especialistas renomados no mundo do
                    automobilismo.</li>
                <li>Atualizações em Tempo Real: Receba notificações e atualizações em tempo real sobre as corridas,
                    classificações e treinos.</li>
                <li>Arquivo Completo: Acesso ao nosso vasto arquivo de edições passadas e especiais sobre momentos
                    históricos da Fórmula 1.</li>
                <li>Eventos e Webinars: Participação em eventos exclusivos e webinars com nossos jornalistas e
                    convidados especiais do mundo do automobilismo.</li>
                <li>Experiência Sem Anúncios: Navegação livre de anúncios para uma leitura mais agradável e focada.</li>
            </ul>
        </div>

        <div class="section">
            <h2>Planos de Assinatura</h2>
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
                            }
                        }).render('#paypal-button-container-P-63W33769AM2102809M2CEEFQ'); // Renders the PayPal button
                    </script>
                </div>
                <div class="plan">
                    <h3>Plano Anual: R$ 299,00/ano (Economize 2 meses)</h3>
                    <p>Todos os benefícios do plano mensal.</p>
                    <p>Participação em eventos trimestrais exclusivos.</p>
                    <p>Edição especial impressa anual.</p>
                    
                </div>
            </div>
        </div>


        <div class="section">

        </div>

        <div class="footer">
            <div class="section">
                <h2>Contato</h2>
                <p>Email: atendimento@GPNewsPremium.com.br</p>
                <p>Telefone: (12) 4002-8922</p>
                <p>Endereço: Rua De baixo, 123, São Paulo, SP, 01234-567</p>
            </div>
            <div class="section">
                <p><a href="#">Termos e Condições</a> | <a href="../privacidade.php">Política de Privacidade</a></p>
            </div>

            <p>© 2024 GP News Premium. Todos os direitos reservados.</p>
        </div>
    </div>
</body>

</html>