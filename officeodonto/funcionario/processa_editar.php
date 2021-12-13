<?php

include_once("../conexao.php");

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;




// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($nome)){
    header("location: ./editar.php?id={$id}&msg=Informe o nome do Funcionário");
    return;
}

if(empty($email)){
    header("location: ./editar.php?id={$id}&msg=Informe o email");
    return;
}

if(empty($cargo)){
    header("location: ./editar.php?id={$id}&msg=Informe o cargo");
    return;
}



$sql = "UPDATE funcionario SET nome = '$nome', email = '$email', cargo = '$cargo' WHERE id = '$id'";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./editar.php?id={$id}&msg=Ocorreu um erro ao salvar o funcionário. Email já cadastrado!");
    return;
}else{
    header("location: ./editar.php?id={$id}&success=Funcionário alterado com sucesso");
    return;
}

