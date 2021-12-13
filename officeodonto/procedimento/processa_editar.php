<?php

include_once("../conexao.php");

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$id_dentista = isset($_POST['id_dentista']) ? $_POST['id_dentista'] : null;


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// return;
if(empty($nome)){
    header("location: ./editar.php?id={$id}&msg=Informe o nome do Procedimento");
    return;
}

if(empty($id_dentista)){
    header("location: ./editar.php?id={$id}&msg=Informe o dentista responsável");
    return;
}



$sql = "UPDATE procedimento SET nome = '$nome', id_dentista = $id_dentista WHERE id = '$id'";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./editar.php?id={$id}&msg=Ocorreu um erro ao salvar o procedimento");
    return;
}else{
    header("location: ./editar.php?id={$id}&success=Procedimento alterado com sucesso");
    return;
}

