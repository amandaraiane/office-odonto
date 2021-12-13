<?php include_once("../conexao.php"); ?>
<?php include_once("../includes/topo.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <h5>Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>
            <h1 class="">Agendar Consulta</h1>
            
        </div>
        <div class="col-md-8 text-right">
            <a class="btn btn-primary" href="lista.php">CONSULTAR AGENDA</a>
        </div>
    </div>
    <form method="post" action="processa_cadastrar.php" autocomplete="off">
        <div class="row">
            <?php if (isset($_GET['msg']) && !empty($_GET['msg'])) { ?>
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <?php echo $_GET['msg']; ?>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-4">
                <label>Paciente</label>
                <select name="id_paciente" class="form-control">
                    <option value="">SELECIONE...</option>
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
                <select name="id_dentista" class="form-control">
                    <option value="">SELECIONE...</option>
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
                <select name="id_procedimento" class="form-control">
                    <option value="">SELECIONE...</option>
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
                <input type="date" name="data_agenda" class="form-control" maxlength="40"  /><br>
            </div>
            <div class="col-md-4">
                <label>Horário</label>
                <input type="time" name="horario" class="form-control" maxlength="40"  /><br>
            </div>
            <div class="col-md-4">
                <label>Observação</label>
                <textarea name="observacao" class="form-control" cols="30" rows="3"></textarea>
            </div>

            <div class="col-md-12 text-right"> <br>
                <button type="reset" class="btn btn-dark">LIMPAR</button>
                <button type="submit" class="btn btn-success">SALVAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once("../includes/rodape.php") ?>