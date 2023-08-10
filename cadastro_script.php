<html lang="PT-BR" dir="rtl">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Cadastro Stefanini</title>
</head>

<body>
	<center>
		<h1>Realização de cadastro<h1>

	</center>
	<div class="container">
		<div class="row">
			<?php
			include "conexao.php";
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$email = $_POST['email'];
			$data_nascimento = $_POST['data_nascimento'];
			$cpf = $_POST['cpf'];
			$observacao = $_POST['observacao'];

			$sql = "INSERT INTO `empresa`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `cpf`, `observacao`)
					 VALUES
					  ('$nome','$endereco','$telefone','$email','$data_nascimento','$cpf','$observacao')";

			if (mysqli_query($conn, $sql)) {
				mensagem("$nome cadastrado com sucesso", 'success');
			} else
				mensagem("$nome NÃO cadastrado com sucesso", 'danger');

			?>

			<div style="padding-top: 20px;">
				<a href="cadastro.php" class="btn btn-primary">Voltar</a>
				<a href="pesquisa.php" class="btn btn-info">Lista de usuários cadastrados</a>
			</div>
		</div>
	</div>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>

</html>