<?php
include_once('protectedAdmin.php');

if(!empty($_GET['id'])){

    include_once('../sys/conexao.php');

    $id = $_GET['id'];
    $sqlSelect  = "SELECT * FROM chamados WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        
        $chamado = $result->fetch_assoc();
        $nome = $chamado['remetente'];
        $motivo = $chamado['motivo'];
        $descricao = $chamado['descricao'];
        $status = $chamado['andamento'];
        $responsavel = $chamado['responsavel'];
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
            border-radius: 5px;
        }

        h3{
            text-align: center;
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
                        <h3>Editar Chamado</h3>
                        <form action="saveChamado.php" method="POST">
                            <br>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for="nome">Nome:</label>
                            <span><?php echo $nome; ?></span><br><br>
                            <label for="motivo">Motivo:</label>
                            <span><?php echo $motivo; ?></span><br><br>
                            <label for="descricao">Descrição:</label><br>
                            <span><?php echo $descricao; ?></span><br><br>
                            <label for="andamento">Andamento:</label>
                            <select id="andamento" name="andamento">
                                <option value="Andamento" <?php if ($status == 'Andamento') echo 'selected'; ?>>Andamento</option>
                                <option value="Pendente" <?php if ($status == 'Pendente') echo 'selected'; ?>>Pendente</option>
                                <option value="Finalizado" <?php if ($status == 'Finalizado') echo 'selected'; ?>>Finalizado</option>
                            </select>
                            <br><br>
                            <label for="responsavel">Responsável:</label>
                            <select id="responsavel" name="responsavel">
                                <option value="" <?php if ($responsavel == '') echo 'selected'; ?>></option>
                                <option value="Thiago" <?php if ($responsavel == 'Thiago') echo 'selected'; ?>>Thiago</option>
                                <option value="Gabriel" <?php if ($responsavel == 'Gabriel') echo 'selected'; ?>>Gabriel</option>
                                <option value="Pedro" <?php if ($responsavel == 'Pedro') echo 'selected'; ?>>Pedro</option>
                            </select>
                            <br><br>
                            <input type="submit" name="update" id="update" value="Atualizar Chamado">
                        </form>
                    </div>
            </div>
        <?php
            require_once("../components/footer.php")
        ?>
