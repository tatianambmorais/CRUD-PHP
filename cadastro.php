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
			max-width: 1000px;

		}
	</style>
</head>

<body>
	<center>
		<img src="logo.png" alt="logo da empresa Stefanini" width=50%>
		<h1 align=”middle”>Cadastrar</h1>
	</center>
	<div class="container">
		<div class="row">
			<div class="col"></div>
			<form action="cadastro_script.php" method="POST" onsubmit="return validateForm();">
				<div class="form-group">
					<label for="nome" class="form-label">Nome completo</label>
					<input type="text" class="form-control" id="nome" name="nome" required>
				</div>
				<div class="form-group">
					<label for="endereco" class="form-label">Endereço</label>
					<input type="text" class="form-control" id="endereco" name="endereco" required>
				</div>
				<div class="form-group">
					<label for="telefone" class="form-label">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone" required>
				</div>
				<div class="form-group">
					<label for="email" class="form-label">Email</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="nascimento" class="form-label">Nascimento</label>
					<input type="date" class="form-control" id="nascimento" name="data_nascimento" required>
				</div>
				<div class="form-group">
					<label for="cpf" class="form-label">CPF</label>
					<input type="text" class="form-control" id="cpf" name="cpf" required>
				</div>
				<div class="form-group">
					<label for="observacao" class="form-label">Observação</label>
					<input type="text" class="form-control" id="observacao" name="observacao">
				</div>
				<div style="padding-top: 20px;">
					<input type="submit" class="btn btn-success" value="Enviar">
				</div>
				<div style="padding-top: 20px;">
					<a href="pesquisa.php" class="btn btn-info">Lista de usuários cadastrados</a>
				</div>
			</form>
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
		// funções para validar nome
		function validateNome() {
			const nomeInput = document.getElementById("nome");
			const nomeValue = nomeInput.value;
			const regex = /^[a-zA-ZÀ-ÿ\s]+$/; // Expressão regular para permitir letras com acentos e espaços

			if (!regex.test(nomeValue)) {
				alert("O campo Nome completo só permite letras com acento e espaços.");
				return false;
			}

			return true;
		}

		// funções para validar cpf
		function validateCPF() {
			const cpfInput = document.getElementById("cpf");
			const cpfValue = cpfInput.value.replace(/[^\d]/g, ''); // Remover caracteres sem dígitos

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