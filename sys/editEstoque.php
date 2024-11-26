<?php
include_once('protectedAdmin.php');

if(!empty($_GET['id'])){

    include_once('../sys/conexao.php');

    $id = $_GET['id'];
    $sqlSelect  = "SELECT * FROM estoque WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        
        $estoque = $result->fetch_assoc();
        $produto = $estoque['produto'];
        $quantidade = $estoque['quantidade'];
        $condicao = $estoque['condicao'];
    }
    }else
    {
        header('Location: ../index.php');
        exit;
    }
    include_once("../components/header.php");
?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        form {
        background-color: #fffafa;
        padding: 15px;
        border-radius: 10px;
        }

        form label {
            display: block;
            width: fit-content;
            font-size: 1em;
            font-weight: bold;
            padding: 3px 7px;
            margin-top: 10px;
            margin-bottom: 0px;
            border-radius: 5px;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            font-size: 1em;
            color: white;
            padding: 10px 20px;
            margin: 5px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type=submit]:hover {
            background-color: #45a049;
        }


        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
        <div class="conteudo">
                    <div class="modulo">
                        <h3>Editar Produto</h3>
                        <form action="saveEstoque.php" method="POST">
                            <br>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for="produto">Produto:</label>
                            <input type="text" id="produto" name="produto" value="<?php echo htmlspecialchars($produto); ?>"><br><br>
                            <label for="quantidade">Quantidade:</label>
                            <input type="text" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($quantidade); ?>"><br><br>
                            <label for="condicao">Condição:</label><br>
                            <input type="text" id="condicao" name="condicao" value="<?php echo htmlspecialchars($condicao); ?>"><br><br>
                            <input type="submit" name="update" id="update" value="Atualizar Produto">
                        </form>
                    </div>
        </div>
    <?php
            require_once("../components/footer.php")
    ?>
