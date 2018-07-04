<?php

// Recebe os dados do formulário
$id = $_POST['id'];
$nome_contato = $_POST["nome_contato"];
$endereco = $_POST["endereco"];
$nro_endereco = $_POST["nro_endereco"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade_id = $_POST["cidade_id"];
$cep = $_POST["cep"];

// Verifica se os dados estão corretos
$nome_contato = utf8_decode(trim($nome_contato));
$endereco = utf8_decode(trim($endereco));
$nro_endereco = utf8_decode(trim($nro_endereco));
$complemento = utf8_decode(trim($complemento));
$bairro = utf8_decode(trim($bairro));
$cidade_id = utf8_decode(trim($cidade_id));
$cep = utf8_decode(trim($cep));

$erros = "";
if (empty($nome_contato)) {
    $erros .= "Campo nome do contato está vazio. ";
}

if (empty($endereco)) {
    $erros .= "Campo endereço está vazio. ";
}

if (empty($nro_endereco)) {
    $erros .= "Campo numero está vazio. ";
}

if (empty($complemento)) {
    $erros .= "Campo complemento está vazio. ";
}

if (empty($bairro)) {
    $erros .= "Campo bairro está vazio. ";
}

if (empty($id_cidade)) {
    $erros .= "Campo id da cidade está vazio. ";
}

if (empty($cep)) {
    $erros .= "Campo cep está vazio. ";
}

if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://localhost:80/agenda_junior_paloma/pages/cad-contato.php\">
            </head>
            <body onload='alert($erros);'></body>
        </html>
    ";
} else {
    // Parametriza a conexão com o banco de dados
    $host     = "localhost:33066";
    $user     = "root";
    $password = "";
    $database = "agenda";

    // Faz a conexão com o servidor MySQL
    $con = mysqli_connect($host, $user, $password);

    // Verifica se ocorreu erro de conexão
    if (!$con) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro de conexão com o servidor do BD");
    }

    // Determina qual banco de dados que será utilizado
    $db = mysqli_select_db($con, $database);

    // Verifica se ocorreu erro na seleção
    if (!$db) {
        // Se sim, então encerra o programa com uma mensagem de erro
        die("Erro ao selecionar o banco de dados.");
    }

    // Cria a sentença SQL para inserir o usuário
    $sql = "update tbl_contatos set nome_contato=\"$nome_contato\", endereco=\"$endereco\", nro_endereco=\"$nro_endereco\", complemento=\"$complemento\", bairro=\"$bairro\", cidade_id=\"$cidade_id\", cep=\"$cep\" where id=$id";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"1;URL=http://localhost:80/agenda_junior_paloma/pages/lista-contato.php\">
        </head>
    </html>";
}
?>