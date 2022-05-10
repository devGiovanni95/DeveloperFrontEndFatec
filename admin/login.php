<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/conta.png">

    <title>Login</title>

    <!-- Principal CSS do Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!-- Estilos customizados para esse template -->
    <link href="../css/signin.css" rel="stylesheet" type=>
  </head>

  <body class="text-center">
    <div class="container mt-5">

    <form class="form-signin" method="post">
      <img class="mb-4" src="../img/do-utilizador.png" alt="imagem do usuario" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
      <label for="inputEmail" class="sr-only">Endereço de email</label>

      <input type="email" id="inputEmail" class="form-control mb-4" placeholder="Seu email" required autofocus name="txtEmail">

      <label for="inputPassword" class="sr-only">Senha</label>

      <input type="password" id="inputPassword" class="form-control mb-4" placeholder="Senha" required name="txtSenha">

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar de mim
        </label>
      </div>

      <input class="btn btn-lg btn-primary btn-block" type="submit" name="btnLogar" value="Login">

      <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
     





<?php
if (filter_input(INPUT_POST, 'btnLogar')) {
    $email = filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'txtSenha', FILTER_SANITIZE_STRING);

    include_once '../class/Usuario.php';
    $user = new Usuario();

    $user->setEmail($email);
    $user->setSenha($senha);

    IF($user->consultar() > 0){
      session_start();

      $_SESSION['acesso']='admin';
      //redirecionar pagina
      header("location:index.php");
      }else{
        $_SESSION['acesso']='';
        //mensagem de erro
      ?>
  

      <div class="alert alert-danger" role="alert">
        <h3>Erro ao Logar</h3>
        <p>Usuário e/ou senha inválidos</p>
        <p>Tente novamente</p>
      </div>
 </div>    
   </body>
</html>
</html>
      <?php

      }
}