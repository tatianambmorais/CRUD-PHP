<!doctype html>
<html lang="PT-BR" dir="ltr">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Exclusão de cadastro</title>
</head>

<body>
	<center>
		<h1>Cadastro<h1>
	</center>

	<div class="container">
		<div class="column justify-content-center">
			<?php
			include "conexao.php";
			$id = $_POST['id'];
			$nome = $_POST['nome'];


			$sql = "DELETE from empresa WHERE cod_pessoa=$id";

			if (mysqli_query($conn, $sql)) {
				mensagem("Registro excluído com sucesso", 'success');
			} else
				mensagem("Registro NÃO excluído", 'danger');

			?>
			<a href="pesquisa.php" class="btn btn-primary">Voltar</a>
		</div>
	</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</body>

</html>