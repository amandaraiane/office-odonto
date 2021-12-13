<?php

include_once("../conexao.php");

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
    header("location: ./cadastro.php?msg=Informe o nome");
    return;
}

if(empty($cpf)){
    header("location: ./cadastro.php?msg=Informe o cpf");
    return;
}

if(empty($dataNacimento)){
    header("location: ./cadastro.php?msg=Informe a data de nascimento");
    return;
}

if(empty($email)){
    header("location: ./cadastro.php?msg=Informe o e-mail");
    return;
}

if(empty($telefone)){
    header("location: ./cadastro.php?msg=Informe o telefone");
    return;
}

if(empty($cep)){
    header("location: ./cadastro.php?msg=Informe o cep");
    return;
}

if(empty($cidade)){
    header("location: ./cadastro.php?msg=Informe a cidade");
    return;
}

if(empty($endereco)){
    header("location: ./cadastro.php?msg=Informe o endereço");
    return;
}

$sql = "INSERT INTO paciente (nome, cpf, dataNacimento, email, telefone, cep, cidade, endereco) VALUES ('$nome', '$cpf', '$dataNacimento', '$email', '$telefone', '$cep', '$cidade', '$endereco')";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./cadastro.php?msg=Ocorreu um erro ao salvar o paciente. CPF já cadastrado!");
    return;
}else{
    header("location: ./lista.php?msg=Paciente cadastro com sucesso");
    return;
}

