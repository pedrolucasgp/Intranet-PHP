<?php
include_once('sys/protected.php');

if(!empty($_GET['id'])){

    include_once('sys/conexao.php');

    $id = intval($_GET['id']);
    $sqlSelect  = "SELECT * FROM funcionarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);


    if ($result->num_rows > 0) {
        
        $funcionarios = $result->fetch_assoc();
        $senha = $funcionarios['senha'];
    }
    }

include_once("components/header.php");
?>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper2">
        <div class="header">
            <div class="logo">
                <img src="imagens/logo.png" alt="Logo">
            </div>
        </div>

        <div class="wrapper">
            <h2>Trocar Senha</h2>

            <form action="sys/saveSenha.php" method="POST">
                    <div class="input-box">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="senha">Digite a nova senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Nova Senha" required>
                </div>
                <input type="submit" name="update" id="update" value="Enviar">
                <button onclick="location.href='profile.php'">Voltar</button>
            </form>
            
        </div>
    </div>
    <?php
            require_once("components/footer.php")
    ?>