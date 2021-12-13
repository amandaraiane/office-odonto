<?php

include_once("../conexao.php");

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : null;


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($nome)){
    header("location: ./cadastro.php?msg=Informe o nome do funcionário");
    return;
}

if(empty($email)){
    header("location: ./cadastro.php?msg=Informe o email");
    return;
}

if(empty($cargo)){
    header("location: ./cadastro.php?msg=Informe o cargo");
    return;
}


$sql = "INSERT INTO funcionario (nome, email, cargo) VALUES ('$nome', '$email', '$cargo')";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./cadastro.php?msg=Ocorreu um erro ao salvar o funcionário. Email já cadastrado!");
    return;
}else{
    header("location: ./lista.php?msg=Funcionário cadastro com sucesso");
    return;
}

