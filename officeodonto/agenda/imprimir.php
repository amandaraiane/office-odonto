

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilo.css">
<?php
include_once("../conexao.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT agenda.*, paciente.nome AS nome_paciente, dentista.nome AS nome_dentista, procedimento.nome AS nome_procedimento from agenda
INNER JOIN paciente ON paciente.id = agenda.id_paciente
INNER JOIN dentista ON dentista.id = agenda.id_dentista
INNER JOIN procedimento ON procedimento.id = agenda.id_procedimento
 WHERE agenda.id = '$id'";
$consulta = mysqli_query($conexao, $sql);
$existe = mysqli_num_rows($consulta);
if ($existe == 0) {
    $agenda = false;
} else {
    $agenda = mysqli_fetch_assoc($consulta);
}
?>

<div class="container">

    <?php if (!$agenda) { ?>
        <h6 class="text-danger">Agenda não encontrada!</h6>
        <a href="./lista.php" class="btn btn-primary">VOLTAR</a>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-8">
                <h1 class="">Detalhes da consulta</h1>
            </div>
        </div>
        <form method="post" action="processa_editar.php" autocomplete="off">
            <div class="row">
                <input type="hidden" name="id" value="<?php echo $agenda['id']; ?>">
                <?php if (isset($_GET['msg']) && !empty($_GET['msg'])) { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <?php echo $_GET['msg']; ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-md-4">
                    <label>Paciente</label>
                    <?php echo $agenda['nome_paciente']; ?>
                </div>
                <div class="col-md-4">
                    <label>Dentista responsável</label>
                    <?php echo $agenda['nome_dentista']; ?>
                </div>
                <div class="col-md-4">
                    <label>Procedimento</label>
                    <?php echo $agenda['nome_procedimento']; ?>
                </div>
                <div class="col-md-4">
                    <label>Data</label>
                    <?php echo date("d/m/Y", strtotime($agenda['data_agenda'])); ?>
                </div>
                <div class="col-md-4">
                    <label>Horário</label>
                    <?php echo $agenda['horario']; ?>
                </div>
                <div class="col-md-4">
                    <label>Observação</label>
                    <?php echo $agenda['observacao']; ?>
                </div>

                <div class="col-md-4">
                    <label>Stats</label>
                    <?php echo $agenda['status']; ?>
                </div>
            </div>
        </form>
        <button class="btn btn-dark" onClick="window.print();">IMPRIMIR</button>
    <?php } ?>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>