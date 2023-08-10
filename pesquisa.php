<!doctype html>
<html lang="PT-BR" dir="rtl">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Cadastro Stefanini</title>
	<style>
		body {
			direction: ltr;
		}

		.container {
			margin-left: auto;
			max-width: 1500px;
		}
	</style>
</head>

<body>
	<center>
		<img src="logo.png" alt="logo da empresa Stefanini" width=50%>
		<h1>Lista de cadastros</h1>
	</center>
	<?php

	$pesquisa = $_POST['busca'] ?? '';

	include "conexao.php";
	$sql = "SELECT * FROM empresa WHERE nome LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%' LIMIT 10";
	$dados = mysqli_query($conn, $sql);
	?>


	<div class="container">
		<nav class="navbar bg-body-tertiary">
			<div class="container-fluid">
				<form class="d-flex" role="search" action="pesquisa.php" method="POST">
					<input class="form-control me-2" type="search" placeholder="Nome ou Email" aria-label="Search" name="busca" autofocus>
					<button class="btn btn-outline-success  me-3" type="submit">Pesquisar</button>
				</form>
			</div>
		</nav>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Nome</th>
					<th scope="col">Endereço</th>
					<th scope="col">Telefone</th>
					<th scope="col">Email</th>
					<th scope="col">Nascimento</th>
					<th scope="col">CPF</th>
					<th scope="col">Observação</th>
					<th scope="col">Funções</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($linha = mysqli_fetch_assoc($dados)) {
					$cod_pessoa = $linha['cod_pessoa'];
					$nome = $linha['nome'];
					$endereco = $linha['endereco'];
					$telefone = $linha['telefone'];
					$email = $linha['email'];
					$data_nascimento = $linha['data_nascimento'];
					$data_nascimento = mostra_data($data_nascimento);
					$cpf = $linha['cpf'];
					$observacao = $linha['observacao'];
					echo "<tr>
							<th scope='row'>$nome</th>
							<td>$endereco</td>
							<td>$telefone</td>
							<td>$email</td>
							<td>$data_nascimento</td>
							<td>$cpf</td>
							<td>$observacao</td>
							<td width=150px><a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
							<a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'						
							onclick=" . '"' . "pegar_dados($cod_pessoa, '$nome')" . '"' . ">Excluir</a>
							</td>
						</tr>";
				}
				?>


			</tbody>
		</table>
		<a href="cadastro.php" class="btn btn-info">Voltar para o início</a>
	</div>
	</div>
	</div>

	</div>
	</div>
	</div>

	<div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="excluir_script.php" method="POST">
						<p>Confirme a exclusão de <b id="nome_pessoa"></b></p>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
					<input type="hidden" name="nome" id="nome_pessoa_1" value="">
					<input type="hidden" name="id" id="cod_pessoa" value="">
					<input type="submit" class="btn btn-danger" value="Sim">
					</form>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		function pegar_dados(id, nome) {
			document.getElementById('nome_pessoa').innerHTML = nome;
			document.getElementById('nome_pessoa_1').value = id;

			document.getElementById('cod_pessoa').value = id;
		}
	</script>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>

</html>