<?php

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $check_senha = $_POST['check-senha'];

    if($senha != $check_senha){
        die("As senhas não correspondem.");
    }

    $host = "localhost";
    $banco = "formularioteste";
    $user = "root";
    $senha_user = "";

    $con = mysqli_connect($host, $user, $senha_user, $banco);

    if(!$con){
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO clientes(nome, cpf, senha) VALUES('$nome', '$cpf', '$senha')";

    $rs = mysqli_query($con, $sql);

    if($rs){
        echo "Você foi cadastrado com sucesso.";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($con);
    }

    mysqli_close($con); // Fechar a conexão após o uso
}
?>