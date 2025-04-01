<?php
session_start();

// Verificar se está logado
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

// Diretório para armazenar os dados
$dataDir = 'admin/data';
$dataFile = $dataDir . '/site_data.json';
$profileFile = $dataDir . '/profile.json';

// Criar diretório se não existir
if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

// Carregar dados do perfil
$profileData = [];
if (file_exists($profileFile)) {
    $profileData = json_decode(file_get_contents($profileFile), true);
} else {
    // Valores padrão para o perfil
    $profileData = [
        'name' => $_SESSION['admin_username'],
        'role' => 'Administrador',
        'avatar' => '/image/default-avatar.png'
    ];
    
    // Salvar dados padrão
    file_put_contents($profileFile, json_encode($profileData, JSON_PRETTY_PRINT));
}

// Carregar dados existentes
$siteData = [];
if (file_exists($dataFile)) {
    $siteData = json_decode(file_get_contents($dataFile), true);
} else {
    // Valores padrão caso o arquivo não exista
    $siteData = [
        'stats' => [
            'services_executed' => 3750,
            'satisfied_clients' => 1450,
            'years_experience' => 10
        ],
        'services' => [
            'computers' => [
                'title' => 'Manutenção de Computadores',
                'description' => 'Nossa equipe especializada realiza manutenção preventiva e corretiva em computadores, notebooks e todo tipo de equipamento de informática. Resolvemos problemas de hardware e software, realizamos formatação, backup de dados, remoção de vírus e instalação de programas.',
                'image' => '/fotos/manupc2.jpeg',
                'features' => [
                    'Manutenção preventiva',
                    'Manutenção corretiva',
                    'Remoção de vírus e malwares',
                    'Formatação e instalação de sistemas',
                    'Upgrade de hardware',
                    'Recuperação de dados'
                ]
            ],
            'servers' => [
                'title' => 'Manutenção de Servidores',
                'description' => 'Oferecemos soluções completas para servidores, desde a instalação até a manutenção. Configuramos e gerenciamos servidores físicos e virtuais, garantindo alta disponibilidade, segurança e desempenho para sua empresa.',
                'image' => '/fotos/serv.jpeg',
                'features' => [
                    'Instalação e configuração',
                    'Virtualização',
                    'Backup e recuperação de desastres',
                    'Segurança e firewall',
                    'Monitoramento 24/7',
                    'Suporte emergencial'
                ]
            ],
            'starlink' => [
                'title' => 'Instalação de Starlink',
                'description' => 'Somos especialistas na instalação de internet Starlink, levando conexão de alta velocidade e baixa latência mesmo para locais remotos. Realizamos todo o processo de configuração, montagem e otimização do sistema.',
                'image' => '/fotos/starlink.jpg',
                'features' => [
                    'Análise do melhor local de instalação',
                    'Montagem do equipamento',
                    'Configuração da rede',
                    'Testes de velocidade e latência',
                    'Suporte pós-instalação',
                    'Manutenção preventiva'
                ]
            ],
            'cftv' => [
                'title' => 'Instalação de CFTV',
                'description' => 'Projeto e instalação de sistemas de Circuito Fechado de Televisão (CFTV) para segurança residencial e empresarial. Trabalhos com equipamentos de última geração que garantem monitoramento eficiente e confiável.',
                'image' => '/fotos/cftv.jpg',
                'features' => [
                    'Projeto personalizado',
                    'Instalação profissional',
                    'Configuração de DVR/NVR',
                    'Acesso remoto via celular',
                    'Infraestrutura de rede',
                    'Manutenção periódica'
                ]
            ],
            'consulting' => [
                'title' => 'Consultoria em TI',
                'description' => 'Oferecemos consultoria especializada para empresas que querem optimizar sua infraestrutura de TI. Elaboramos planos de transformação digital, segurança da informação e adequação tecnológica para sua empresa crescer com segurança.',
                'image' => '/fotos/grafico-Photoroom.png',
                'features' => [
                    'Análise da infraestrutura atual',
                    'Planejamento estratégico de TI',
                    'Implementação de soluções',
                    'Segurança da informação',
                    'Gestão de projetos de TI',
                    'Treinamento de equipes'
                ]
            ]
        ],
        'why_choose_us' => [
            [
                'title' => 'Equipe Especializada',
                'description' => 'Nossos técnicos são certificados e passam por treinamentos constantes para oferecer o melhor atendimento.',
                'icon' => 'fas fa-users-cog'
            ],
            [
                'title' => 'Equipamentos Modernos',
                'description' => 'Utilizamos ferramentas e equipamentos de última geração para diagnósticos precisos e reparos eficientes.',
                'icon' => 'fas fa-tools'
            ],
            [
                'title' => 'Agilidade',
                'description' => 'Atendimento rápido e resolutivo, minimizando o tempo de inatividade dos seus sistemas.',
                'icon' => 'fas fa-bolt'
            ],
            [
                'title' => 'Segurança',
                'description' => 'Seus dados estão seguros conosco. Seguimos rigorosos protocolos de segurança e confidencialidade.',
                'icon' => 'fas fa-shield-alt'
            ],
            [
                'title' => 'Compromisso',
                'description' => 'Cumprimos prazos e orçamentos, sem surpresas ou custos adicionais durante o serviço.',
                'icon' => 'fas fa-handshake'
            ],
            [
                'title' => 'Suporte Contínuo',
                'description' => 'Oferecemos suporte técnico mesmo após a conclusão dos serviços, garantindo sua satisfação.',
                'icon' => 'fas fa-headset'
            ]
        ],
        'about' => [
            'image' => '/fotos/sobreaup-Photoroom.png',
            'title' => 'Sobre a <span class="highlight">UP Soluções</span>',
            'subtitle' => 'Conheça nossa história e valores',
            'description' => [
                'A UP Soluções em Tecnologia nasceu da paixão por resolver problemas e da busca constante por excelência técnica. Fundada há 10 anos, nossa empresa se especializou em oferecer soluções tecnológicas completas para empresas de todos os portes.',
                'Com um time de profissionais altamente qualificados e comprometidos, conquistamos a confiança de nossos clientes através de serviços de qualidade, atendimento personalizado e respostas rápidas às necessidades do mercado.'
            ],
            'values' => [
                [
                    'title' => 'Missão',
                    'description' => 'Oferecer soluções tecnológicas inovadoras que impulsionem o crescimento dos nossos clientes.',
                    'icon' => 'fas fa-star'
                ],
                [
                    'title' => 'Visão',
                    'description' => 'Ser referência nacional em soluções tecnológicas, reconhecida pela excelência e inovação.',
                    'icon' => 'fas fa-eye'
                ],
                [
                    'title' => 'Valores',
                    'description' => 'Comprometimento, ética, excelência técnica, inovação e foco no cliente.',
                    'icon' => 'fas fa-heart'
                ]
            ]
        ],
        'process' => [
            [
                'number' => '01',
                'title' => 'Diagnóstico Inicial',
                'description' => 'Realizamos uma análise detalhada das suas necessidades para entender exatamente quais são os desafios a serem superados.',
                'icon' => 'fas fa-comments'
            ],
            [
                'number' => '02',
                'title' => 'Proposta Personalizada',
                'description' => 'Desenvolvemos um plano de ação sob medida, com orçamento transparente e cronograma definido para seu projeto.',
                'icon' => 'fas fa-file-contract'
            ],
            [
                'number' => '03',
                'title' => 'Implementação',
                'description' => 'Nossa equipe executa as soluções planejadas com precisão técnica e mínima interferência na sua operação diária.',
                'icon' => 'fas fa-cogs'
            ],
            [
                'number' => '04',
                'title' => 'Testes e Validação',
                'description' => 'Realizamos testes rigorosos para garantir que tudo funcione perfeitamente antes de finalizar o projeto.',
                'icon' => 'fas fa-clipboard-check'
            ],
            [
                'number' => '05',
                'title' => 'Treinamento',
                'description' => 'Capacitamos sua equipe para utilizar as novas soluções de forma eficiente, maximizando o investimento realizado.',
                'icon' => 'fas fa-graduation-cap'
            ],
            [
                'number' => '06',
                'title' => 'Suporte Contínuo',
                'description' => 'Mantemos um relacionamento de longo prazo, oferecendo suporte técnico e manutenção para garantir a continuidade dos serviços.',
                'icon' => 'fas fa-headset'
            ]
        ],
        'contact' => [
            'address' => 'R. Francisco Derosso, 1615 - Sala 09<br>Xaxim, Curitiba - PR, 81710-000',
            'phone' => '(41) 98465-0960',
            'email' => 'upnotebook@gmail.com',
            'hours' => [
                'Segunda à Sexta: 8h às 17h',
                'Sábado e Domingo: Fechado'
            ],
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600.7838296539244!2d-49.27013742374837!3d-25.50557623670282!2m3!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dcfb2a5f2ac06d%3A0x4e3c7c8d28f8241c!2sR.%20Francisco%20Derosso%2C%201615%20-%20Xaxim%2C%20Curitiba%20-%20PR%2C%2081710-000!5e0!3m2!1spt-BR!2sbr!4v1711466583518!5m2!1spt-BR!2sbr'
        ]
    ];
    
    // Salvar dados padrão
    file_put_contents($dataFile, json_encode($siteData, JSON_PRETTY_PRINT));
}

