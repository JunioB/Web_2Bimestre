<?php

// Recebe os dados do formulário
$id = $_GET['id'];

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
    $sql = " delete from tbl_contato where id=$id";

    // Envia o insert para o banco de dados
    $result = mysqli_query($con, $sql);

    echo "
    <html>
        <head>
            <META http-equiv=\"refresh\" content=\"1;URL=http://localhost:80/agenda_junior_paloma/pages/lista-contato.php\">
        </head>
    </html>";

?>