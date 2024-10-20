<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Restrito</title>
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
    
        h1 {
            color: #d9534f;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        
        a {
            color: #428bca;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="access-denied">
        <h1>Acesso Restrito</h1>
        <p>Não tem permissão para aceder a esta página.</p>
        <p class="timer">Será redirecionado para a página inicial em 5 segundos. <br>Se não for, <a href="index.php">clique aqui</a>.</p>
    </div>
</body>
</html>

<?php
// Redireciona automaticamente para 'index.php' após 5 segundos
header("refresh:5;url=index.php");
?>
