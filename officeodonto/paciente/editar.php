<?php
include_once("../conexao.php");
include_once("../includes/topo.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "SELECT * FROM paciente WHERE id = '$id'";
$consulta = mysqli_query($conexao, $sql);
$existe = mysqli_num_rows($consulta);
if ($existe == 0) {
    $paciente = false;
} else {
    $paciente = mysqli_fetch_assoc($consulta);
}
?>

<div class="container">

    <?php if (!$paciente) { ?>
        <h6 class="text-danger">Paciente não encontrado!</h6>
        <a href="./lista.php" class="btn btn-primary">VOLTAR</a>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-8">
            <h5>Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>
                <h1 class="">Detalhes do paciente</h1>
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
                <div class="col-md-12">
                    <label>Nome</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $paciente['id']; ?>" />
                    <input type="text" name="nome" class="form-control" maxlength="40" value="<?php echo $paciente['nome']; ?>" required autofocus /><br>
                </div>
                <div class="col-md-4">
                    <label>CPF</label>
                    <input type="number" name="cpf" class="form-control" maxlength="11" value="<?php echo $paciente['cpf']; ?>" required />
                </div>
                <div class="col-md-4">
                    <label> Data de Nascimento </label>
                    <input type="date" name="dataNacimento" class="form-control" maxlength="12" value="<?php echo $paciente['dataNacimento']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" maxlength="40" value="<?php echo $paciente['email']; ?>" required><br>
                </div>
                <div class="col-md-4">
                    <label>Telefone</label>
                    <input type="number" name="telefone" class="form-control" maxlength="12" value="<?php echo $paciente['telefone']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label>CEP</label>
                    <input type="number" name="cep" class="form-control" maxlength="12" value="<?php echo $paciente['cep']; ?>" required>
                </div>
                <div class="col-md-4">
                    <label>Cidade</label>
                    <input type="text" name="cidade" class="form-control" maxlength="40" value="<?php echo $paciente['cidade']; ?>" required><br>
                </div>
                <div class="col-md-4">
                    <label> Endereço</label>
                    <input type="text" name="endereco" class="form-control" maxlength="50" value="<?php echo $paciente['endereco']; ?>" required>
                </div>
                <div class="col-md-12 text-right">
                    <button type="reset" class="btn btn-dark">LIMPAR</button>
                    <button type="submit" class="btn btn-success">SALVAR</button>
                </div>
            </div>
        </form>
    
    <?php } ?>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>