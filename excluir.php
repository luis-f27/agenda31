
<!DOCTYPE html>
<html>
<head>
    <title>Excluir Contato</title>

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
            text-decoration:none;
            font-size:18px;
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
include('conexao.php');

if (isset($_GET['id'])) {


    $id = $_GET['id'];


    $sql = "DELETE FROM contatos WHERE id = $id";


    if (mysqli_query($conexao, $sql)) {
        echo "<h2>Contato excluído com sucesso.</h2>";
       echo "<a href='index.php' class='btn'>Voltar</a>";
        exit;
    } else {
        echo "<h2>Erro ao excluir o contato.</h2>" . mysqli_error($conexao);
        echo "<a href='index.php'>Voltar</a>"; 
        exit;
    }
}
?>