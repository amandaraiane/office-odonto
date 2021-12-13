<?php
include_once("../conexao.php");
include_once("../includes/topo.php");
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
<div class="container">
    <h5>Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>
    <h1 class="">Listar Agenda</h1>
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
                <th>Ações</th>
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
                    <td>
                        <a href="./editar.php?id=<?php echo $agenda['id']; ?>" class="btn btn-primary">EDITAR</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-right"><?php echo $registros; ?> registros encontrados</div>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>