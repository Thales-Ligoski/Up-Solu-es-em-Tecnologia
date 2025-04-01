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
  <title>Termos de Serviço | UP Soluções em Tecnologia</title>
  <meta name="description" content="Termos de Serviço da UP Soluções em Tecnologia">
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

    <!-- Terms of Service Content -->
    <section class="page-content section">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title">Termos de <span class="highlight">Serviço</span></h1>
                <p class="section-subtitle">Última atualização: 25 de março de 2025</p>
            </div>

            <div class="content-wrapper">
                <div class="content-block">
                    <h2>1. Aceitação dos Termos</h2>
                    <p>Ao acessar ou utilizar os serviços da UP Soluções em Tecnologia ("nós", "nosso" ou "empresa"), você concorda em cumprir e estar vinculado a estes Termos de Serviço. Se você não concordar com qualquer parte destes termos, não poderá acessar ou utilizar nossos serviços.</p>
                    <p>Estes Termos de Serviço, juntamente com nossa Política de Privacidade, constituem um acordo legal entre você e a UP Soluções em Tecnologia.</p>
                </div>

                <div class="content-block">
                    <h2>2. Descrição dos Serviços</h2>
                    <p>A UP Soluções em Tecnologia oferece serviços de manutenção de computadores, servidores, consultoria em TI, instalação de Starlink e instalação de CFTV, entre outros serviços relacionados à tecnologia da informação.</p>
                    <p>Reservamo-nos o direito de modificar, suspender ou descontinuar qualquer aspecto do serviço a qualquer momento, incluindo a disponibilidade de recursos, bancos de dados ou conteúdo.</p>
                </div>

                <div class="content-block">
                    <h2>3. Elegibilidade</h2>
                    <p>Nossos serviços estão disponíveis apenas para indivíduos com pelo menos 18 anos de idade ou que possuam capacidade legal para celebrar contratos vinculativos. Se você não atender a esses requisitos, não deve utilizar nossos serviços.</p>
                </div>

                <div class="content-block">
                    <h2>4. Orçamentos e Pagamentos</h2>
                    <h3>4.1 Orçamentos</h3>
                    <p>Todos os orçamentos fornecidos pela UP Soluções em Tecnologia têm validade de 15 dias, salvo indicação em contrário. Os orçamentos são baseados nas informações fornecidas pelo cliente e podem estar sujeitos a alterações caso sejam identificados problemas adicionais durante a execução do serviço.</p>
                    
                    <h3>4.2 Pagamentos</h3>
                    <p>Os pagamentos devem ser realizados conforme acordado no momento da contratação do serviço. Aceitamos diversas formas de pagamento, incluindo dinheiro, cartão de crédito/débito, transferência bancária e PIX.</p>
                    <p>Em caso de atraso no pagamento, reservamo-nos o direito de suspender a prestação dos serviços até a regularização do pagamento, bem como aplicar juros e multas conforme previsto em lei.</p>
                </div>

                <div class="content-block">
                    <h2>5. Execução dos Serviços</h2>
                    <h3>5.1 Prazos</h3>
                    <p>Os prazos para execução dos serviços serão informados no momento da contratação e podem variar de acordo com a complexidade do serviço e a disponibilidade de peças e componentes. Faremos o possível para cumprir os prazos estabelecidos, mas não nos responsabilizamos por atrasos causados por fatores fora de nosso controle.</p>
                    
                    <h3>5.2 Garantia</h3>
                    <p>Oferecemos garantia de 90 dias para os serviços prestados, contados a partir da data de entrega do equipamento ou conclusão do serviço. A garantia cobre apenas os serviços realizados e não se aplica a problemas decorrentes de:</p>
                    <ul>
                        <li>Uso inadequado do equipamento</li>
                        <li>Modificações realizadas por terceiros</li>
                        <li>Danos causados por quedas, líquidos ou outros acidentes</li>
                        <li>Desgaste natural dos componentes</li>
                        <li>Problemas não relacionados ao serviço prestado</li>
                    </ul>
                    
                    <h3>5.3 Peças e Componentes</h3>
                    <p>As peças e componentes utilizados em nossos serviços podem ser novos ou recondicionados, conforme acordado com o cliente. A garantia das peças segue a política do fabricante.</p>
                </div>

                <div class="content-block">
                    <h2>6. Responsabilidades do Cliente</h2>
                    <p>Ao contratar nossos serviços, o cliente se compromete a:</p>
                    <ul>
                        <li>Fornecer informações precisas e completas sobre o problema a ser solucionado</li>
                        <li>Realizar backup de seus dados antes da entrega do equipamento, quando aplicável</li>
                        <li>Disponibilizar acesso aos locais e equipamentos necessários para a execução do serviço</li>
                        <li>Seguir as orientações e recomendações técnicas fornecidas pela nossa equipe</li>
                        <li>Efetuar o pagamento conforme acordado</li>
                        <li>Retirar o equipamento no prazo combinado após a conclusão do serviço</li>
                    </ul>
                </div>

                <div class="content-block">
                    <h2>7. Limitação de Responsabilidade</h2>
                    <p>A UP Soluções em Tecnologia não se responsabiliza por:</p>
                    <ul>
                        <li>Perda de dados durante a execução dos serviços</li>
                        <li>Danos indiretos, incidentais ou consequenciais</li>
                        <li>Lucros cessantes ou perda de negócios</li>
                        <li>Problemas decorrentes de força maior ou caso fortuito</li>
                        <li>Equipamentos não retirados no prazo de 90 dias após a conclusão do serviço</li>
                    </ul>
                    <p>Nossa responsabilidade máxima será limitada ao valor pago pelo serviço contratado.</p>
                </div>

                <div class="content-block">
                    <h2>8. Confidencialidade e Proteção de Dados</h2>
                    <p>Comprometemo-nos a manter a confidencialidade de todas as informações e dados do cliente a que tivermos acesso durante a prestação dos serviços. O tratamento de dados pessoais será realizado em conformidade com nossa Política de Privacidade e com a legislação aplicável.</p>
                </div>

                <div class="content-block">
                    <h2>9. Cancelamento e Reembolso</h2>
                    <p>O cancelamento de serviços já iniciados está sujeito à cobrança proporcional ao trabalho realizado até o momento do cancelamento, além de eventuais custos com peças e componentes já adquiridos.</p>
                    <p>Reembolsos serão concedidos apenas em casos de impossibilidade técnica de execução do serviço contratado, identificada pela nossa equipe.</p>
                </div>

                <div class="content-block">
                    <h2>10. Propriedade Intelectual</h2>
                    <p>Todos os direitos de propriedade intelectual relacionados aos nossos serviços, incluindo software, metodologias, processos e documentação, são de propriedade exclusiva da UP Soluções em Tecnologia ou de seus licenciadores.</p>
                    <p>O cliente não adquire qualquer direito de propriedade intelectual sobre os materiais e soluções desenvolvidos pela UP Soluções em Tecnologia, exceto quando expressamente acordado por escrito.</p>
                </div>

                <div class="content-block">
                    <h2>11. Alterações nos Termos de Serviço</h2>
                    <p>Reservamo-nos o direito de modificar estes Termos de Serviço a qualquer momento. As alterações entrarão em vigor imediatamente após sua publicação em nosso site. É responsabilidade do cliente revisar periodicamente estes termos para se manter informado sobre eventuais mudanças.</p>
                </div>

                <div class="content-block">
                    <h2>12. Lei Aplicável e Foro</h2>
                    <p>Estes Termos de Serviço são regidos pelas leis da República Federativa do Brasil. Qualquer disputa decorrente ou relacionada a estes termos será submetida à jurisdição exclusiva do foro da Comarca de Curitiba, Estado do Paraná, com renúncia expressa a qualquer outro, por mais privilegiado que seja.</p>
                </div>

                <div class="content-block">
                    <h2>13. Disposições Gerais</h2>
                    <p>Se qualquer disposição destes Termos de Serviço for considerada inválida ou inexequível, as demais disposições permanecerão em pleno vigor e efeito.</p>
                    <p>A falha da UP Soluções em Tecnologia em fazer valer qualquer direito ou disposição destes Termos de Serviço não constituirá renúncia a tal direito ou disposição.</p>
                    <p>Estes Termos de Serviço constituem o acordo integral entre você e a UP Soluções em Tecnologia em relação aos serviços prestados.</p>
                </div>

                <div class="content-block">
                    <h2>14. Contato</h2>
                    <p>Se você tiver dúvidas sobre estes Termos de Serviço, entre em contato conosco:</p>
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

