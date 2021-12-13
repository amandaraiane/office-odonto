<?php
include_once("../conexao.php");
include_once("../includes/topo.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM dentista WHERE id = '$id'";
$consulta = mysqli_query($conexao, $sql);
$existe = mysqli_num_rows($consulta);
if ($existe == 0) {
    $dentista = false;
} else {
    $dentista = mysqli_fetch_assoc($consulta);
}
?>

<div class="container">
<h5>Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>

    <?php if (!$dentista) { ?>
        <h6 class="text-danger">Dentista não encontrado!</h6>
        <a href="./lista.php" class="btn btn-primary">VOLTAR</a>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-8">
                <h1 class="">Detalhes do dentista</h1>
            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-dark" href="lista.php">VOLTAR</a>
            </div>
        </div>
        <form method="post" action="processa_editar.php" autocomplete="off">
            <div class="row">
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
                <div class="col-md-8">
                    <label>Nome</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $dentista['id']; ?>" />
                    <input type="text" name="nome" class="form-control" maxlength="40" value="<?php echo $dentista['nome']; ?>" required autofocus /><br>
                </div>
                <div class="col-md-8">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" maxlength="50" value="<?php echo $dentista['email']; ?>" required /><br>
                </div>
                <div class="col-md-8">
                    <label>Especialização</label>
                    <input type="text" name="especializacao" class="form-control" maxlength="40" value="<?php echo $dentista['especializacao']; ?>" required /><br>
                </div>

                <div class="col-md-8 text-right">
                    <button type="reset" class="btn btn-dark">LIMPAR</button>
                    <button type="submit" class="btn btn-success">SALVAR</button>
                </div>
            </div>
        </form>
        
    <?php } ?>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>