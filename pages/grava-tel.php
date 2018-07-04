<?php

// Recebe os dados do formulário
$tipo_telefone    = $_POST["tipo_telefone"];
$nro_telefone        = $_POST["nro_telefone"];

// Verifica se os dados estão corretos
$tipo_telefone = utf8_decode(trim($tipo_telefone));
$nro_telefone = utf8_decode(trim($nro_telefone));


$erros = "";
if (empty($tipo_telefone)) {
    $erros .= "Campo tipo do telefone está vazio. ";
}

if (empty($nro_telefone)) {
    $erros .= "Campo numero do telefone está vazio. ";
}

if (!empty($erros)) {
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"5;URL=http://localhost:80/agenda_junior_paloma/pages/cad-tel.php\">
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

    // Cria a sentença SQL para inserir o contato
    $sql = "insert into tbl_telefones (tipo_telefone, nro_telefone) 
    values(\"$tipo_telefone\", \"$nro_telefone\")";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"1;URL=http://localhost:80/agenda_junior_paloma/pages/cad-tel.php\">
        </head>
    </html>";
}
?>