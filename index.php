<?php
session_start();

$username = "daniel"; 
$username = "admin"; 
$username = "miguel";

$password_hash_daniel = '$2y$10$hU2F9ReDlYB2Kt5uaMhzVO8NQSmV0HrNVUgQcqPySrKMrWYqQm9Sm';
$password_hash_admin = '$2y$10$U/PE9zgYIAZe8bQh9TNd5.jYc5e4u0gQ1xl4.7wNsCPXHUlMViOkS';
$password_hash_miguel = '$2y$10$WLY2TyDlfNar8QONA3wrG.nbMdru4a19m7RXUAvNqwyo3C3rtzWYi';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificação de autenticação
    if ($username === "admin" && password_verify($password, $password_hash_admin)) {
        $_SESSION['username'] = $username; // Armazena o username na sessão
        header("Location: dashboard.php"); // Redireciona para o dashboard
        exit(); // Saia após o redirecionamento
    } 
    if ($username === "daniel" && password_verify($password, $password_hash_daniel)) {
        $_SESSION['username'] = $username; // Armazena o username na sessão
        header("Location: dashboard.php"); // Redireciona para o dashboard
        exit(); // Saia após o redirecionamento
    } 
    if ($username === "miguel" && password_verify($password, $password_hash_miguel)) {
        $_SESSION['username'] = $username; // Armazena o username na sessão
        header("Location: dashboard.php"); // Redireciona para o dashboard
        exit(); // Saia após o redirecionamento
    } 
    
    // Se nenhuma das condições acima for verdadeira, exibe uma mensagem de erro
    $error_message = "Autenticação falhou! Username ou senha incorretos.";
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
        }

        .container img {
            max-width: 250px;
            margin-bottom: 20px;
        }

        .error {
            background-color: #f8d7da; /* Cor de fundo para a mensagem de erro */
            color: #721c24; /* Cor do texto */
            border: 1px solid #f5c6cb; /* Borda vermelha */
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #428bca;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #357ae8; /* Escurece a cor ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Aqui você pode colocar o caminho da sua imagem -->
        <img src="estg_h.png" alt="Logo">

        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>
