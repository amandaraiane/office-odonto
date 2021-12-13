<?php

include_once("../conexao.php");

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$especializacao = isset($_POST['especializacao']) ? $_POST['especializacao'] : null;




// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($nome)){
    header("location: ./editar.php?id={$id}&msg=Informe o nome do Dentista");
    return;
}

if(empty($email)){
    header("location: ./editar.php?id={$id}&msg=Informe o email");
    return;
}

if(empty($especializacao)){
    header("location: ./editar.php?id={$id}&msg=Informe a especialização");
    return;
}



$sql = "UPDATE dentista SET nome = '$nome', email = '$email', especializacao = '$especializacao' WHERE id = '$id'";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./editar.php?id={$id}&msg=Ocorreu um erro ao salvar o dentista. Email já cadastrado!");
    return;
}else{
    header("location: ./editar.php?id={$id}&success=Dentista alterado com sucesso");
    return;
}

