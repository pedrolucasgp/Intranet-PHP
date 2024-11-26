<?php
include_once('protectedAdmin.php');


if (isset($_POST['submit'])) {
    
    if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['departamento'])&& !empty($_POST['ramal'])&& !empty($_POST['senha'])) {
        include_once('../sys/conexao.php');
        
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $email = mysqli_real_escape_string($conexao, $_POST['email']);
        $departamento = mysqli_real_escape_string($conexao, $_POST['departamento']);
        $ramal = mysqli_real_escape_string($conexao, $_POST['ramal']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
        $nivel = mysqli_real_escape_string($conexao, $_POST['nivel']);


        $result = mysqli_query($conexao, "INSERT INTO funcionarios(nome, email, departamento, ramal, senha, nivel) values ('$nome','$email','$departamento','$ramal','$senha', '$nivel')");
        
        if ($result) {
            $_SESSION['msg'] = 'Funcionário cadastrado com sucesso!';
            $_SESSION['msg_color'] = 'green';
        } else {
            $_SESSION['msg'] = 'Erro ao cadastrar funcionário!';
            $_SESSION['msg_color'] = 'red';
        }
    } else {
            $_SESSION['msg'] = 'Preencha todos os campos!';
            $_SESSION['msg_color'] = 'blue';
    }
}
include_once("../components/header.php");
?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/forms.css">
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">
</head>
<body>
            <div class="wrapper2">
            <form action="addCadastro.php" method="POST"> 
            <div class="header">
                <div class="logo">
                    <img src="../imagens/logo.png" alt="Logo">
                </div>
                <div class="btn-group">
                    <button onclick="location.href='../admin/admin.php'">Voltar</button>
                </div>
            </div>
            <div class="wrapper">
            <h2>Cadastrar um Funcionário - HSaúde</h2>
                <div class="input-box">
                    <input type="text" id="idNome" name="nome" placeholder="Nome" required>
                </div>

                <div class="input-box">
                    <input type="text" id="idEmail" name="email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <input type="password" id="idSenha" name="senha" placeholder="Senha" required>
                </div>

                <div class="input-box">
                    <input type="text" id="idRamal" name="ramal" placeholder="Ramal" required>
                </div>

                <div class="input-box">
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
                </div>
                <div class="input-box">
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
                </div>
                                </div>


                <button type="submit" name="submit" id="submit" class="btn">Enviar</button>
            </form>
        </div>
        </div>
        </div>
         <?php
            require_once("../components/footer.php")
        ?>
