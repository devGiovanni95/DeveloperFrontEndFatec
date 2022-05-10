<?php
session_start();
if($_SESSION['acesso'] != 'admin'){
	header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
		<a class="navbar-brand" href="#">
			Admin
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="?p=pagina-inicial">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="?p=categoria/listar">Categoria</a>
				</li>

					<li class="nav-item">
					<a class="nav-link" href="?p=categoria/logout">Logout</a>
				</li>

				<div>
			</ul>			
		</div>
	</nav>

	<div class="container mt-3">
		<div class="row">
			<div class="col-12">
				<?php
				$pagina = filter_input(INPUT_GET, 'p');

				if (empty($pagina) || $pagina == 'index') {
					include_once 'pagina-inicial.php';
				}else{
					if (file_exists($pagina . '.php')) {
						include_once $pagina . '.php';
					}else{
						?>
						<div class="alert alert-danger" role="alert">
							<h1>Erro 404</h1>
							<p>Página não encontrada</p>
							<img src="../img/alerta.png">
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="../js/script.js"></script>
</body>
</html>