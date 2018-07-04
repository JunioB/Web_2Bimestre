<?php
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

    // Cria a sentença SQL para buscar os contatos
    $sql = "select * from tbl_contatos where id=$id";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
</head>

<body class="back-register">
	<?php include_once('nav-dashboard.php'); ?>

	<div class="register-box">
		<div class="register-box-body">
			<div class="row" style="text-align: center">
				<span class="register-title">
					Cadastro de Contatos
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de contatos -->
			<form action="altera-contato.php" method="post" autocomplete="off">
				<input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
				
				<!-- nome do contato -->
				<div class="input-group">
					<span class="input-group-addon" id="input-nome_contato">
						<span class="fas fa-address-book"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[1]; ?>"
						name="nome_contato" required placeholder="Nome do Contato"
						aria-describedby="input-nome_contato">
				</div>
				<br>

				<!-- Endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-endereco">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[2]; ?>"
						name="endereco" required placeholder="Endereço"
						aria-describedby="input-endereco_contato">
				</div>
				<br>

                <!-- nro endereço -->
				<div class="input-group">
					<span class="input-group-addon" id="input-nro-endereco">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[3]; ?>"
						name="nro_endereco" required placeholder="Numero"
						aria-describedby="input-nro_endreco_contato">
				</div>
				<br>

                <!-- Complemento -->
				<div class="input-group">
					<span class="input-group-addon" id="input-complemento">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[4]; ?>"
						name="complemento" required placeholder="Complemento"
						aria-describedby="input-complemento_contato">
				</div>
				<br>

                <!-- Bairro -->
				<div class="input-group">
					<span class="input-group-addon" id="input-bairro">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[5]; ?>"
						name="bairro" required placeholder="Bairro"
						aria-describedby="input-bairro_contato">
				</div>
				<br>
                

				<!-- Cidade -->
				<div class="input-group">
                    <?php 
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

                    // Cria a sentença SQL para buscar as cidades
                    $sql = "select * from tbl_cidades order by nome_cidade";
                    $result = mysqli_query($con, $sql);
           
                    // Cria a sentença SQL para buscar as cidades
                            $sql = "select * from tbl_cidades order by nome_cidade";
                            $result = mysqli_query($con, $sql);

							echo " 
							<div class=\"input-group\">
							<span class=\"input-group-addon\" id=\"input-cidade_id\">
							<span class=\"fas fa-building\"></span>
							</span>
							<select name=\"cidade_id\" class=\"form-control\">
							";while($row = mysqli_fetch_array($result)){
								echo"
                                    <option value=\"cidade_id\">".utf8_encode($row[6])."</option>
									";
								}; echo "
								</select>
                            </div>
                                ";
                    ?>
				</div>
				<br>

                 <!-- CEP -->
				<div class="input-group">
					<span class="input-group-addon" id="input-cep">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control" value="<?php echo $row[7]; ?>"
						name="cep" required placeholder="CEP"
						aria-describedby="input-cep_contato">
				</div>
				<br>

				<!-- Estado -->
				<div class="input-group">
					<span class="input-group-addon" id="input-password">
						<span class="fas fa-building"></span>
					</span>
                    <select name="estado" class="form-control">
                        <option value="SP" <?php if($row[2] == "SP") echo "selected"; ?> >São Paulo</option>
                        <option value="RJ" <?php if($row[2] == "RJ") echo "selected"; ?> >Rio de Janeiro</option>
                        <option value="MG" <?php if($row[2] == "MG") echo "selected"; ?> >Minas Gerais</option>
                        <option value="RS" <?php if($row[2] == "RS") echo "selected"; ?> >Rio Grande do Sul</option>
                    </select>
				</div>
				<br>

				<!-- Botão de envio -->
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-12">
						<button type="submit"
							class="btn btn-primary btn-block btn-flat">
							Inserir <span class="fas fa-chevron-circle-right"></span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
	include_once('footer.php');
	include_once('js.php');
?>
</body>
</html>