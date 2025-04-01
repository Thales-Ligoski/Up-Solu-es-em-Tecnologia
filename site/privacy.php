<?php
// Carregar dados dinâmicos
$dataFile = 'admin/data/site_data.json';
$siteData = [];

if (file_exists($dataFile)) {
    $siteData = json_decode(file_get_contents($dataFile), true);
} else {
    // Valores padrão caso o arquivo não exista
    $siteData = [
        'contact' => [
            'address' => 'R. Francisco Derosso, 1615 - Sala 09<br>Xaxim, Curitiba - PR, 81710-000',
            'phone' => '(41) 98465-0960',
            'email' => 'upnotebook@gmail.com',
            'hours' => [
                'Segunda à Sexta: 8h às 17h',
                'Sábado e Domingo: Fechado'
            ]
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Política de Privacidade | UP Soluções em Tecnologia</title>
  <meta name="description" content="Política de Privacidade da UP Soluções em Tecnologia">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/animations.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="/image/logo.png">
</head>
<body>
    <!-- Header -->
    <header class="header scrolled" id="header">
        <div class="container">
            <div class="header-inner">
                <div class="logo">
                    <a href="index.php">
                        <img src="/image/logo.png" alt="UP Soluções Logo" width="50">
                        <span>UP Soluções</span>
                    </a>
                </div>
                <nav class="nav-menu">
                    <ul class="nav-list">
                        <li class="nav-item"><a href="index.php" class="nav-link">Início</a></li>
                    </ul>
                </nav>
                <div class="header-btns">
                    <a href="index.php#contato" class="btn btn-outline">Solicitar Orçamento</a>
                    <button class="theme-toggle" id="theme-toggle">
                        <i class="fas fa-moon"></i>
                        <i class="fas fa-sun"></i>
                    </button>
                    <button class="menu-toggle" id="menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu Mobile -->
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-container">
            <ul class="mobile-nav-list">
                <li class="mobile-nav-item"><a href="index.php" class="mobile-nav-link">Home</a></li>
                <li class="mobile-nav-item"><a href="index.php#servicos" class="mobile-nav-link">Serviços</a></li>
                <li class="mobile-nav-item"><a href="index.php#sobre" class="mobile-nav-link">Sobre</a></li>
                <li class="mobile-nav-item"><a href="index.php#contato" class="mobile-nav-link">Contato</a></li>
            </ul>
            <div class="mobile-contact-info">
                <h4>Contato Rápido</h4>
                <p><i class="fas fa-phone"></i> <?php echo $siteData['contact']['phone']; ?></p>
                <p><i class="fas fa-envelope"></i> <?php echo $siteData['contact']['email']; ?></p>
                
                <div class="social-media">
                    <a href="https://www.facebook.com/upinformaticacwb" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/up.solucoes_" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="https://wa.me/5541984650960" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Policy Content -->
    <section class="page-content section">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title">Política de <span class="highlight">Privacidade</span></h1>
                <p class="section-subtitle">Última atualização: 25 de março de 2025</p>
            </div>

            <div class="content-wrapper">
                <div class="content-block">
                    <h2>1. Introdução</h2>
                    <p>A UP Soluções em Tecnologia ("nós", "nosso" ou "empresa") está comprometida em proteger a privacidade e os dados pessoais dos usuários e clientes ("você") que acessam nosso site e utilizam nossos serviços. Esta Política de Privacidade descreve como coletamos, usamos, compartilhamos e protegemos suas informações pessoais.</p>
                    <p>Ao utilizar nossos serviços ou acessar nosso site, você concorda com as práticas descritas nesta Política de Privacidade. Recomendamos que você leia este documento na íntegra para entender nossas práticas em relação aos seus dados pessoais.</p>
                </div>

                <div class="content-block">
                    <h2>2. Informações que Coletamos</h2>
                    <p>Podemos coletar os seguintes tipos de informações:</p>
                    
                    <h3>2.1 Informações que você nos fornece:</h3>
                    <ul>
                        <li>Informações de contato (nome, endereço, e-mail, número de telefone)</li>
                        <li>Informações de perfil (empresa, cargo)</li>
                        <li>Conteúdo das comunicações que você envia para nós</li>
                        <li>Informações sobre os equipamentos que você nos envia para manutenção</li>
                    </ul>
                    
                    <h3>2.2 Informações coletadas automaticamente:</h3>
                    <ul>
                        <li>Dados de uso do site (páginas visitadas, tempo de permanência)</li>
                        <li>Informações do dispositivo (tipo de dispositivo, sistema operacional, navegador)</li>
                        <li>Endereço IP e localização geográfica aproximada</li>
                        <li>Cookies e tecnologias similares</li>
                    </ul>
                </div>

                <div class="content-block">
                    <h2>3. Como Utilizamos Suas Informações</h2>
                    <p>Utilizamos suas informações pessoais para os seguintes fins:</p>
                    <ul>
                        <li>Fornecer, manter e melhorar nossos serviços</li>
                        <li>Processar e completar transações</li>
                        <li>Enviar informações técnicas, atualizações e mensagens administrativas</li>
                        <li>Responder a suas solicitações, perguntas e comentários</li>
                        <li>Personalizar sua experiência em nosso site</li>
                        <li>Comunicar sobre promoções, eventos e novidades (caso você tenha optado por receber tais comunicações)</li>
                        <li>Proteger nossos direitos, propriedade ou segurança e os de nossos usuários</li>
                        <li>Cumprir obrigações legais e regulatórias</li>
                    </ul>
                </div>

                <div class="content-block">
                    <h2>4. Compartilhamento de Informações</h2>
                    <p>Podemos compartilhar suas informações pessoais nas seguintes circunstâncias:</p>
                    <ul>
                        <li>Com prestadores de serviços que nos auxiliam na operação do negócio</li>
                        <li>Com parceiros de negócios para fornecer serviços específicos solicitados por você</li>
                        <li>Quando exigido por lei ou em resposta a processos legais</li>
                        <li>Para proteger os direitos, propriedade ou segurança da nossa empresa, de nossos clientes ou do público</li>
                        <li>Em conexão com uma transação corporativa, como fusão, aquisição ou venda de ativos</li>
                    </ul>
                    <p>Não vendemos ou alugamos suas informações pessoais a terceiros para fins de marketing.</p>
                </div>

                <div class="content-block">
                    <h2>5. Segurança das Informações</h2>
                    <p>Implementamos medidas de segurança técnicas, administrativas e físicas para proteger suas informações pessoais contra acesso não autorizado, uso indevido ou divulgação. No entanto, nenhum método de transmissão pela Internet ou método de armazenamento eletrônico é 100% seguro. Portanto, não podemos garantir sua segurança absoluta.</p>
                </div>

                <div class="content-block">
                    <h2>6. Seus Direitos e Escolhas</h2>
                    <p>Você tem certos direitos em relação às suas informações pessoais, incluindo:</p>
                    <ul>
                        <li>Acessar, corrigir ou atualizar suas informações pessoais</li>
                        <li>Solicitar a exclusão de suas informações pessoais</li>
                        <li>Opor-se ao processamento de suas informações pessoais</li>
                        <li>Retirar seu consentimento a qualquer momento (quando o processamento for baseado no consentimento)</li>
                        <li>Solicitar a portabilidade de seus dados</li>
                    </ul>
                    <p>Para exercer esses direitos, entre em contato conosco através dos dados fornecidos na seção "Como Entrar em Contato Conosco".</p>
                </div>

                <div class="content-block">
                    <h2>7. Cookies e Tecnologias Similares</h2>
                    <p>Nosso site utiliza cookies e tecnologias similares para melhorar sua experiência, analisar o tráfego e personalizar o conteúdo. Você pode controlar o uso de cookies através das configurações do seu navegador. No entanto, desabilitar cookies pode afetar a funcionalidade do site.</p>
                </div>

                <div class="content-block">
                    <h2>8. Retenção de Dados</h2>
                    <p>Mantemos suas informações pessoais pelo tempo necessário para cumprir os propósitos descritos nesta Política de Privacidade, a menos que um período de retenção mais longo seja exigido ou permitido por lei.</p>
                </div>

                <div class="content-block">
                    <h2>9. Menores de Idade</h2>
                    <p>Nossos serviços não são direcionados a menores de 18 anos. Não coletamos intencionalmente informações pessoais de menores de 18 anos. Se tomarmos conhecimento de que coletamos informações pessoais de um menor de 18 anos, tomaremos medidas para excluir essas informações o mais rápido possível.</p>
                </div>

                <div class="content-block">
                    <h2>10. Alterações nesta Política</h2>
                    <p>Podemos atualizar esta Política de Privacidade periodicamente para refletir mudanças em nossas práticas de informação. Se fizermos alterações materiais, notificaremos você através de um aviso em nosso site ou por outros meios, conforme apropriado. Recomendamos que você revise esta política periodicamente para se manter informado sobre como estamos protegendo suas informações.</p>
                </div>

                <div class="content-block">
                    <h2>11. Como Entrar em Contato Conosco</h2>
                    <p>Se você tiver dúvidas, preocupações ou solicitações relacionadas a esta Política de Privacidade ou ao processamento de suas informações pessoais, entre em contato conosco:</p>
                    <p>
                        <strong>UP Soluções em Tecnologia</strong><br>
                        <?php echo $siteData['contact']['address']; ?><br>
                        Email: <?php echo $siteData['contact']['email']; ?><br>
                        Telefone: <?php echo $siteData['contact']['phone']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col company-info">
                    <div class="footer-logo">
                        <img src="/image/logo.png" alt="UP Soluções Logo" width="40">
                        <span>UP Soluções</span>
                    </div>
                    <p>Fornecendo soluções tecnológicas de qualidade para empresas que buscam inovação e eficiência.</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/upinformaticacwb" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/up.solucoes_" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h4>Serviços</h4>
                    <ul class="footer-links">
                        <li><a href="index.php#servicos">Manutenção de Computadores</a></li>
                        <li><a href="index.php#servicos">Servidores</a></li>
                        <li><a href="index.php#servicos">Instalação de Starlink</a></li>
                        <li><a href="index.php#servicos">Instalação de CFTV</a></li>
                        <li><a href="index.php#servicos">Consultoria em TI</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Links Úteis</h4>
                    <ul class="footer-links">
                        <li><a href="index.php#sobre">Sobre Nós</a></li>
                        <li><a href="privacy.php">Política de Privacidade</a></li>
                        <li><a href="terms.php">Termos de Serviço</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Contato</h4>
                    <ul class="footer-contact">
                        <li><i class="fas fa-map-marker-alt"></i> <?php echo $siteData['contact']['address']; ?></li>
                        <li><i class="fas fa-phone-alt"></i> <?php echo $siteData['contact']['phone']; ?></li>
                        <li><i class="fas fa-envelope"></i> <?php echo $siteData['contact']['email']; ?></li>
                        <li><i class="fas fa-clock"></i> <?php echo $siteData['contact']['hours'][0]; ?></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="copyright">
                    <p>&copy; <?php echo date('Y'); ?> UP Soluções em Tecnologia. Todos os direitos reservados.</p>
                </div>
                <div class="footer-bottom-links">
                    <a href="privacy.php">Privacidade</a>
                    <a href="terms.php">Termos</a>
                    <a href="index.php#contato">Contato</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <a href="https://wa.me/5541984650960" class="whatsapp-button" target="_blank" aria-label="Contato WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span class="whatsapp-tooltip">Fale conosco pelo WhatsApp</span>
    </a>

    <!-- Scroll to Top Button -->
    <button class="scroll-top-btn visible" id="scrollTopBtn" aria-label="Voltar ao topo">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    <script src="js/script.js"></script>
</body>
</html>

