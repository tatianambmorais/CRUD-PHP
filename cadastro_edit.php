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

		.form-group {
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<center>
		<img src="logo.png" alt="logo da empresa Stefanini" width=50%>
		<h1>Edição de cadastro</h1>
	</center>
	<?php
	include "conexao.php";
	$id = $_GET['id'] ?? '';
	$sql = "SELECT * FROM empresa WHERE cod_pessoa=$id";
	$dados = mysqli_query($conn, $sql);
	$linha = mysqli_fetch_assoc($dados);
	?>

	<div class="container">
		<div class="row">
			<div class="col"></div>
			<form action="edit_script.php" method="POST">
				<div class="form-group">
					<label for="nome" class="form-label">Nome completo</label>
					<input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">
				</div>
				<div class="form-group">
					<label for="endereco" class="form-label">Endereço</label>
					<input type="text" class="form-control" name="endereco" required value="<?php echo $linha['endereco']; ?>">
				</div>
				<div class="form-group">
					<label for="telefone" class="form-label">Telefone</label>
					<input type="text" class="form-control" name="telefone" required value="<?php echo $linha['telefone']; ?>">
				</div>
				<div class="form-group">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail1" name="email" required value="<?php echo $linha['email']; ?>">
				</div>
				<div class="form-group">
					<label for="nascimento" class="form-label">Nascimento</label>
					<input type="date" class="form-control" name="data_nascimento" required value="<?php echo $linha['data_nascimento']; ?>">
				</div>

				<div class="form-group">
					<label for="cpf" class="form-label">CPF</label>
				</div>
				<input type="text" class="form-control" name="cpf" required value="<?php echo $linha['cpf'] ?>">

				<div class="form-group">
					<label for="observacao" class="form-label">Observação</label>
					<input type="text" class="form-control" name="observacao" value="<?php echo $linha['observacao'] ?>">
				</div>
				<div class="form-group">

					<input type="submit" class="btn btn-success" value="Salvar Alterações" </div>
					<input type="hidden" name="id" value="<?php echo $linha['cod_pessoa'] ?>">
					<a href="pesquisa.php" class="btn btn-info">Pesquisa</a>


			</form>
		</div>
	</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


	<script>
		function validateForm() {
			if (!validateNome() || !validateCPF()) {
				return false;
			}
			return true;
		}

		function validateNome() {
			const nomeInput = document.getElementById("nome");
			const nomeValue = nomeInput.value;
			const regex = /^[a-zA-Z\s]+$/; // Expressão regular para permitir apenas letras e espaços

			if (!regex.test(nomeValue)) {
				alert("O campo Nome completo só permite letras e espaços.");
				return false;
			}

			return true;
		}

		function validateCPF() {
			const cpfInput = document.getElementById("cpf");
			const cpfValue = cpfInput.value.replace(/[^\d]/g, ''); // Remover caracteres sem digitos

			if (cpfValue.length !== 11) {
				alert("CPF inválido. O CPF deve conter exatamente 11 dígitos.");
				return false;
			}


			let sum = 0;
			let remainder;

			if (
				cpfValue === "00000000000" ||
				cpfValue === "11111111111" ||
				cpfValue === "22222222222" ||
				cpfValue === "33333333333" ||
				cpfValue === "44444444444" ||
				cpfValue === "55555555555" ||
				cpfValue === "66666666666" ||
				cpfValue === "77777777777" ||
				cpfValue === "88888888888" ||
				cpfValue === "99999999999"
			) {
				alert("CPF inválido. O CPF não pode ser composto por uma sequência de dígitos iguais.");
				return false;
			}

			for (let i = 1; i <= 9; i++) {
				sum += parseInt(cpfValue.substring(i - 1, i)) * (11 - i);
			}
			remainder = (sum * 10) % 11;

			if (remainder === 10 || remainder === 11) {
				remainder = 0;
			}

			if (remainder !== parseInt(cpfValue.substring(9, 10))) {
				alert("CPF inválido. Verifique se o número foi digitado corretamente.");
				return false;
			}

			sum = 0;
			for (let i = 1; i <= 10; i++) {
				sum += parseInt(cpfValue.substring(i - 1, i)) * (12 - i);
			}
			remainder = (sum * 10) % 11;

			if (remainder === 10 || remainder === 11) {
				remainder = 0;
			}

			if (remainder !== parseInt(cpfValue.substring(10, 11))) {
				alert("CPF inválido. Verifique se o número foi digitado corretamente.");
				return false;
			}

			return true;
		}
	</script>
</body>

</html>