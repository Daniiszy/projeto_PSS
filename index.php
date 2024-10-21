<?php
session_start();

function carregarUtilizadores($ficheiro) {
    $utilizadores = [];
    if (file_exists($ficheiro)) {
        $linhas = file($ficheiro, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($linhas as $linha) {
            list($username, $hash) = explode(',', trim($linha));
            $utilizadores[$username] = $hash;
        }
    }
    return $utilizadores;
}

$utilizadores = carregarUtilizadores('users.txt');

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (array_key_exists($username, $utilizadores) && password_verify($password, $utilizadores[$username])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    }

    $error_message = "Autenticação falhou! Username ou palavra-passe incorretos.";
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
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
            background-color: #357ae8;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="estg_h.png" alt="Logo">

        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="index.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>