<?php
include_once('sys/protected.php');
include_once('sys/conexao.php');

if (isset($_POST['submit'])) {
    
    if (!empty($_POST['motivo']) && !empty($_POST['descricao'])) {
        
        $email = $_SESSION['email'];
        $motivo = mysqli_real_escape_string($conexao, $_POST['motivo']);
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
        $status = 'Pendente';

        $result = mysqli_query($conexao, "INSERT INTO chamados(remetente, motivo, descricao, andamento) values ('$email','$motivo','$descricao','$status')");
        
        if ($result) {
            $_SESSION['msg'] = 'Chamado enviado com sucesso!';
            $_SESSION['msg_color'] = 'green';
        } else {
            $_SESSION['msg'] = 'Falha ao enviar o chamado!';
            $_SESSION['msg_color'] = 'red';
        }
    } else {
        $_SESSION['msg'] = 'Preencha todos os campos!';
            $_SESSION['msg_color'] = 'blue';
    }
}
include_once("components/header.php");
?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper2">
        <div class="header">
            <div class="logo">
                <img src="imagens/logo.png" alt="Logo">
            </div>
            <div class="btn-group">
                <button onclick="location.href='profile.php'">Meu Perfil</button>
                <button onclick="location.href='funcionarios.php'">Colaboradores</button>
            </div>
        </div>

        <div class="wrapper">
            <h2>Chamado</h2>

            <form action="chamado.php" method="POST"> 

                <div class="input-box">
                    <label for="motivo">Motivo:</label>
                    <input type="text" id="idMotivo" name="motivo" placeholder="Motivo" required>
                </div>
                <div class="input-box">
                    <label for="produto">Descrição:</label>
                    <input type="text" id="idDescricao" name="descricao" rows="4" placeholder="Descreva o problema" required>
                </div>
                <button type="submit" name="submit" id="submit" class="btn">Enviar</button>
            </form>
        </div>
    </div>
    <?php
            require_once("components/footer.php")
    ?>