<?php include_once("../includes/topo.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h5>Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>
            <h1 class="">Cadastro de Pacientes</h1>
        </div>
        <div class="col-md-4 text-right">
            <a class="btn btn-primary" href="lista.php">CONSULTAR PACIENTES</a>
        </div>
    </div>
    <form method="post" action="processa_cadastrar.php" autocomplete="off">
        <div class="row">
            <?php if(isset($_GET['msg']) && !empty($_GET['msg'])){ ?>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <?php echo $_GET['msg']; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" maxlength="40" required autofocus /><br>
            </div>
            <div class="col-md-4">
                
                <label>CPF</label>
                <input type="number" name="cpf" class="form-control" maxlength="11" required />
            </div>
            <div class="col-md-4">
                <label> Data de Nascimento </label>
                <input type="date" name="dataNacimento" class="form-control" maxlength="12" required>
            </div>
            <div class="col-md-4">
                <label>Email</label>
                <input type="text" name="email" class="form-control" maxlength="40" required><br>
            </div>
            <div class="col-md-4">
                <label>Telefone</label>
                <input type="number" name="telefone" class="form-control" maxlength="12" required>
            </div>
            <div class="col-md-4">
                <label>CEP</label>
                <input type="number" name="cep" class="form-control" maxlength="12" required>
            </div>
            <div class="col-md-4">
                <label>Cidade</label>
                <input type="text" name="cidade" class="form-control" maxlength="40" required><br>
            </div>
            <div class="col-md-4">
                <label> Endereço</label>
                <input type="text" name="endereco" class="form-control" maxlength="50" required>
            </div>
            <div class="col-md-12 text-right">
                <button type="reset" class="btn btn-dark">LIMPAR</button>
                <button type="submit" class="btn btn-success">SALVAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once("../includes/rodape.php") ?>