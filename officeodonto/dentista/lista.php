<?php
include_once("../conexao.php");
include_once("../includes/topo.php");

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";

$sql = "select * from dentista where nome like '%$filtro%' order by nome";
$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);
?>
<div class="container">
<h5>  Olá, <?php echo $_SESSION["usuario"]["nome"]; ?></h5>
    <h1 class="">Listar Dentistas</h1>
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
                <th>Escpecializações</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dentista = mysqli_fetch_assoc($consulta)) { ?>
                <tr>
                    <th><?php echo $dentista['id']; ?></th>
                    <td><?php echo $dentista['nome']; ?></td>
                    <td><?php echo $dentista['email']; ?></td>
                    <td><?php echo $dentista['especializacao']; ?></td>
                    <td>
                        <a href="./editar.php?id=<?php echo $dentista['id']; ?>" class="btn btn-primary">EDITAR</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="text-right"><?php echo $registros; ?> registros encontrados</div>
    <?php mysqli_close($conexao); ?>
</div>
<?php include_once("../includes/rodape.php") ?>