<?php

include_once("../conexao.php");

$id = isset($_POST['id']) ? $_POST['id'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null;
$dataNacimento = isset($_POST['dataNacimento']) ? $_POST['dataNacimento'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($nome)){
    header("location: ./editar.php?id={$codigo}&msg=Informe o nome");
    return;
}

if(empty($cpf)){
    header("location: ./editar.php?id={$codigo}&msg=Informe o cpf");
    return;
}

if(empty($dataNacimento)){
    header("location: ./editar.php?id={$codigo}&msg=Informe a data de nascimento");
    return;
}

if(empty($email)){
    header("location: ./editar.php?id={$codigo}&msg=Informe o e-mail");
    return;
}

if(empty($telefone)){
    header("location: ./editar.php?id={$codigo}&msg=Informe o telefone");
    return;
}

if(empty($cep)){
    header("location: ./editar.php?id={$codigo}&msg=Informe o cep");
    return;
}

if(empty($cidade)){
    header("location: ./editar.php?id={$codigo}&msg=Informe a cidade");
    return;
}

if(empty($endereco)){
    header("location: ./editar.php?id={$codigo}&msg=Informe o endereço");
    return;
}

$sql = "UPDATE paciente SET nome = '$nome', cpf = '$cpf', dataNacimento = '$dataNacimento', email = '$email', telefone = '$telefone', cep = '$cep', cidade = '$cidade', endereco = '$endereco' WHERE id = '$id'";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./editar.php?id={$id}&msg=Ocorreu um erro ao salvar o paciente. CPF já cadastrado!");
    return;
}else{
    header("location: ./editar.php?id={$id}&success=Paciente alterado com sucesso");
    return;
}

