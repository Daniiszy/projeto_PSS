<?php
// Inicia uma sessão ou retoma uma sessão existente
session_start();

// Verifica se o utilizador já está autenticado, verificando a variável de sessão 'username'
if (!isset($_SESSION['username'])) {
    // Se 'username' não está definido na sessão, redireciona o usuário para a página de acesso restrito
    header("Location: acesso_restrito.php");
    exit();
}

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
                        <a class="nav-link" href="historico.php">Histórico</a>
                </ul>
                <form action="logout.php" method="get">
                    <button name="logout" class="btn btn-outline-secondary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="secao-com-fundo">
        <div class="container d-flex justify-content-around align-items-center">
            <div id="title-header">
                <h1 class="letras_Projeto">Serviço de Vigilância Inteligente</h1>
                <h6> <strong>User:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></h6>
            </div>
            <img src="imagens/estg.png" width="300" alt="Imagem da Estg">
        </div>

        <div class="container text-center">
            <div class="row">
                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header sensor">
                            <strong>Sensor de movimento: <?php echo htmlspecialchars($valor_sensor_movimento); ?></strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/motion_sensor.png" alt="Imagem de sensor de movimento">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> <?php echo htmlspecialchars($hora_sensor_movimento); ?> - 
                            <a href="historico_sensor.php?nome=<?php echo htmlspecialchars($nome_sensor_movimento); ?>">Histórico</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header sensor">
                            <strong>Camara: <?php echo htmlspecialchars($valor_sensor_camara); ?></strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/camera.png" alt="Imagem de camara">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> <?php echo htmlspecialchars($hora_sensor_camara); ?> - 
                            <a href="historico_sensor.php?nome=<?php echo htmlspecialchars($nome_sensor_camara); ?>">Histórico</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header sensor">
                            <strong>Sensor de luminosidade: <?php echo htmlspecialchars($valor_sensor_luminosidade); ?></strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/brightness_12373383.png" alt="Imagem de sensor de movimento">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> <?php echo htmlspecialchars($hora_sensor_luminosidade); ?> - 
                            <a href="historico_sensor.php?nome=<?php echo htmlspecialchars($nome_sensor_luminosidade); ?>">Histórico</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header atuador">
                            <strong>Buzzer: <?php echo htmlspecialchars($valor_atuador_buzzer); ?></strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/buzzer.png" alt="Imagem do buzzer">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> <?php echo htmlspecialchars($hora_atuador_buzzer); ?> - 
                            <a href="historico_sensor.php?nome=<?php echo htmlspecialchars($nome_atuador_buzzer); ?>">Histórico</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header atuador">
                            <strong>Botão: <?php echo htmlspecialchars($valor_atuador_botao); ?> </strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/button.png" alt="Imagem do botão">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> <?php echo htmlspecialchars($hora_atuador_botao); ?> - 
                            <a href="historico_sensor.php?nome=<?php echo htmlspecialchars($nome_atuador_botao); ?>">Histórico</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header atuador">
                            <strong>Led: <?php echo htmlspecialchars($valor_atuador_led); ?> </strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/light-on.png" alt="Imagem da led">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> <?php echo htmlspecialchars($hora_atuador_led); ?> - 
                            <a href="historico_sensor.php?nome=<?php echo htmlspecialchars($nome_atuador_led); ?>">Histórico</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
        <div class="card">
            <div class="card-header">
                <h5><strong>Tabela de Sensores</strong></h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
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
                            <td data-label="Tipo de Dispositivos IoT"><?php echo htmlspecialchars($nome_sensor_movimento); ?></td>
                            <td data-label="Valor"><?php echo htmlspecialchars($valor_sensor_movimento); ?></td>
                            <td data-label="Data de Atualização"><?php echo htmlspecialchars($hora_sensor_movimento); ?></td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-danger">Elevada</span></td>
                        </tr>
                        <tr>
                            <td data-label="Tipo de Dispositivos IoT"><?php echo htmlspecialchars($nome_sensor_camara); ?></td>
                            <td data-label="Valor"><?php echo htmlspecialchars($valor_sensor_camara); ?></td>
                            <td data-label="Data de Atualização"><?php echo htmlspecialchars($hora_sensor_camara); ?></td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-primary">Normal</span></td>
                        </tr>
                        <tr>
                            <td data-label="Tipo de Dispositivos IoT"><?php echo htmlspecialchars($nome_sensor_luminosidade); ?></td>
                            <td data-label="Valor"><?php echo htmlspecialchars($valor_sensor_luminosidade); ?></td>
                            <td data-label="Data de Atualização"><?php echo htmlspecialchars($hora_sensor_luminosidade); ?></td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                        <tr>
                            <td data-label="Tipo de Dispositivos IoT"><?php echo htmlspecialchars($nome_atuador_buzzer); ?></td>
                            <td data-label="Valor"><?php echo htmlspecialchars($valor_atuador_buzzer); ?></td>
                            <td data-label="Data de Atualização"><?php echo htmlspecialchars($hora_atuador_buzzer); ?></td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                        <tr>
                            <td data-label="Tipo de Dispositivos IoT"><?php echo htmlspecialchars($nome_atuador_botao); ?></td>
                            <td data-label="Valor"><?php echo htmlspecialchars($valor_atuador_botao); ?></td>
                            <td data-label="Data de Atualização"><?php echo htmlspecialchars($hora_atuador_botao); ?></td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                        <tr>
                            <td data-label="Tipo de Dispositivos IoT"><?php echo htmlspecialchars($nome_atuador_led); ?></td>
                            <td data-label="Valor"><?php echo htmlspecialchars($valor_atuador_led); ?></td>
                            <td data-label="Data de Atualização"><?php echo htmlspecialchars($hora_atuador_led); ?></td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <footer class="footer bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-section">
                    <h5>Sobre Nós</h5>
                    <p>FocoenSec é uma plataforma de vigilância inteligente que oferece monitoramento em tempo real.</p>
                </div>
                <div class="col-md-4 footer-section">
                    <h5>Redes Sociais</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
                        <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
                        <li><a href="https://www.linkedin.com" target="_blank">LinkedIn</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-section">
                    <h5>Contato</h5>
                    <p>Email: suporte@focoensec.com</p>
                    <p>Telefone: +351 123 456 789</p>
                </div>
            </div>
            <div class="text-center py-3">
                <small>&copy; 2024 FocoenSec. Todos os direitos reservados.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>