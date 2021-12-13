<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="icon" 
      type="image/png" 
      href="../img/fav.png">
      <title>Relatório de funcinários</title>
 
      <?php session_start(); ?>
  <?php 
  
  if(!isset($_SESSION["usuario"])){
    header(("location: ../"));
    return;
  }
  ?>
<?php
include_once("../conexao.php");
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
 
$sql = "select * from funcionario where nome like '%$filtro%' order by nome";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);
?>
<div class="container"><br>
 
    <h2 class="">Relatório de Funcionários cadastrados</h2>
    <div class="canto">
        <img src="../img/logo-relatório.png" alt="">
        <style>
            img{
                width: 200px;
            }
            .canto {
                position: fixed;
                top: 15px;
                width: 35px;
                z-index: 100;
                right: 400px;
            }
        </style>
    </div>
    <hr>
    <form method="get" action="">
        <?php if (isset($_GET['msg']) && !empty($_GET['msg'])) { ?>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <?php echo $_GET['msg']; ?>
                </div>
            </div>
        <?php } ?>
 
        <div class="col-md-12">
            <label>
                Filtrar por nome:
            </label>
            <div class="input-group">
                <input type="text" name="filtro" class="form-control" autofocus>
                <div class="col-md-4">
                <div class="input-group-pp">
                    <button class="btn btn-primary">Pesquisar</button>
                </div>
                </div>
            </div>
            <?php if (isset($_GET['filtro']) && !empty($_GET['filtro'])) { ?>
                <small>
                    Resultado da pesquisa com a palavra <strong><?php echo $filtro; ?></strong>.
                </small>
            <?php } ?>
        </div>
        
    </form>
    <table class="mt-2 border  table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Cargo</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($funcionario = mysqli_fetch_assoc($consulta)) { ?>
                <tr>
                    <th><?php echo $funcionario['id']; ?></th>
                    <td><?php echo $funcionario['nome']; ?></td>
                    <td><?php echo $funcionario['email']; ?></td>
                    <td><?php echo $funcionario['cargo']; ?></td>
                   
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-right"><?php echo $registros; ?> registros encontrados</div>
    <div class="fixed-bottom">
        
        <?php date_default_timezone_set('America/Sao_Paulo');
        echo('Relatório gerado no dia ');
        echo date('d/m/Y \à\s H:i:s')?> 
        <?php echo('pelo usuário  ');?>
        <strong><?php echo $_SESSION["usuario"]["nome"];?></strong>
    </div>
 
    <div class="fixed-bottom">
        <div class="text-right"> <?php echo('Página 1 de 1 ');?></div>
    </div>
    
    <button class="btn btn-dark" onClick="window.print();">IMPRIMIR</button>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>

