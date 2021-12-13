<?php
include_once("../conexao.php");
include_once("../includes/topo.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM agenda WHERE id = '$id'";
$consulta = mysqli_query($conexao, $sql);
$existe = mysqli_num_rows($consulta);
if ($existe == 0) {
    $agenda = false;
} else {
    $agenda = mysqli_fetch_assoc($consulta);
}
?>

<div class="container">
<h5>Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>

    <?php if (!$agenda) { ?>
        <h6 class="text-danger">Agenda não encontrada!</h6>
        <a href="./lista.php" class="btn btn-primary">VOLTAR</a>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-8">
                <h1 class="">Detalhes da consulta</h1>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-dark" href="lista.php">VOLTAR</a>
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
                <?php if (isset($_GET['success']) && !empty($_GET['success'])) { ?>
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <?php echo $_GET['success']; ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md-4">
                    <label>Paciente</label>
                    <select value="<?php echo $agenda['id_paciente']; ?>" name="id_paciente" class="form-control" disabled>
                        <?php
                        $sql = "select * from paciente order by nome asc";
                        $pacientes = mysqli_query($conexao, $sql);
                        ?>
                        <?php while ($paciente = mysqli_fetch_assoc($pacientes)) { ?>
                            <option value="<?php echo $paciente['id']; ?>"><?php echo $paciente['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Dentista responsável</label>
                    <select value="<?php echo $agenda['id_dentista']; ?>" name="id_dentista" class="form-control" disabled>
                        <?php
                        $sql = "select * from dentista order by nome asc";
                        $dentistas = mysqli_query($conexao, $sql);
                        ?>
                        <?php while ($dentista = mysqli_fetch_assoc($dentistas)) { ?>
                            <option value="<?php echo $dentista['id']; ?>"><?php echo $dentista['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Procedimento</label>
                    <select value="<?php echo $agenda['id_procedimento']; ?>" name="id_procedimento" class="form-control" disabled>
                        <?php
                        $sql = "select * from procedimento order by nome asc";
                        $procedimentos = mysqli_query($conexao, $sql);
                        ?>
                        <?php while ($procedimento = mysqli_fetch_assoc($procedimentos)) { ?>
                            <option value="<?php echo $procedimento['id']; ?>"><?php echo $procedimento['nome']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Data</label>
                    <input disabled type="date" value="<?php echo $agenda['data_agenda']; ?>" name="data_agenda" class="form-control" maxlength="40" /><br>
                </div>
                <div class="col-md-4">
                    <label>Horário</label>
                    <input disabled type="time" value="<?php echo $agenda['horario']; ?>" name="horario" class="form-control" maxlength="40" /><br>
                </div>
                <div class="col-md-4">
                    <label>Observação</label>
                    <textarea name="observacao" class="form-control" cols="30" rows="3"><?php echo $agenda['observacao']; ?></textarea>
                </div>

                <div class="col-md-4">
                    <label>Status</label>
                    <select value="<?php echo $agenda['status']; ?>" name="status" class="form-control">
                    <?php if($agenda['status'] == 'PENDENTE'){ ?>
                        <option value="PENDENTE">PENDENTE</option>
                        <option value="CONCLUIDO">CONCLUÍDO</option>
                        <option value="CANCELADO">CANCELADO</option>
                    <?php } ?>
                    <?php if($agenda['status'] == 'CONCLUIDO'){ ?>
                        <option value="CONCLUIDO">CONCLUÍDO</option>
                        <option value="PENDENTE">PENDENTE</option>
                        <option value="CANCELADO">CANCELADO</option>
                    <?php } ?>
                    <?php if($agenda['status'] == 'CANCELADO'){ ?>
                        <option value="CANCELADO">CANCELADO</option>
                        <option value="PENDENTE">PENDENTE</option>
                        <option value="CONCLUIDO">CONCLUÍDO</option>
                    <?php } ?>
                    </select><br>
                </div>

                
            </div>
            <div class="col-md-12 text-right">
                    <button type="reset" class="btn btn-dark">LIMPAR</button>
                    <button type="submit" class="btn btn-success">SALVAR</button>
                </div>
        </form>
        <a class="btn btn-dark" target="_blank"  href="imprimir.php?id=<?php echo $agenda['id']; ?>">IMPRIMIR</a>
    <?php } ?>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>