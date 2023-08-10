<!doctype html>
<html lang="PT-BR" dir="rtl">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Alteração de cadastro</title>
</head>

<body>
	<center>
		<img src="logo.png" alt="logo da empresa Stefanini" width=50%>
		<h1>Alteração de cadastro</h1>
	</center>
	<div class="container">
		<div class="row">
			<?php
			include "conexao.php";
			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$endereco = $_POST['endereco'];
			$telefone = $_POST['telefone'];
			$email = $_POST['email'];
			$data_nascimento = $_POST['data_nascimento'];
			$cpf = $_POST['cpf'];
			$observacao = $_POST['observacao'];


			?>
			<a href="cadastro.php" class="btn btn-primary">Voltar</a>
			<a href="cadastro.php" class="btn btn-info">Página de cadastro</a>
		</div>
	</div>


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
			const regex = /^[a-zA-Z\s]+$/;

			if (!regex.test(nomeValue)) {
				alert("O campo Nome completo só permite letras e espaços.");
				return false;
			}

			return true;
		}

		function validateCPF() {
			const cpfInput = document.getElementById("cpf");
			const cpfValue = cpfInput.value.replace(/[^\d]/g, '');

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