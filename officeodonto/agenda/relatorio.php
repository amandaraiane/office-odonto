<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" 
      type="image/png" 
      href="../img/fav.png">
      <title>Relatório de agenda</title>
      <?php session_start(); ?>
  <?php 
  
  if(!isset($_SESSION["usuario"])){
    header(("location: ../"));
    return;
  }
  ?>
<?php
include_once("../conexao.php");
date_default_timezone_set('America/Sao_Paulo');
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
 
$sql = "SELECT agenda.*, paciente.nome AS nome_paciente, dentista.nome AS nome_dentista, procedimento.nome AS nome_procedimento from agenda
INNER JOIN paciente ON paciente.id = agenda.id_paciente
INNER JOIN dentista ON dentista.id = agenda.id_dentista
INNER JOIN procedimento ON procedimento.id = agenda.id_procedimento
 where paciente.nome like '%$filtro%' order by paciente.nome asc";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);
?>
<div class="container"><br>
    
    <h2 class="">Relatório de Consultas</h2>
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
                Filtrar por paciente:
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
                <th>Paciente</th>
                <th>Dentista responsável</th>
                <th>Procedimento</th>
                <th>Data</th>
                <th>Status</th>
                <th>Observação</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($agenda = mysqli_fetch_assoc($consulta)) { ?>
                <tr>
                    <th><?php echo $agenda['id']; ?></th>
                    <td><?php echo $agenda['nome_paciente']; ?></td>
                    <td><?php echo $agenda['nome_dentista']; ?></td>
                    <td><?php echo $agenda['nome_procedimento']; ?></td>
                    <td>
                        <?php echo date("d/m/Y", strtotime($agenda['data_agenda'])); ?>
                        <?php echo $agenda['horario']; ?>
                    </td>
                    <td><?php echo $agenda['status']; ?></td>
                    <td><?php echo $agenda['observacao']; ?></td>
                   
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
 

