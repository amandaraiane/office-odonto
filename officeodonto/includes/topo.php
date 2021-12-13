<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="icon" 
      type="image/png" 
      href="../img/fav.png">
  <title>Office Odonto</title>
</head>

<body>

  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="../agenda/cadastro.php">Cadastrar Cosulta</a>
    </li>
   
    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">CADASTROS</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../dentista/cadastro.php">Dentista</a></li>
        <li><a class="dropdown-item" href="../paciente/cadastro.php">Paciente</a></li>
        <li><a class="dropdown-item" href="../procedimento/cadastro.php">Procedimento</a></li>
        <li><a class="dropdown-item" href="../funcionario/cadastro.php">Funcionário</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">LISTAGENS</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../dentista/lista.php">Dentista</a></li>
        <li><a class="dropdown-item" href="../paciente/lista.php">Paciente</a></li>
        <li><a class="dropdown-item" href="../procedimento/lista.php">Procedimento</a></li>
        <li><a class="dropdown-item" href="../funcionario/lista.php">Funcionário</a></li>
        <li><a class="dropdown-item" href="../agenda/lista.php">Agenda</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">RELATÓRIOS</a>
      <ul class="dropdown-menu">
          <li><a class="dropdown-item" target="_blank" href="../agenda/relatorio.php">Consultas</a></li>
          <li><a class="dropdown-item" target="_blank" href="../dentista/relatorio.php">Dentista</a></li>
          <li><a class="dropdown-item" target="_blank" href="../paciente/relatorio.php">Paciente</a></li>
          <li><a class="dropdown-item" target="_blank" href="../procedimento/relatorio.php">Procedimento</a></li>
          <li><a class="dropdown-item" target="_blank" href="../funcionario/relatorio.php">Funcionario</a></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="btn btn-danger" aria-current="page" href="../login/logout.php">SAIR</a>
    </li>

  </ul>

  <?php session_start(); ?>
  <?php 
  
  if(!isset($_SESSION["usuario"])){
    header(("location: ../"));
    return;
  }
  ?>