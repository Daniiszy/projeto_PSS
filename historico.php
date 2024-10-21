<?php
// Inicia a sessão
session_start();

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: acesso_restrito.php");
    exit();
}

// Lê os valores de sensores específicos (movimento e câmara)

//Sensores
$valor_sensor_movimento = file_get_contents("api/files/movimento/valor.txt");
$hora_sensor_movimento = file_get_contents("api/files/movimento/hora.txt");
$nome_sensor_movimento = file_get_contents("api/files/movimento/nome.txt");

$valor_sensor_camara = file_get_contents("api/files/camara/valor.txt");
$hora_sensor_camara = file_get_contents("api/files/camara/hora.txt");
$nome_sensor_camara = file_get_contents("api/files/camara/nome.txt");

$valor_sensor_luminosidade = file_get_contents("api/files/luminosidade/valor.txt");
$hora_sensor_luminosidade = file_get_contents("api/files/luminosidade/hora.txt");
$nome_sensor_luminosidade = file_get_contents("api/files/luminosidade/nome.txt");

//Atuadores
$valor_atuador_buzzer = file_get_contents("api/files/buzzer/valor.txt");
$hora_atuador_buzzer = file_get_contents("api/files/buzzer/hora.txt");
$nome_atuador_buzzer = file_get_contents("api/files/buzzer/nome.txt");

$valor_atuador_botao = file_get_contents("api/files/botao/valor.txt");
$hora_atuador_botao = file_get_contents("api/files/botao/hora.txt");
$nome_atuador_botao = file_get_contents("api/files/botao/nome.txt");

$valor_atuador_led = file_get_contents("api/files/led/valor.txt");
$hora_atuador_led = file_get_contents("api/files/led/hora.txt");
$nome_atuador_led = file_get_contents("api/files/led/nome.txt");


// Diretório onde estão armazenados os sensores
$diretorioSensores = "api/files/";
$sensores = ['botao', 'buzzer', 'camara', 'led', 'luminosidade', 'movimento']; // Sensores da pasta

// Variável para armazenar os dados de log de cada sensor
$dados_sensores = [];

// Percorre cada sensor e lê o arquivo log.txt
foreach ($sensores as $sensor) {
    $caminhoLog = $diretorioSensores . $sensor . "/log.txt";
    
    // Verifica se o arquivo log.txt existe
    if (file_exists($caminhoLog)) {
        $historico = file($caminhoLog, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Inverte a ordem dos históricos para que o mais recente fique em cima
        $historico = array_reverse($historico);

        // Armazena o histórico de cada sensor
        $dados_sensores[$sensor] = $historico;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
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
                <strong>Última Atualização de Sensores Específicos</strong>
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
                            <td><?php echo htmlspecialchars($nome_atuador_botao); ?></td>
                            <td><?php echo htmlspecialchars($valor_atuador_botao); ?></td>
                            <td><?php echo htmlspecialchars($hora_atuador_botao); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo htmlspecialchars($nome_atuador_buzzer); ?></td>
                            <td><?php echo htmlspecialchars($valor_atuador_buzzer); ?></td>
                            <td><?php echo htmlspecialchars($hora_atuador_buzzer); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo htmlspecialchars($nome_sensor_camara); ?></td>
                            <td><?php echo htmlspecialchars($valor_sensor_camara); ?></td>
                            <td><?php echo htmlspecialchars($hora_sensor_camara); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo htmlspecialchars($nome_atuador_led); ?></td>
                            <td><?php echo htmlspecialchars($valor_atuador_led); ?></td>
                            <td><?php echo htmlspecialchars($hora_atuador_led); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo htmlspecialchars($nome_sensor_luminosidade); ?></td>
                            <td><?php echo htmlspecialchars($valor_sensor_luminosidade); ?></td>
                            <td><?php echo htmlspecialchars($hora_sensor_luminosidade); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo htmlspecialchars($nome_sensor_movimento); ?></td>
                            <td><?php echo htmlspecialchars($valor_sensor_movimento); ?></td>
                            <td><?php echo htmlspecialchars($hora_sensor_movimento); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Histórico de todos os sensores -->
        <h2 class="mt-5">Histórico Geral dos Sensores</h2>
        <?php foreach ($dados_sensores as $sensor => $historico): ?>
        <div class="card mt-4">
            <div class="card-header">
                <strong>Histórico de Leituras do Sensor: <?php echo htmlspecialchars($sensor); ?></strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome do Sensor</th>
                            <th scope="col">Hora de Atualização</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Percorre cada linha do histórico do sensor e adiciona à tabela
                        foreach ($historico as $linha) {
                            // Divide a linha em nome, hora e valor
                            $dados = explode(';', trim($linha));

                            // Verifica se a linha contém exatamente 3 elementos (nome, hora e valor)
                            if (count($dados) == 3) {
                                $nome = htmlspecialchars($dados[0]);
                                $hora = htmlspecialchars($dados[1]);
                                $valor = htmlspecialchars($dados[2]);

                                echo "<tr>";
                                echo "<td>{$nome}</td>";
                                echo "<td>{$hora}</td>";
                                echo "<td>{$valor}</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endforeach; ?>
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