// Processar formulários de atualização
$message = '';
$messageType = 'success';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar qual formulário foi enviado
    if (isset($_POST['update_profile'])) {
        // Atualizar perfil
        $profileData['name'] = $_POST['profile_name'];
        $profileData['role'] = $_POST['profile_role'];
        
        // Processar upload de avatar
        if (isset($_FILES['profile_avatar']) && $_FILES['profile_avatar']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'admin/uploads/';
            
            // Criar diretório se não existir
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileName = 'avatar_' . time() . '_' . basename($_FILES['profile_avatar']['name']);
            $uploadFile = $uploadDir . $fileName;
            
            // Mover arquivo para o diretório de uploads
            if (move_uploaded_file($_FILES['profile_avatar']['tmp_name'], $uploadFile)) {
                $profileData['avatar'] = '/' . $uploadFile;
            }
        }
        
        // Salvar alterações
        file_put_contents($profileFile, json_encode($profileData, JSON_PRETTY_PRINT));
        
        $message = 'Perfil atualizado com sucesso!';
    }
    elseif (isset($_POST['update_stats'])) {
        // Atualizar estatísticas
        $siteData['stats']['services_executed'] = (int)$_POST['services_executed'];
        $siteData['stats']['satisfied_clients'] = (int)$_POST['satisfied_clients'];
        $siteData['stats']['years_experience'] = (int)$_POST['years_experience'];
        
        $message = 'Estatísticas atualizadas com sucesso!';
    } 
    elseif (isset($_POST['update_service'])) {
        // Atualizar serviço
        $serviceType = $_POST['service_type'];
        
        $siteData['services'][$serviceType]['title'] = $_POST['title'];
        $siteData['services'][$serviceType]['description'] = $_POST['description'];
        
        // Processar recursos (features)
        $features = [];
        foreach ($_POST['features'] as $feature) {
            if (!empty(trim($feature))) {
                $features[] = $feature;
            }
        }
        $siteData['services'][$serviceType]['features'] = $features;
        
        // Processar upload de imagem
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'fotos/';
            
            // Criar diretório se não existir
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileName = basename($_FILES['image']['name']);
            $uploadFile = $uploadDir . $fileName;
            
            // Mover arquivo para o diretório de uploads
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $siteData['services'][$serviceType]['image'] = '/' . $uploadDir . $fileName;
            }
        }
        
        $message = 'Serviço "' . $siteData['services'][$serviceType]['title'] . '" atualizado com sucesso!';
    }
    elseif (isset($_POST['update_why_choose_us'])) {
        // Atualizar "Por que escolher-nos"
        for ($i = 0; $i < count($_POST['why_title']); $i++) {
            if (!empty(trim($_POST['why_title'][$i]))) {
                $siteData['why_choose_us'][$i]['title'] = $_POST['why_title'][$i];
                $siteData['why_choose_us'][$i]['description'] = $_POST['why_description'][$i];
                $siteData['why_choose_us'][$i]['icon'] = $_POST['why_icon'][$i];
            }
        }
        
        $message = 'Seção "Por que escolher-nos" atualizada com sucesso!';
    }
    elseif (isset($_POST['update_about'])) {
        // Atualizar "Sobre nós"
        $siteData['about']['title'] = $_POST['about_title'];
        $siteData['about']['subtitle'] = $_POST['about_subtitle'];
        
        // Processar descrições
        $descriptions = [];
        foreach ($_POST['about_description'] as $desc) {
            if (!empty(trim($desc))) {
                $descriptions[] = $desc;
            }
        }
        $siteData['about']['description'] = $descriptions;
        
        // Processar valores
        for ($i = 0; $i < count($_POST['value_title']); $i++) {
            if (!empty(trim($_POST['value_title'][$i]))) {
                $siteData['about']['values'][$i]['title'] = $_POST['value_title'][$i];
                $siteData['about']['values'][$i]['description'] = $_POST['value_description'][$i];
                $siteData['about']['values'][$i]['icon'] = $_POST['value_icon'][$i];
            }
        }
        
        // Processar upload de imagem
        if (isset($_FILES['about_image']) && $_FILES['about_image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'fotos/';
            
            // Criar diretório se não existir
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $fileName = basename($_FILES['about_image']['name']);
            $uploadFile = $uploadDir . $fileName;
            
            // Mover arquivo para o diretório de uploads
            if (move_uploaded_file($_FILES['about_image']['tmp_name'], $uploadFile)) {
                $siteData['about']['image'] = '/' . $uploadDir . $fileName;
            }
        }
        
        $message = 'Seção "Sobre nós" atualizada com sucesso!';
    }
    elseif (isset($_POST['update_process'])) {
        // Atualizar "Nosso processo"
        for ($i = 0; $i < count($_POST['process_number']); $i++) {
            if (!empty(trim($_POST['process_title'][$i]))) {
                $siteData['process'][$i]['number'] = $_POST['process_number'][$i];
                $siteData['process'][$i]['title'] = $_POST['process_title'][$i];
                $siteData['process'][$i]['description'] = $_POST['process_description'][$i];
                $siteData['process'][$i]['icon'] = $_POST['process_icon'][$i];
            }
        }
        
        $message = 'Seção "Nosso processo" atualizada com sucesso!';
    }
    elseif (isset($_POST['update_contact'])) {
        // Atualizar "Contato"
        $siteData['contact']['address'] = $_POST['contact_address'];
        $siteData['contact']['phone'] = $_POST['contact_phone'];
        $siteData['contact']['email'] = $_POST['contact_email'];
        
        // Processar horários
        $hours = [];
        foreach ($_POST['contact_hours'] as $hour) {
            if (!empty(trim($hour))) {
                $hours[] = $hour;
            }
        }
        $siteData['contact']['hours'] = $hours;
        
        // Extrair e atualizar mapa
        if (!empty(trim($_POST['contact_address_map']))) {
            // Tenta extrair o iframe do Google Maps a partir do endereço
            $address = urlencode($_POST['contact_address_map']);
            $mapEmbed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600!2d-49.2701!3d-25.5055!2m3!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjXCsDMwJzE5LjciUyA0OcKwMTYnMTIuNSJX!5e0!3m2!1spt-BR!2sbr!4v1711466583518!5m2!1spt-BR!2sbr';
            
            // Se o usuário também forneceu um iframe, use-o em vez do gerado automaticamente
            if (!empty(trim($_POST['contact_map']))) {
                $mapEmbed = $_POST['contact_map'];
            }
            
            $siteData['contact']['map_embed'] = $mapEmbed;
        }
        
        $message = 'Informações de contato atualizadas com sucesso!';
    }
    
    // Salvar alterações
    file_put_contents($dataFile, json_encode($siteData, JSON_PRETTY_PRINT));
}

