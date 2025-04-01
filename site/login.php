<?php
session_start();

// Verificar se já está logado
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

// Processar o formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    // Verificar credenciais
    if ($username === 'EdsonDuarte' && $password === 'Up5207418898@') {
        // Login bem-sucedido
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        
        // Redirecionar para o dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Login falhou
        $error = 'Usuário ou senha incorretos';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrativo | UP Soluções em Tecnologia</title>
    <meta name="description" content="Área de login administrativo da UP Soluções em Tecnologia">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/image/logo.png">
    <style>
        body {
            background-color: var(--primary-color);
            color: var(--text-light);
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-logo img {
            width: 80px;
            margin-bottom: 15px;
        }
        .login-logo h1 {
            font-size: 24px;
            font-weight: 500;
            color: var(--text-light);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--highlight-color);
            box-shadow: 0 0 0 2px rgba(77, 136, 255, 0.3);
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: var(--highlight-color);
            color: var(--text-light);
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .login-btn:hover {
            background-color: var(--accent-color);
            transform: translateY(-2px);
        }
        .error-message {
            background-color: rgba(220, 53, 69, 0.2);
            color: #ff6b6b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--text-light);
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        .back-link:hover {
            opacity: 1;
            color: var(--highlight-color);
        }
        .login-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        .login-background .shape {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--highlight-color), var(--accent-color));
            filter: blur(60px);
            opacity: 0.3;
        }
        .login-background .shape:nth-child(1) {
            width: 500px;
            height: 500px;
            top: -250px;
            left: -100px;
        }
        .login-background .shape:nth-child(2) {
            width: 400px;
            height: 400px;
            bottom: -200px;
            right: -100px;
        }
    </style>
</head>
<body>
    <div class="login-background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container">
        <div class="login-logo">
            <img src="/image/logo.png" alt="UP Soluções Logo">
            <h1>Painel Administrativo</h1>
        </div>
        
        <?php if ($error): ?>
        <div class="error-message">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>
        
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="login-btn">Entrar</button>
        </form>
        
        <a href="index.php" class="back-link">
            <i class="fas fa-arrow-left"></i> Voltar para o site
        </a>
    </div>

    <script src="js/script.js"></script>
</body>
</html>

