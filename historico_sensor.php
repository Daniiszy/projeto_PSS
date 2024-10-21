<?php
// Inicia a sessão
session_start();

// Verifica se o utilizador está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: acesso_restrito.php");
    exit();
}

// Verifica se o parâmetro 'nome' foi passado na URL
if (!isset($_GET['nome'])) {
    echo "Nenhum sensor foi selecionado.";
    exit(); 
}

// Captura o nome do sensor da URL
$nome_selecionado = $_GET['nome'];

// Diretório onde os sensores estão localizados
$diretorioSensores = "api/files/";

// Sensores existentes (pode ajustar se adicionar mais sensores)
$sensores = ['botao', 'buzzer', 'camara', 'led', 'luminosidade', 'movimento'];

// Variável para armazenar o caminho do sensor encontrado
$caminhoLog = "";

// Percorre os sensores para encontrar aquele com o nome correspondente no nome.txt
foreach ($sensores as $sensor) {
    $caminhoNome = $diretorioSensores . $sensor . "/nome.txt";
    
    // Verifica se o arquivo nome.txt existe para esse sensor
    if (file_exists($caminhoNome)) {
        // Lê o conteúdo do nome.txt
        $nome_sensor = trim(file_get_contents($caminhoNome));
        
        // Se o nome no arquivo corresponder ao nome selecionado, encontramos o sensor
        if ($nome_sensor === $nome_selecionado) {
            // Define o caminho do log desse sensor
            $caminhoLog = $diretorioSensores . $sensor . "/log.txt";
            break; // Sai do loop, pois já encontramos o sensor correto
        }
    }
}

// Se o sensor não foi encontrado
if (empty($caminhoLog) || !file_exists($caminhoLog)) {
    echo "Log do sensor selecionado não foi encontrado.";
    exit();
}

// Lê o conteúdo do arquivo de log
$historico = file($caminhoLog, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Inverte a ordem dos históricos para que o mais recente fique em cima
$historico = array_reverse($historico);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
    <title>Histórico de <?php echo htmlspecialchars($nome_selecionado); ?></title>
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
                        <a class="nav-link active" aria-current="page" href="historico.php">Histórico</a>
                    </li>
                </ul>
                <form action="logout.php" method="get">
                    <button name="logout" class="btn btn-outline-secondary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Histórico de Leituras do Sensor: <?php echo htmlspecialchars($nome_selecionado); ?></h2>

        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
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

                                $hora = htmlspecialchars($dados[1]);
                                $valor = htmlspecialchars($dados[2]);

                                echo "<tr>";
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
