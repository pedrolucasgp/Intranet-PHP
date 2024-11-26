<?php
session_start();
include_once('sys/conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

    $email = $conexao ->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];

    
    $sql_code = "SELECT * FROM funcionarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $conexao->query($sql_code) or die ("Falha no código SQL");

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){
        
        $usuario = $sql_query->fetch_assoc();

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nivel'] = $usuario['nivel'];
    
            if($usuario['nivel'] === 'ADMIN'){
                header("Location: admin/admin.php");
            }
            else{
                header("Location: profile.php");
            }
            exit();
    }else{
        $_SESSION['msg'] = 'Email ou senha incorreto!';
        $_SESSION['msg_color'] = 'red';
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
            <h2>Login</h2>

            <form action="" method="POST"> 

                <div class="input-box">
                    <label for="email">Email:</label>
                    <input type="text" id="idEmail" name="email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <label for="senha">Senha:</label>
                    <input type="password" id="idSenha" name="senha" placeholder="Senha" required>
                </div>
                <button type="submit" name="submit" id="submit" class="btn">Entrar</button>
            </form>
        </div>
    </div>
    <?php
            require_once("components/footer.php")
    ?>