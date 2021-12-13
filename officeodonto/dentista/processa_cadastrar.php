<?php

include_once("../conexao.php");

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$especializacao = isset($_POST['especializacao']) ? $_POST['especializacao'] : null;


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($nome)){
    header("location: ./cadastro.php?msg=Informe o nome do dentista");
    return;
}

if(empty($email)){
    header("location: ./cadastro.php?msg=Informe o email");
    return;
}

if(empty($especializacao)){
    header("location: ./cadastro.php?msg=Informe a especialização");
    return;
}


$sql = "INSERT INTO dentista (nome, email, especializacao) VALUES ('$nome', '$email', '$especializacao')";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./cadastro.php?msg=Ocorreu um erro ao salvar o dentista. Email já cadastrado!");
    return;
}else{
    header("location: ./lista.php?msg=Dentista cadastrado com sucesso");
    return;
}

