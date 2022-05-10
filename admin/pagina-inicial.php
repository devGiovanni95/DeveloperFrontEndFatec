<?php
session_start();
if($_SESSION['acesso'] != 'admin'){
	header("location: login.php");
}
?>
<h1>Página inicial</h1>
<p>Seja bem vindo</p>