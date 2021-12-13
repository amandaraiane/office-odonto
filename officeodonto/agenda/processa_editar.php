<?php

include_once("../conexao.php");

$id = isset($_POST['id']) ? $_POST['id'] : null;
$id_paciente = isset($_POST['id_paciente']) ? $_POST['id_paciente'] : null;
$id_dentista = isset($_POST['id_dentista']) ? $_POST['id_dentista'] : null;
$id_procedimento = isset($_POST['id_procedimento']) ? $_POST['id_procedimento'] : null;
$data_agenda = isset($_POST['data_agenda']) ? $_POST['data_agenda'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : null;





// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// if(empty($id_paciente)){
//     header("location: ./editar.php?id={$id}&msg=Informe o nome do paciente");
//     return;
// }

// if(empty($id_paciente)){
//     header("location: ./editar.php?id={$id}&msg=Informe o nome do paciente");
//     return;
// }

// if(empty($id_dentista)){
//     header("location: ./editar.php?id={$id}&msg=Informe o dentista responsável");
//     return;
// }

// if(empty($id_procedimento)){
//     header("location: ./editar.php?id={$id}&msg=Informe o procedimento");
//     return;
// }

// if(empty($data_agenda)){
//     header("location: ./editar.php?id={$id}&msg=Informe a data");
//     return;
// }

if(empty($status)){
    header("location: ./editar.php?id={$id}&msg=Informe o status");
    return;
}

if(empty($observacao)){
    $observacao = null;
}


$sql = "UPDATE agenda SET status = '$status', observacao = '$observacao' WHERE id = '$id'";

// $sql = "UPDATE agenda SET id_paciente = '$id_paciente', id_dentista = '$id_dentista', id_procedimento = '$id_procedimento', data_agenda = '$data_agenda' WHERE id = '$id'";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./editar.php?id={$id}&msg=Ocorreu um erro ao salvar a consulta ");
    return;
}else{
    header("location: ./editar.php?id={$id}&success=Consulta alterada com sucesso");
    return;
}

