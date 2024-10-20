<?php
// Inicia a sessão
session_start();

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: acesso_restrito.php");
    exit();
}

// Lê os valores da API para exibição
$valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
$nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5"> <!-- Atualiza a página a cada 5 segundos -->
    <title>Histórico de Leituras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FocoenSec</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Histórico</a>
                    </li>
                </ul>
                <form action="logout.php" method="get">
                    <button name="logout" class="btn btn-outline-secondary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Histórico de Leituras em Tempo Real</h2>

        <div class="card mt-4">
            <div class="card-header">
                <strong>Última Atualização de Sensores</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tipo de Dispositivo IoT</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Hora de Atualização</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $nome_temperatura; ?></td>
                            <td><?php echo $valor_temperatura; ?> °C</td>
                            <td><?php echo $hora_temperatura; ?></td>
                        </tr>
                        <tr>
                            <td>Humidade</td>
                            <td>70%</td>
                            <td>2024/03/10 14:31</td>
                        </tr>
                        <!-- Mais leituras de sensores podem ser adicionadas aqui -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer class="footer bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="text-center">
                <small>&copy; 2024 FocoenSec. Todos os direitos reservados.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
