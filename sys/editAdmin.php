<?php
include_once('protectedAdmin.php');

if(!empty($_GET['id'])){

    include_once('../sys/conexao.php');

    $id = $_GET['id'];
    $sqlSelect  = "SELECT * FROM funcionarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);


    if ($result->num_rows > 0) {
        
        $funcionarios = $result->fetch_assoc();
        $nome = $funcionarios['nome'];
        $email = $funcionarios['email'];
        $ramal = $funcionarios['ramal'];
        $departamento = $funcionarios['departamento'];
        $senha = $funcionarios['senha'];
        $nivel = $funcionarios['nivel'];
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

        input[type=reset] {
            width: 100%;
            background-color: #eb9903;
            font-size: 1em;
            color: white;
            padding: 10px 20px;
            margin: 5px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        fieldset {
            border: 0.5px dotted #372991;
        }

        fieldset > legend {
            font-size: 0.8em;
            font-weight: 100;
            background-color: rgba(55, 41, 145, 0.2);
            padding: 3px 7px;
            border-radius: 5px;
        }

        input[type=radio] + label, input[type=checkbox] + label {
            display: inline-block;
            font-size: 1em;
            background-color: rgba(0, 0, 0, 0);
        }

        .conteudo {
            display: flex;
            justify-content: space-between; /* Distribui os elementos igualmente na largura */
        }

        .modulo-container {
            flex: 1; /* Faz com que cada container ocupe espaço igual */
            margin-right: 10px; /* Espaçamento entre os containers */
        }

        .modulos {
            border: 1px solid #ccc;
            padding: 10px;
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
                        <h3>Editar Cadastro</h3>
                        <form action="saveAdmin.php" method="POST">
                            <br>
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br><br>
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br><br>
                            <label for="ramal">Ramal:</label>
                            <input type="text" id="ramal" name="ramal" value="<?php echo htmlspecialchars($ramal); ?>"><br><br>
                            <label for="departamento">Departamento:</label>
                                <select id="departamento" name="departamento">
                                    <?php
                                    $departamentos = [
                                        'Auditoria' => 'Auditoria',
                                        'Credenciamento' => 'Credenciamento',
                                        'Comercial Matão' => 'Comercial Matão',
                                        'Comercial Araraquara' => 'Comercial Araraquara',
                                        'Comercial Itápolis' => 'Comercial Itápolis',
                                        'Faturamento' => 'Faturamento',
                                        'Clínica' => 'Clínica',
                                        'CMI Centro de Autismo' => 'CMI',
                                        'Diretoria' => 'Diretoria',
                                        'Financeiro' => 'Financeiro',
                                        'Fisioterapia' => 'Fisioterapia',
                                        'Protocolo' => 'Protocolo',
                                        'Recepção Américo Brasiliense' => 'Recepção Américo',
                                        'Recepção Araraquara' => 'Recepção Araraquara',
                                        'Recepção Itápolis' => 'Recepção Itápolis',
                                        'Recepção Lupo' => 'Recepção Lupo',
                                        'Recepção Matão' => 'Recepção Matão',
                                        'Recepção Tabatinga' => 'Recepção Tabatinga',
                                        'Relacionamento' => 'Relacionamento',
                                        'Tecnologia Da Informação' => 'T.I.',
                                        'Recursos Humanos' => 'RH'
                                    ];
                                    foreach ($departamentos as $valor => $nome) {
                                        $selected = ($valor == $departamento) ? 'selected' : '';
                                        echo "<option value=\"$valor\" $selected>$nome</option>";
                                    }
                                    ?>
                                </select><br><br>
                                <label for="nivel">O funcionário é Administrador?</label>
                                     <select id="nivel" name="nivel">
                                         <?php
                                            $niveis = [
                                                'USER' => 'Não',
                                                'ADMIN' => 'Sim'
                                            ];
                                            foreach ($niveis as $valor => $nome) {
                                                $selected = ($valor == $nivel) ? 'selected' : '';
                                                    echo "<option value=\"$valor\" $selected>$nome</option>";
                                                 }
                                                    ?>
                                                </select><br><br>
                            <label for="senha">Senha:</label>
                            <input type="text" id="senha" name="senha" value="<?php echo htmlspecialchars($senha); ?>"><br><br>
                            <input type="submit" name="update" id="update" value="Atualizar Cadastro">
                            
                        </form>
                    </div>
            
        </div>
    <?php
        require_once("../components/footer.php")
    ?>

