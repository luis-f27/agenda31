<html>
<head>
    <title>Contatos - Turma 31</title>

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
        table{
            margin:auto;
            margin-top:20px;
            border-collapse:collapse;
            background:#132f57;
        }
        th, td{
            padding:10px;
            border:1px solid #ffffff;
        }
        a{
            color:#1e90ff;
            text-decoration:none;
        }
    </style>

</head>
<body>
    <h1>Agenda - Turma 31</h1> <br>
    <h2> Cadastro de contatos </h2>
    <form action="salvar.php" method="POST">
        Nome: <input type="text" name="nome"> <br><br>
        Endereço: <input type="text" name="endereco"> <br><br>
        Telefone: <input type="text" name="fone"> <br><br>
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
