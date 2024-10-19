<?php
/*
    if (isset($_POST['username'])){
        echo "O username submetido foi: ".$_POST['username']."<br>";
    }
    if (isset($_POST['password'])){
        echo "A password submetida foi: ".$_POST['password']."<br>";
    }
*/

    session_start();
    
    $username = "daniel"; 
    $username = "admin"; 
    $username = "miguel";

    $hashes_utilizadores = [


    ];

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
        echo "Autenticação falhou! Username ou senha incorretos.";
    }
?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <?php
    $ano = 2024;
    $mes = 03;
    $dia = 12;

    //echo "<h1>Hello, world!</h1>"; 

    //echo "<h6>Data de hoje = ".$ano."/".$mes."/".$dia."</h6>";
    // echo "<h6>Data de hoje = $ano/$mes/$ano</h6>"
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <form class="AulaForm" method="post">
                <a href="index.php"><img src="estg_h.png" alt="Logotipo"></a>
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Username</label>
                    <input name="username" placeholder="Insira o seu username" type="text" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" placeholder="Insira a sua password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submeter</button>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>