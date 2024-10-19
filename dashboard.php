<?php
// Inicia uma sessão ou retoma uma sessão existente
session_start();

// Verifica se o usuário já está autenticado, verificando a variável de sessão 'username'
if (!isset($_SESSION['username'])) {

    // Se 'username' não está definido na sessão, redireciona o usuário para 'index.php' após 5 segundos
    header("refresh:5;url=index.php");

    // Exibe uma mensagem de "Acesso Restrito" e termina a execução do script
    die("Acesso Restrito");
}

$valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
$nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Plataforma IoT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
   <!--<h6> <?php // echo  $nome_temperatura . " : " . $valor_temperatura . " em " . $hora_temperatura; ?></h6> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FocoenSec</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Histórico</a>
                </ul>
                <form action="logout.php" method="get">
                    <button name="logout" class="btn btn-outline-secondary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-around align-items-center">
        <div id="title-header">
            <h1>Serviço de Vigilância Inteligente</h1>
            <h6> <strong>User:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></h6>
        </div>
        <img src="imagens/estg.png" width="300px" alt="Imagem da Estg">
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header sensor">
                        <strong>Temperatura: <?php echo $valor_temperatura; ?></strong>
                    </div>
                    <div class="card-body">
                        <img src="imagens/temperature-high.png" alt="Imagem de temperatura alta">
                    </div>
                    <div class="card-footer">
                        <h5><strong>Atualização:</strong> <?php echo $hora_temperatura; ?> - <a href="#">Histórico</a> </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header sensor">
                        <strong>Humidade 70%</strong>
                    </div>
                    <div class="card-body">
                        <img src="imagens/humidity-high.png" alt="Imagem de temperatura alta">
                    </div>
                    <div class="card-footer">
                        <h5><strong>Atualização:</strong> 2024/03/10 14:31 - <a href="#">Histórico</a> </h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header atuador">
                        <strong>Led Arduino: Ligado</strong>
                    </div>
                    <div class="card-body">
                        <img src="imagens/light-on.png" alt="Imagem de temperatura alta">
                    </div>
                    <div class="card-footer">
                        <h5><strong>Atualização:</strong> 2024/03/10 14:31 - <a href="#">Histórico</a> </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p></p>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5><strong></strong></h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tipo de Dispositivos IoT</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data de Atualização</th>
                            <th scope="col">Estado Alertas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row"><?php echo $nome_temperatura; ?></td>
                            <td><?php echo $valor_temperatura; ?></td>
                            <td><?php echo $hora_temperatura; ?></td>
                            <td><span class="badge rounded-pill text-bg-danger">Elevada</span></td>
                        </tr>
                        <tr>
                            <td scope="row">Humidade</td>
                            <td>70%</td>
                            <td>2024/03/10 14:31</td>
                            <td><span class="badge rounded-pill text-bg-primary">Normal</span></td>
                        </tr>
                        <tr>
                            <td scope="row">Led Arduino</td>
                            <td>Ligado</td>
                            <td>2024/03/10 14:31</td>
                            <td><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>