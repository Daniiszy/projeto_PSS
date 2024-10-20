<?php
// Inicia uma sessão ou retoma uma sessão existente
session_start();

// Verifica se o utilizador já está autenticado, verificando a variável de sessão 'username'
if (!isset($_SESSION['username'])) {

    // Se 'username' não está definido na sessão, redireciona o usuário para a página de acesso restrito
    header("Location: acesso_restrito.php");
    exit();
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
                            <strong>Temperatura: <?php echo $valor_temperatura; ?>º</strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/temperature-high.png" alt="Imagem de temperatura alta">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> <?php echo $hora_temperatura; ?> - <a href="historico_temperatura.php">Histórico</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header sensor">
                            <strong>Humidade 70%</strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/humidity-high.png" alt="Imagem de temperatura alta">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> 2024/03/10 14:31 - <a href="#">Histórico</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header sensor">
                            <strong>Humidade 70%</strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/humidity-high.png" alt="Imagem de temperatura alta">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> 2024/03/10 14:31 - <a href="#">Histórico</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header atuador">
                            <strong>Led Arduino: Ligado</strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/light-on.png" alt="Imagem de temperatura alta">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> 2024/03/10 14:31 - <a href="#">Histórico</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header atuador">
                            <strong>Led Arduino: Ligado</strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/light-on.png" alt="Imagem de temperatura alta">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> 2024/03/10 14:31 - <a href="#">Histórico</a></h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card">
                        <div class="card-header atuador">
                            <strong>Led Arduino: Ligado</strong>
                        </div>
                        <div class="card-body">
                            <img src="imagens/light-on.png" alt="Imagem de temperatura alta">
                        </div>
                        <div class="card-footer">
                            <h5><strong>Atualização:</strong> 2024/03/10 14:31 - <a href="#">Histórico</a></h5>
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
                <table class="table table-striped table-hover" role="table">
                    <thead>
                        <tr role="row">
                            <th scope="col">Tipo de Dispositivos IoT</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Data de Atualização</th>
                            <th scope="col">Estado Alertas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr role="row">
                            <td data-label="Tipo de Dispositivos IoT"><?php echo $nome_temperatura; ?></td>
                            <td data-label="Valor"><?php echo $valor_temperatura; ?></td>
                            <td data-label="Data de Atualização"><?php echo $hora_temperatura; ?></td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-danger">Elevada</span></td>
                        </tr>
                        <tr role="row">
                            <td data-label="Tipo de Dispositivos IoT">Humidade</td>
                            <td data-label="Valor">70%</td>
                            <td data-label="Data de Atualização">2024/03/10 14:31</td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-primary">Normal</span></td>
                        </tr>
                        <tr role="row">
                            <td data-label="Tipo de Dispositivos IoT">Led Arduino</td>
                            <td data-label="Valor">Ligado</td>
                            <td data-label="Data de Atualização">2024/03/10 14:31</td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                        <tr role="row">
                            <td data-label="Tipo de Dispositivos IoT">Led Arduino</td>
                            <td data-label="Valor">Ligado</td>
                            <td data-label="Data de Atualização">2024/03/10 14:31</td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                        <tr role="row">
                            <td data-label="Tipo de Dispositivos IoT">Led Arduino</td>
                            <td data-label="Valor">Ligado</td>
                            <td data-label="Data de Atualização">2024/03/10 14:31</td>
                            <td data-label="Estado Alertas"><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                        </tr>
                        <tr role="row">
                            <td data-label="Tipo de Dispositivos IoT">Led Arduino</td>
                            <td data-label="Valor">Ligado</td>
                            <td data-label="Data de Atualização">2024/03/10 14:31</td>
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