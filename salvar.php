<!DOCTYPE html>
<html>
<head>
    <title>Salvar Contato</title>

    <style>
        body{
            background:#0b1f3a;
            color:#ffffff;
            font-family: Arial;
            text-align:center;
            margin-top:50px;
        }
        a{
            color:#1e90ff;
            font-size:18px;
            text-decoration:none;
        }

        .btn{
    display:inline-block;
    margin-top:20px;
    padding:10px 20px;
    background:#1e90ff;
    color:white;
    border-radius:6px;
    text-decoration:none;
}
.btn:hover{
    background:#0066cc;
}
    </style>

</head>
<?php

include ('conexao.php');

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$fone = $_POST['fone'];

$sql = "INSERT INTO contatos (nome, endereco, telefone) 
VALUES ('$nome', '$endereco', '$fone')";

if (mysqli_query($conexao, $sql)){
    echo "<h2>Cadastro realizado com sucesso!</h2>";
  echo "<a href='index.php' class='btn'>Voltar</a>";
}else {
    echo "<h2>Erro ao salvar o contato!</h2>". mysqli_error($conexao);
   echo "<a href='index.php' class='btn'>Voltar</a>";


}

