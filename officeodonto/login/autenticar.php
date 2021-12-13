<?php

include_once("../conexao.php");

$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if(empty($email)){
    header("location: ../?msg=Informe o e-mail");
    return;
}

if(empty($senha)){
    header("location: ../?msg=Informe a senha");
    return;
}



$senha = md5($senha);

$sql = "SELECT *  FROM usuario WHERE email = '$email' AND senha = '$senha'";

$consulta = mysqli_query($conexao,$sql);

$existe = mysqli_num_rows($consulta);
if ($existe == 0) {
    mysqli_close($conexao);
    header("location: ../?msg=Usuário não encontrado!");
    return;
} else {
    $usuario = mysqli_fetch_assoc($consulta);
    
    session_start();
    $_SESSION["usuario"] = $usuario;

    mysqli_close($conexao);
    header("location: ../agenda/lista.php");
    return;
}



