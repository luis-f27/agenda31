<html>
<head>
    <title>Contatos - Turma 31</title>

    <style>
    body{
        background: linear-gradient(135deg,#0b1f3a,#091427);
        color:#ffffff;
        font-family: Arial;
        text-align:center;
    }
    h1{
        margin-top:20px;
    }
    form{
        background:#132f57;
        padding:25px;
        border-radius:12px;
        display:inline-block;
        box-shadow:0 0 15px rgba(0,0,0,0.5);
    }
    input{
        padding:10px;
        border:none;
        border-radius:6px;
        margin:6px;
        width:220px;
        outline:none;
    }
    input:focus{
        box-shadow:0 0 5px #1e90ff;
    }
    input[type="submit"]{
        background:#1e90ff;
        color:white;
        cursor:pointer;
        transition:0.3s;
    }
    input[type="submit"]:hover{
        background:#0066cc;
        transform:scale(1.05);
    }
    table{
        margin:auto;
        margin-top:30px;
        border-collapse:collapse;
        background:#132f57;
        border-radius:10px;
        overflow:hidden;
        box-shadow:0 0 15px rgba(0,0,0,0.5);
    }
    th{
        background:#1e90ff;
    }
    th, td{
        padding:12px;
        border-bottom:1px solid #ffffff33;
    }
    tr:hover{
        background:#1a3d6b;
    }
    a{
        color:#1e90ff;
        text-decoration:none;
        padding:5px 10px;
        border-radius:5px;
        transition:0.3s;
    }
    a:hover{
        background:#1e90ff;
        color:white;
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
<body>
    <h1>Agenda - Turma 31</h1> <br>
    <h2> Cadastro de contatos </h2>
    <form action="salvar.php" method="POST">
        Nome: <input type="text" name="nome" required><br><br>
    Endereço: <input type="text" name="endereco" required><br><br>
    Telefone: <input type="text" name="fone" required><br><br>
        <input type="submit" value="Cadastrar"> <br>
    </form>
    <h2>Lista de contatos</h2>
    <?php 
        include ('conexao.php');
        $sql = "SELECT * FROM contatos";

        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border=1> <tr><th>Nome</th>
            <th>Endereco</th> <th>Telefone</tr>";
            while ($linha = mysqli_fetch_assoc($resultado)){
                echo "<tr><td>". $linha['nome']." </td><td> " . $linha['endereco'] . " </td><td> " . $linha['telefone'] . "</td>
                <td> <a href='editar.php?id=".$linha['id']."'>Editar</a></td>
                <td> <a href='Excluir.php?id=".$linha['id']."'
                onclick='return confirm(\"tem certeza que deseja excluir este regsitro?\")'>Excluir</a></td></tr>";
                
            }
echo "</table>";
        } else {
            echo "<h3> Nenhum contato encontrado! </h3>";
        }

    ?>


</body>

</html>
