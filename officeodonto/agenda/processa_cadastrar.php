<?php

include_once("../conexao.php");

$id_paciente = isset($_POST['id_paciente']) ? $_POST['id_paciente'] : null;
$id_dentista = isset($_POST['id_dentista']) ? $_POST['id_dentista'] : null;
$id_procedimento = isset($_POST['id_procedimento']) ? $_POST['id_procedimento'] : null;
$data_agenda = isset($_POST['data_agenda']) ? $_POST['data_agenda'] : null;
$horario = isset($_POST['horario']) ? $_POST['horario'] : null;
$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : null;


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($id_paciente)){
    header("location: ./cadastro.php?msg=Informe o nome do paciente");
    return;
}

if(empty($id_dentista)){
    header("location: ./cadastro.php?msg=Informe o dentista responsável");
    return;
}

if(empty($id_procedimento)){
    header("location: ./cadastro.php?msg=Informe o procedimento");
    return;
}

if(empty($data_agenda)){
    header("location: ./cadastro.php?msg=Informe a data");
    return;
}

if(empty($horario)){
    header("location: ./cadastro.php?msg=Informe o horário");
    return;
}

if(empty($observacao)){
    $observacao = null;
}

$sqlAgendaNoMesmoDia = "SELECT id FROM agenda WHERE data_agenda = '$data_agenda' AND horario = '$horario'";
$consultaAgendaNoMesmoDia = mysqli_query($conexao, $sqlAgendaNoMesmoDia);
$existeAgendaNoMesmoDia = mysqli_num_rows($consultaAgendaNoMesmoDia);
if($existeAgendaNoMesmoDia > 0){
  header("location: ./cadastro.php?msg=Horario não disponível para o dia escolhido.");
  return;
}

$sql = "INSERT INTO agenda (id_paciente, id_dentista, id_procedimento, data_agenda, horario, observacao)
 VALUES ('$id_paciente', '$id_dentista', '$id_procedimento', '$data_agenda', '$horario', '$observacao')";

$salvar = mysqli_query($conexao,$sql);

mysqli_close($conexao);

if(!$salvar){
    header("location: ./cadastro.php?msg=Ocorreu um erro ao salvar a consulta");
    return;
}else{
    header("location: ./lista.php?msg=Cosulta  agendada com sucesso");
    return;
}

