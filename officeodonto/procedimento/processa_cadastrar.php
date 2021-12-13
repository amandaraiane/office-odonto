<?php

include_once("../conexao.php");

$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$id_dentista = isset($_POST['id_dentista']) ? $_POST['id_dentista'] : null;


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($nome)){
    header("location: ./cadastro.php?msg=Informe o nome do procedimento");
    return;
}

if(empty($id_dentista)){
    header("location: ./cadastro.php?msg=Informe o dentista responsável");
    return;
}



$sql = "INSERT INTO procedimento (nome, id_dentista) VALUES ('$nome', '$id_dentista')";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./cadastro.php?msg=Ocorreu um erro ao salvar o procedimento");
    return;
}else{
    header("location: ./lista.php?msg=Procedimento cadastro com sucesso");
    return;
}