// Função para logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrativo | UP Soluções em Tecnologia</title>
    <meta name="description" content="Painel administrativo da UP Soluções em Tecnologia">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/image/logo.png">
    <style>
        :root {
            --sidebar-width: 250px;
            --primary-color: #152138;
            --highlight-color: #4d88ff;
            --accent-color: #3a6fd6;
            --text-light: #ffffff;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        
        /* Sidebar */
        .dashboard-sidebar {
            width: var(--sidebar-width);
            background-color: var(--primary-color);
            color: var(--text-light);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        /* Modificar o estilo do sidebar-header para centralizar a logo e adicionar o padrão de rede/constelação */
        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: linear-gradient(rgba(21, 33, 56, 0.95), rgba(21, 33, 56, 0.95)), 
                        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cg fill='none' stroke='%231a2a4a' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%234d88ff'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
            background-size: cover;
            position: relative;
            padding-top: 30px;
            padding-bottom: 30px;
        }
        
        .sidebar-header img {
            width: 70px;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        
        .sidebar-header h2 {
            color: var(--text-light);
            font-size: 18px;
            margin: 0;
            font-weight: 500;
        }
        
        .sidebar-user {
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--highlight-color);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-weight: 500;
            overflow: hidden;
        }
        
        .user-info {
            flex: 1;
        }
        
        .user-info h3 {
            font-size: 16px;
            margin: 0;
            color: var(--text-light);
        }
        
        .user-info p {
            font-size: 12px;
            margin: 0;
            color: rgba(255, 255, 255, 0.7);
        }
        
        .sidebar-nav {
            padding: 20px 0;
        }
        
        .nav-section {
            margin-bottom: 15px;
        }
        
        .nav-section-title {
            padding: 10px 20px;
            font-size: 12px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
            font-weight: 500;
        }
        
        .nav-items {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .nav-item {
            padding: 0;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
        }
        
        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .sidebar-footer {
            padding: 15px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: sticky;
            bottom: 0;
            background-color: var(--primary-color);
        }
        
        .logout-btn {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 10px;
            border-radius: 5px;
        }
        
        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
        }
        
        .logout-btn i {
            margin-right: 10px;
        }
        
        /* Main Content */
        .dashboard-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .dashboard-title {
            font-size: 24px;
            font-weight: 500;
            color: #333;
            margin: 0;
        }
        
        .dashboard-actions {
            display: flex;
            gap: 10px;
        }
        
        .dashboard-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .card-title {
            font-size: 18px;
            font-weight: 500;
            color: #333;
            margin: 0;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--highlight-color);
            box-shadow: 0 0 0 2px rgba(77, 136, 255, 0.3);
        }
        
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background-color: var(--highlight-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--accent-color);
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        
        .btn-success:hover {
            background-color: #218838;
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .service-tabs {
            display: flex;
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 20px;
            overflow-x: auto;
        }
        
        .service-tab {
            padding: 10px 15px;
            cursor: pointer;
            border: 1px solid transparent;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            margin-bottom: -1px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }
        
        .service-tab:hover {
            border-color: #e9ecef #e9ecef #dee2e6;
        }
        
        .service-tab.active {
            color: var(--highlight-color);
            background-color: white;
            border-color: #dee2e6 #dee2e6 white;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .feature-item input {
            flex: 1;
            margin-right: 10px;
        }
        
        .feature-item button {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .feature-item button:hover {
            background-color: #c82333;
        }
        
        .add-feature-btn {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .add-feature-btn:hover {
            background-color: #218838;
        }
        
        .add-feature-btn i {
            margin-right: 5px;
        }
        
        .preview-image {
            max-width: 200px;
            max-height: 150px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
        
        .icon-preview {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: #f8f9fa;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 20px;
        }
        
        .icon-selector {
            display: flex;
            align-items: center;
        }
        
        .icon-selector input {
            flex: 1;
        }
        
        .service-content-container {
            margin-top: 20px;
        }

        .service-form {
            display: none;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .service-form.active {
            display: block;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .form-row .form-group {
            padding: 0 10px;
            box-sizing: border-box;
        }

        .edit-profile-link {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            display: inline-block;
            margin-top: 5px;
            transition: all 0.3s ease;
        }

        .edit-profile-link:hover {
            color: var(--highlight-color);
        }

        .profile-avatar-preview {
            margin-bottom: 15px;
        }

        .map-preview {
            margin-top: 10px;
            margin-bottom: 20px;
        }
        
        /* Mobile Styles */
        .sidebar-toggle {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1000;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
            display: none;
        }
        
        @media (max-width: 768px) {
            .dashboard-sidebar {
                width: 0;
                transform: translateX(-100%);
            }
            
            .dashboard-sidebar.active {
                width: var(--sidebar-width);
                transform: translateX(0);
            }
            
            .dashboard-content {
                margin-left: 0;
                padding: 15px;
            }
            
            .sidebar-toggle {
                display: flex;
            }
            
            .form-row {
                flex-direction: column;
            }
            
            .form-row .form-group {
                flex: 0 0 100% !important;
                margin-left: 0 !important;
            }
            
            .service-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .dashboard-actions {
                margin-top: 10px;
                width: 100%;
            }
            
            .dashboard-actions .btn {
                flex: 1;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Toggle Button -->
    <button id="sidebar-toggle" class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Sidebar -->
    <aside class="dashboard-sidebar" id="dashboard-sidebar">
        <div class="sidebar-header">
            <img src="/image/logo.png" alt="UP Soluções Logo">
            <h2>Painel Administrativo</h2>
        </div>
        
        <div class="sidebar-user">
            <div class="user-avatar" style="background-image: url('<?php echo $profileData['avatar']; ?>'); background-size: cover; background-position: center;">
                <?php if (!isset($profileData['avatar']) || $profileData['avatar'] == '/image/default-avatar.png'): ?>
                <i class="fas fa-user"></i>
                <?php endif; ?>
            </div>
            <div class="user-info">
                <h3><?php echo $profileData['name']; ?></h3>
                <p><?php echo $profileData['role']; ?></p>
                <a href="#profile" class="edit-profile-link" data-tab="profile">
                    <i class="fas fa-edit"></i> Editar
                </a>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Conteúdo do Site</div>
                <ul class="nav-items">
                    <li class="nav-item">
                        <a href="#stats" class="nav-link active" data-tab="stats">
                            <i class="fas fa-chart-bar"></i> Estatísticas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="nav-link" data-tab="services">
                            <i class="fas fa-cogs"></i> Serviços
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#why-choose-us" class="nav-link" data-tab="why-choose-us">
                            <i class="fas fa-medal"></i> Por que Escolher-nos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link" data-tab="about">
                            <i class="fas fa-info-circle"></i> Sobre Nós
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#process" class="nav-link" data-tab="process">
                            <i class="fas fa-tasks"></i> Nosso Processo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link" data-tab="contact">
                            <i class="fas fa-envelope"></i> Contato
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="nav-section">
                <div class="nav-section-title">Sistema</div>
                <ul class="nav-items">
                    <li class="nav-item">
                        <a href="#profile" class="nav-link" data-tab="profile">
                            <i class="fas fa-user-circle"></i> Meu Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" target="_blank">
                            <i class="fas fa-external-link-alt"></i> Ver Site
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="sidebar-footer">
            <a href="dashboard.php?logout=1" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="dashboard-content">
        <?php if (!empty($message)): ?>
        <div class="alert alert-success">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>
        
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            <div class="dashboard-actions">
                <a href="index.php" class="btn btn-secondary" target="_blank">
                    <i class="fas fa-eye"></i> Visualizar Site
                </a>
            </div>
        </div>
        
        <!-- Estatísticas -->
        <div class="tab-content active" id="stats-content">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Estatísticas</h2>
                </div>
                <form method="post" action="dashboard.php">
                    <div class="form-group">
                        <label for="services_executed">Serviços Executados</label>
                        <input type="number" id="services_executed" name="services_executed" class="form-control" value="<?php echo $siteData['stats']['services_executed']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="satisfied_clients">Clientes Satisfeitos</label>
                        <input type="number" id="satisfied_clients" name="satisfied_clients" class="form-control" value="<?php echo $siteData['stats']['satisfied_clients']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="years_experience">Anos de Experiência</label>
                        <input type="number" id="years_experience" name="years_experience" class="form-control" value="<?php echo $siteData['stats']['years_experience']; ?>" required>
                    </div>
                    
                    <button type="submit" name="update_stats" class="btn btn-primary">Atualizar Estatísticas</button>
                </form>
            </div>
        </div>
        
        <!-- Perfil do Usuário -->
        <div class="tab-content" id="profile-content">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Meu Perfil</h2>
                </div>
                <form method="post" action="dashboard.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Avatar Atual</label>
                        <div class="profile-avatar-preview">
                            <img src="<?php echo $profileData['avatar']; ?>" alt="Avatar" class="preview-image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="profile_avatar">Novo Avatar (opcional)</label>
                        <input type="file" id="profile_avatar" name="profile_avatar" class="form-control" accept="image/*">
                    </div>
                    
                    <div class="form-group">
                        <label for="profile_name">Nome</label>
                        <input type="text" id="profile_name" name="profile_name" class="form-control" value="<?php echo $profileData['name']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="profile_role">Cargo</label>
                        <input type="text" id="profile_role" name="profile_role" class="form-control" value="<?php echo $profileData['role']; ?>" required>
                    </div>
                    
                    <button type="submit" name="update_profile" class="btn btn-primary">Atualizar Perfil</button>
                </form>
            </div>
        </div>
        
        <!-- Serviços -->
        <div class="tab-content" id="services-content">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Serviços</h2>
                </div>
                
                <div class="service-tabs">
                    <div class="service-tab active" data-service="computers">Manutenção de Computadores</div>
                    <div class="service-tab" data-service="servers">Servidores</div>
                    <div class="service-tab" data-service="starlink">Starlink</div>
                    <div class="service-tab" data-service="cftv">CFTV</div>
                    <div class="service-tab" data-service="consulting">Consultoria</div>
                </div>
                
                <div class="service-content-container">
                    <!-- Formulário para cada serviço -->
                    <?php
                    $serviceTypes = [
                        'computers' => 'Manutenção de Computadores',
                        'servers' => 'Servidores',
                        'starlink' => 'Starlink',
                        'cftv' => 'CFTV',
                        'consulting' => 'Consultoria'
                    ];
                    
                    foreach ($serviceTypes as $type => $label):
                    ?>
                    <div class="service-form <?php echo $type === 'computers' ? 'active' : ''; ?>" id="service-<?php echo $type; ?>">
                        <form method="post" action="dashboard.php" enctype="multipart/form-data">
                            <input type="hidden" name="service_type" value="<?php echo $type; ?>">
                            
                            <div class="form-group">
                                <label for="title_<?php echo $type; ?>">Título</label>
                                <input type="text" id="title_<?php echo $type; ?>" name="title" class="form-control" value="<?php echo $siteData['services'][$type]['title']; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="description_<?php echo $type; ?>">Descrição</label>
                                <textarea id="description_<?php echo $type; ?>" name="description" class="form-control" required><?php echo $siteData['services'][$type]['description']; ?></textarea>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group" style="flex: 0 0 30%;">
                                    <label>Imagem Atual</label>
                                    <div>
                                        <img src="<?php echo $siteData['services'][$type]['image']; ?>" alt="<?php echo $label; ?>" class="preview-image" style="max-width: 100%; max-height: 200px;">
                                    </div>
                                    
                                    <div class="form-group" style="margin-top: 10px;">
                                        <label for="image_<?php echo $type; ?>">Nova Imagem (opcional)</label>
                                        <input type="file" id="image_<?php echo $type; ?>" name="image" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                
                                <div class="form-group" style="flex: 0 0 65%; margin-left: 5%;">
                                    <label>Recursos</label>
                                    <div class="features-container" id="features-<?php echo $type; ?>">
                                        <?php foreach ($siteData['services'][$type]['features'] as $index => $feature): ?>
                                        <div class="feature-item">
                                            <input type="text" name="features[]" class="form-control" value="<?php echo $feature; ?>" required>
                                            <button type="button" class="remove-feature"><i class="fas fa-times"></i></button>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <button type="button" class="add-feature-btn" data-target="features-<?php echo $type; ?>">
                                        <i class="fas fa-plus"></i> Adicionar Recurso
                                    </button>
                                </div>
                            </div>
                            
                            <button type="submit" name="update_service" class="btn btn-primary">Atualizar Serviço</button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <!-- Por que Escolher-nos -->
        <div class="tab-content" id="why-choose-us-content">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Por que Escolher-nos</h2>
                </div>
                <form method="post" action="dashboard.php">
                    <?php foreach ($siteData['why_choose_us'] as $index => $feature): ?>
                    <div class="form-group">
                        <h3>Item <?php echo $index + 1; ?></h3>
                        <div class="form-group">
                            <label for="why_title_<?php echo $index; ?>">Título</label>
                            <input type="text" id="why_title_<?php echo $index; ?>" name="why_title[]" class="form-control" value="<?php echo $feature['title']; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="why_description_<?php echo $index; ?>">Descrição</label>
                            <textarea id="why_description_<?php echo $index; ?>" name="why_description[]" class="form-control" required><?php echo $feature['description']; ?></textarea>
                        </div>
                        
                        <!-- Substituir a seção de ícones em "Por que Escolher-nos" -->
                        <div class="form-group">
                            <label for="why_icon_<?php echo $index; ?>">Ícone</label>
                            <div class="icon-selector">
                                <div class="icon-preview">
                                    <i class="<?php echo $feature['icon']; ?>"></i>
                                </div>
                                <input type="hidden" id="why_icon_<?php echo $index; ?>" name="why_icon[]" value="<?php echo $feature['icon']; ?>">
                                <span class="form-text text-muted">Este ícone não pode ser editado.</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                    
                    <button type="submit" name="update_why_choose_us" class="btn btn-primary">Atualizar Seção</button>
                </form>
            </div>
        </div>
        
        <!-- Sobre Nós -->
        <div class="tab-content" id="about-content">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Sobre Nós</h2>
                </div>
                <form method="post" action="dashboard.php" enctype="multipart/form-data">
                    <!-- Corrigir o problema com o campo de título na seção "Sobre Nós" -->
                    <div class="form-group">
                        <label for="about_title">Título</label>
                        <div class="form-row">
                            <div class="form-group" style="flex: 0 0 48%;">
                                <label for="about_title_prefix">Prefixo</label>
                                <input type="text" id="about_title_prefix" name="about_title_prefix" class="form-control" value="Sobre a " required>
                            </div>
                            <div class="form-group" style="flex: 0 0 48%; margin-left: 4%;">
                                <label for="about_title_highlight">Texto Destacado</label>
                                <input type="text" id="about_title_highlight" name="about_title_highlight" class="form-control" value="UP Soluções" required>
                            </div>
                        </div>
                        <small class="form-text text-muted">O texto destacado será exibido em azul no site.</small>
                        <input type="hidden" id="about_title" name="about_title" value="<?php echo htmlspecialchars($siteData['about']['title']); ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="about_subtitle">Subtítulo</label>
                        <input type="text" id="about_subtitle" name="about_subtitle" class="form-control" value="<?php echo $siteData['about']['subtitle']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Imagem Atual</label>
                        <div>
                            <img src="<?php echo $siteData['about']['image']; ?>" alt="Sobre a UP Soluções" class="preview-image">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="about_image">Nova Imagem (opcional)</label>
                        <input type="file" id="about_image" name="about_image" class="form-control" accept="image/*">
                    </div>
                    
                    <div class="form-group">
                        <label>Descrição</label>
                        <?php foreach ($siteData['about']['description'] as $index => $paragraph): ?>
                        <div class="form-group">
                            <label for="about_description_<?php echo $index; ?>">Parágrafo <?php echo $index + 1; ?></label>
                            <textarea id="about_description_<?php echo $index; ?>" name="about_description[]" class="form-control" required><?php echo $paragraph; ?></textarea>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <h3>Valores</h3>
                    <?php foreach ($siteData['about']['values'] as $index => $value): ?>
                    <div class="form-group">
                        <h4>Valor <?php echo $index + 1; ?></h4>
                        <div class="form-group">
                            <label for="value_title_<?php echo $index; ?>">Título</label>
                            <input type="text" id="value_title_<?php echo $index; ?>" name="value_title[]" class="form-control" value="<?php echo $value['title']; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="value_description_<?php echo $index; ?>">Descrição</label>
                            <textarea id="value_description_<?php echo $index; ?>" name="value_description[]" class="form-control" required><?php echo $value['description']; ?></textarea>
                        </div>
                        
                        <!-- Substituir a seção de ícones em "Valores" -->
                        <div class="form-group">
                            <label for="value_icon_<?php echo $index; ?>">Ícone</label>
                            <div class="icon-selector">
                                <div class="icon-preview">
                                    <i class="<?php echo $value['icon']; ?>"></i>
                                </div>
                                <input type="hidden" id="value_icon_<?php echo $index; ?>" name="value_icon[]" value="<?php echo $value['icon']; ?>">
                                <span class="form-text text-muted">Este ícone não pode ser editado.</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                    
                    <button type="submit" name="update_about" class="btn btn-primary">Atualizar Seção</button>
                </form>
            </div>
        </div>
        
        <!-- Nosso Processo -->
        <div class="tab-content" id="process-content">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Nosso Processo</h2>
                </div>
                <form method="post" action="dashboard.php">
                    <?php foreach ($siteData['process'] as $index => $step): ?>
                    <div class="form-group">
                        <h3>Etapa <?php echo $index + 1; ?></h3>
                        <div class="form-group">
                            <label for="process_number_<?php echo $index; ?>">Número</label>
                            <input type="text" id="process_number_<?php echo $index; ?>" name="process_number[]" class="form-control" value="<?php echo $step['number']; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="process_title_<?php echo $index; ?>">Título</label>
                            <input type="text" id="process_title_<?php echo $index; ?>" name="process_title[]" class="form-control" value="<?php echo $step['title']; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="process_description_<?php echo $index; ?>">Descrição</label>
                            <textarea id="process_description_<?php echo $index; ?>" name="process_description[]" class="form-control" required><?php echo $step['description']; ?></textarea>
                        </div>
                        
                        <!-- Substituir a seção de ícones em "Nosso Processo" -->
                        <div class="form-group">
                            <label for="process_icon_<?php echo $index; ?>">Ícone</label>
                            <div class="icon-selector">
                                <div class="icon-preview">
                                    <i class="<?php echo $step['icon']; ?>"></i>
                                </div>
                                <input type="hidden" id="process_icon_<?php echo $index; ?>" name="process_icon[]" value="<?php echo $step['icon']; ?>">
                                <span class="form-text text-muted">Este ícone não pode ser editado.</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                    
                    <button type="submit" name="update_process" class="btn btn-primary">Atualizar Seção</button>
                </form>
            </div>
        </div>
        
        <!-- Contato -->
        <div class="tab-content" id="contact-content">
            <div class="dashboard-card">
                <div class="card-header">
                    <h2 class="card-title">Informações de Contato</h2>
                </div>
                <form method="post" action="dashboard.php">
                    <div class="form-group">
                        <label for="contact_address">Endereço (HTML)</label>
                        <textarea id="contact_address" name="contact_address" class="form-control" required onchange="document.getElementById('contact_address_map').value = this.value.replace(/<br>/g, ', ').replace(/(<([^>]+)>)/gi, '');"><?php echo $siteData['contact']['address']; ?></textarea>
                        <small class="form-text text-muted">Você pode usar HTML para quebras de linha, ex: Rua Exemplo, 123&lt;br&gt;Bairro, Cidade</small>
                    </div>

                    <div class="form-group">
                        <label for="contact_address_map">Endereço para o Mapa</label>
                        <input type="text" id="contact_address_map" name="contact_address_map" class="form-control" value="<?php echo strip_tags(str_replace('<br>', ', ', $siteData['contact']['address'])); ?>">
                        <small class="form-text text-muted">Este campo é preenchido automaticamente com base no endereço acima</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_phone">Telefone</label>
                        <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="<?php echo $siteData['contact']['phone']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_email">Email</label>
                        <input type="email" id="contact_email" name="contact_email" class="form-control" value="<?php echo $siteData['contact']['email']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Horário de Atendimento</label>
                        <?php foreach ($siteData['contact']['hours'] as $index => $hours): ?>
                        <div class="form-group">
                            <label for="contact_hours_<?php echo $index; ?>">Linha <?php echo $index + 1; ?></label>
                            <input type="text" id="contact_hours_<?php echo $index; ?>" name="contact_hours[]" class="form-control" value="<?php echo $hours; ?>" required>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_map">Código de Incorporação do Mapa (opcional)</label>
                        <textarea id="contact_map" name="contact_map" class="form-control" rows="4" placeholder="Cole aqui o código iframe do Google Maps (opcional)"><?php echo $siteData['contact']['map_embed']; ?></textarea>
                        <small class="form-text text-muted">Se você já tem o código iframe do Google Maps, cole-o aqui. Caso contrário, o sistema tentará gerar um mapa a partir do endereço acima.</small>
                    </div>
                    
                    <div class="form-group">
                        <label>Visualização do Mapa Atual</label>
                        <div class="map-preview" style="width: 100%; height: 300px; border: 1px solid #ddd; border-radius: 5px; overflow: hidden;">
                            <iframe src="<?php echo $siteData['contact']['map_embed']; ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    
                    <button type="submit" name="update_contact" class="btn btn-primary">Atualizar Informações de Contato</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Função para alternar a visibilidade da barra lateral no mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('dashboard-sidebar');
            sidebar.classList.toggle('active');
        }
        
        // Navegação entre abas
        document.addEventListener('DOMContentLoaded', function() {
            // Navegação principal
            const navLinks = document.querySelectorAll('.nav-link');
            const tabContents = document.querySelectorAll('.tab-content');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remover classe ativa de todos os links
                    navLinks.forEach(link => link.classList.remove('active'));
                    
                    // Adicionar classe ativa ao link clicado
                    this.classList.add('active');
                    
                    // Mostrar conteúdo da aba correspondente
                    const tabId = this.getAttribute('data-tab');
                    tabContents.forEach(tab => tab.classList.remove('active'));
                    document.getElementById(tabId + '-content').classList.add('active');
                    
                    // Fechar o menu no mobile após clicar em um item
                    if (window.innerWidth <= 768) {
                        document.getElementById('dashboard-sidebar').classList.remove('active');
                    }
                });
            });
            
            // Navegação entre serviços
            const serviceTabs = document.querySelectorAll('.service-tab');
            const serviceForms = document.querySelectorAll('.service-form');
            
            serviceTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remover classe ativa de todas as abas
                    serviceTabs.forEach(tab => tab.classList.remove('active'));
                    
                    // Adicionar classe ativa à aba clicada
                    this.classList.add('active');
                    
                    // Mostrar formulário correspondente
                    const serviceType = this.getAttribute('data-service');
                    serviceForms.forEach(form => form.classList.remove('active'));
                    document.getElementById('service-' + serviceType).classList.add('active');
                });
            });
            
            // Adicionar/remover recursos
            const addFeatureBtns = document.querySelectorAll('.add-feature-btn');
            
            addFeatureBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const container = document.getElementById(targetId);
                    
                    const featureItem = document.createElement('div');
                    featureItem.className = 'feature-item';
                    featureItem.innerHTML = `
                        <input type="text" name="features[]" class="form-control" required>
                        <button type="button" class="remove-feature"><i class="fas fa-times"></i></button>
                    `;
                    
                    container.appendChild(featureItem);
                    
                    // Adicionar evento para remover recurso
                    const removeBtn = featureItem.querySelector('.remove-feature');
                    removeBtn.addEventListener('click', function() {
                        container.removeChild(featureItem);
                    });
                });
            });
            
            // Adicionar evento para remover recurso aos botões existentes
            document.querySelectorAll('.remove-feature').forEach(btn => {
                btn.addEventListener('click', function() {
                    const featureItem = this.parentElement;
                    featureItem.parentElement.removeChild(featureItem);
                });
            });
            
            // Verificar se há um hash na URL e abrir a aba correspondente
            if (window.location.hash) {
                const hash = window.location.hash.substring(1);
                const link = document.querySelector(`.nav-link[data-tab="${hash}"]`);
                if (link) {
                    link.click();
                }
            }

            // Sincronizar campos de endereço
            document.getElementById('contact_address').addEventListener('input', function() {
                // Remover tags HTML e substituir <br> por vírgulas
                const plainAddress = this.value.replace(/<br>/g, ', ').replace(/(<([^>]+)>)/gi, '');
                document.getElementById('contact_address_map').value = plainAddress;
            });
        });

        // Adicionar funcionalidade para o link de edição de perfil
        document.querySelector('.edit-profile-link').addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remover classe ativa de todos os links
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            
            // Adicionar classe ativa ao link de perfil
            document.querySelector('.nav-link[data-tab="profile"]').classList.add('active');
            
            // Mostrar conteúdo da aba de perfil
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.getElementById('profile-content').classList.add('active');
            
            // Fechar o menu no mobile após clicar
            if (window.innerWidth <= 768) {
                document.getElementById('dashboard-sidebar').classList.remove('active');
            }
        });

        // Função para processar o título da seção "Sobre Nós"
        function processAboutTitle() {
            const titleInput = document.getElementById('about_title');
            const prefixInput = document.getElementById('about_title_prefix');
            const highlightInput = document.getElementById('about_title_highlight');
            
            // Extrair valores do título atual
            if (titleInput.value) {
                const titleMatch = titleInput.value.match(/(.*)<span class="highlight">(.*)<\/span>/);
                if (titleMatch) {
                    prefixInput.value = titleMatch[1] || '';
                    highlightInput.value = titleMatch[2] || '';
                }
            }
            
            // Atualizar o campo oculto quando os campos visíveis são alterados
            function updateHiddenTitle() {
                titleInput.value = prefixInput.value + '<span class="highlight">' + highlightInput.value + '</span>';
            }
            
            prefixInput.addEventListener('input', updateHiddenTitle);
            highlightInput.addEventListener('input', updateHiddenTitle);
            
            // Inicializar o campo oculto
            updateHiddenTitle();
        }
        
        // Executar quando a aba "Sobre Nós" é aberta
        document.querySelector('.nav-link[data-tab="about"]').addEventListener('click', function() {
            setTimeout(processAboutTitle, 100);
        });
        
        // Executar também na inicialização se a aba "Sobre Nós" estiver ativa
        if (document.getElementById('about-content').classList.contains('active')) {
            setTimeout(processAboutTitle, 100);
        }
    </script>
</body>
</html>

