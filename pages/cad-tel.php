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
					Cadastro de Telefone dos Contatos
				</span>
			</div>
			<hr class="hr-separator">
			<div class="row" style="text-align: center">
				<p class="register-subtitle">Forneça os dados abaixo</p>
			</div>

			<!-- Formulário de cadastramento de cidades -->
			<form action="grava-tel.php" method="post" autocomplete="off">

                <!-- Busca de Id do Contato -->
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
                    $sql = "select * from tbl_contato order by nome_contato";
                    $result = mysqli_query($con, $sql);
           
                    // Cria a sentença SQL para buscar as cidades
                            $sql = "select * from tbl_contato order by id";
                            $result = mysqli_query($con, $sql);

							echo " 
							<div class=\"input-group\">
							<span class=\"input-group-addon\" id=\"input-id\">
							<span class=\"fas fa-building\"></span>
							</span>
							<select name=\"id\" class=\"form-control\">
							";while($row = mysqli_fetch_array($result)){
								echo"
                                    <option value=\"id\">".utf8_encode($row[1])."</option>
									";
								}; echo "
								</select>
                            </div>
                                ";

                            ?>
				</div>
				<br>

                <!-- Tipo de Telefone -->
				<div class="input-group">
					<span class="input-group-addon" id="input-tipo_telefone">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="tipo_telefone" required placeholder="Tipo de Telefone"
						aria-describedby="input-tipo_telefone_contato">
				</div>
				<br>
                
                 <!-- Numero de Telefone -->
				<div class="input-group">
					<span class="input-group-addon" id="input-nro_telefone">
						<span class="fas fa-globe"></span>
					</span>
					<input type="text" class="form-control"
						name="nro_telefone" required placeholder="Numero de Telefone"
						aria-describedby="input-nro_telefone_contato">
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
