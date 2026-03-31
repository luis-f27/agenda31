<!DOCTYPE html>
<html>
<head>
    <title>Editar Contatos</title>

    <style>
        body{
            background:#0b1f3a;
            color:#ffffff;
            font-family: Arial;
            text-align:center;
        }
        form{
            background:#132f57;
            padding:20px;
            border-radius:10px;
            display:inline-block;
            margin-top:20px;
        }
        input{
            padding:8px;
            border:none;
            border-radius:5px;
        }
        input[type="submit"]{
            background:#1e90ff;
            color:white;
            cursor:pointer;
        }
        input[type="submit"]:hover{
            background:#0066cc;
        }
        a{
            color:#1e90ff;
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
$id = $_GET['id'];
$sql = "SELECT * FROM contatos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 1){
    $contato = mysqli_fetch_assoc($resultado);
}else{
    echo "Contato não encontrado.";
    exit;
}
if (isset($_POST ['atualizar'])){

    $novo_nome = $_POST['nome'];
    $novo_endereco = $_POST['endereco'];
    $novo_fone = $_POST['fone'];

    $sql2 = "UPDATE contatos SET nome='$novo_nome', endereco = '$novo_endereco', telefone='$novo_fone' WHERE id = $id";
 if (mysqli_query($conexao,$sql2)){
    echo "<h2>Contato foi atualizado com sucesso!</h2>";
    echo "<a href='index.php' class='btn'>Voltar</a>";
    exit;
 }
else{
    echo"<h2>Erro ao atualizar contato. ". mysqli_error($conexao);
   echo "<a href='index.php' class='btn'>Voltar</a>";
    exit;

}

}

?>
<h1>Ediçao de contatos</h1>
<form method= "POST">
Nome: <input type="text" name="nome" required value="<?php echo $contato['nome'];?>"><br><br>
Endereco: <input type="text" name="endereco" required value="<?php echo $contato['endereco'];?>"><br><br>
Telefone: <input type="text" name="fone" required value="<?php echo $contato['telefone'];?>"><br><br>


<input type="submit" name="atualizar" value="Atualizar">

</form>