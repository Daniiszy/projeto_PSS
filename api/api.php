<?php

// Define o tipo de conteúdo como HTML com codificação UTF-8
header('Content-Type: text/html; charset=utf-8');

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verifica se os parâmetros 'nome', 'valor' e 'hora' estão presentes no POST
    if (isset($_POST['nome']) && isset($_POST['valor']) && isset($_POST['hora'])) {

        // Exibe uma mensagem indicando que um POST válido foi recebido
        echo "Recebi um POST válido";
        // Imprime o conteúdo do array $_POST
        print_r($_POST);

        // Salva o valor do campo 'nome' em um arquivo nome.txt dentro de uma pasta com o nome do valor do campo 'nome'
        file_put_contents("files/".$_POST['nome']."/nome.txt", $_POST['nome']);
        // Salva o valor do campo 'valor' em um arquivo valor.txt dentro de uma pasta com o nome do valor do campo 'nome'
        file_put_contents("files/".$_POST['nome']."/valor.txt", $_POST['valor']);
        // Salva o valor do campo 'hora' em um arquivo hora.txt dentro de uma pasta com o nome do valor do campo 'nome'
        file_put_contents("files/".$_POST['nome']."/hora.txt", $_POST['hora']);

        $logs_temp = trim($_POST['hora']) . ';' . trim($_POST['valor']) . PHP_EOL;

        file_put_contents("files/".$_POST['nome']."/log.txt", $logs_temp, FILE_APPEND);

    } else {
        // Se os parâmetros não forem válidos, retorna um erro 400 (Bad Request)
        http_response_code(400);
        echo "Erro: Parâmetros inválidos ou incompletos. Os parâmetros 'nome', 'valor' e 'hora' são obrigatórios.";
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Exibe uma mensagem indicando que um GET foi recebido
    echo "Recebi um GET";
    if (isset($_GET['nome'])) {
        $nomeSensor = $_GET['nome'];
        $caminhoArquivo = "files/" . $nomeSensor . "/valor.txt";

        // Verifica se o arquivo existe antes de tentar lê-lo
        if (file_exists($caminhoArquivo)) {
            // Lê e imprime o conteúdo do arquivo "valor.txt"
            $valor = file_get_contents($caminhoArquivo);
            echo " Valor do sensor '$nomeSensor': $valor";
        } else {
            // Imprime uma mensagem de erro se o arquivo não for encontrado
            echo "Erro: Arquivo 'valor.txt' não encontrado para o sensor '$nomeSensor'.";
        }
    } else {
        // Retorna um erro 400 se faltar o parâmetro "nome" no GET
        http_response_code(400);
        echo "Erro: Parâmetro 'nome' é obrigatório no GET.";
    }
} else {
    // Retorna um erro 405 para métodos não permitidos
    http_response_code(405);
    echo "Erro: Método não permitido.";
}

?>
