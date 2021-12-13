<?php
include_once("../conexao.php");
include_once("../includes/topo.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT procedimento.*, dentista.nome AS nome_dentista FROM procedimento INNER JOIN dentista ON dentista.id = procedimento.id_dentista WHERE procedimento.id = '$id'";
$consulta = mysqli_query($conexao, $sql);
$existe = mysqli_num_rows($consulta);
if ($existe == 0) {
    $procedimento = false;
} else {
    $procedimento = mysqli_fetch_assoc($consulta);
}
?>

<div class="container">
    <h5>Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>

    <?php if (!$procedimento) { ?>
        <h6 class="text-danger">Procedimento não encontrado!</h6>
        <a href="./lista.php" class="btn btn-primary">VOLTAR</a>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-8">
                <h1 class="">Detalhes do procedimento</h1>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-dark" href="lista.php">VOLTAR</a>
            </div>
        </div>
        <form method="post" action="processa_editar.php" autocomplete="off">
            <div class="row">
                <input type="hidden" name="id" value="<?php echo $procedimento['id']; ?>">
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
                    <label>Nome</label>
                    <input type="text" value="<?php echo $procedimento['nome']; ?>" name="nome" class="form-control" maxlength="40" /><br>
                </div>

                <div class="col-md-4">
                    <label>Dentista responsável</label>
                    <select value="<?php echo $procedimento['id_dentista']; ?>" name="id_dentista" class="form-control">
                        <option value="<?php echo $procedimento['id']; ?>"><?php echo $procedimento['nome_dentista']; ?></option>
                        <?php
                        $sql = "select * from dentista order by nome asc";
                        $dentistas = mysqli_query($conexao, $sql);
                        ?>
                        <?php while ($dentista = mysqli_fetch_assoc($dentistas)) { ?>
                            <?php if ($dentista['id'] != $procedimento['id_dentista']) { ?>
                                <option value="<?php echo $dentista['id']; ?>"><?php echo $dentista['nome']; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-8 text-right">
                <button type="reset" class="btn btn-dark">LIMPAR</button>
                <button type="submit" class="btn btn-success">SALVAR</button>
            </div>
        </form>

    <?php } ?>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>