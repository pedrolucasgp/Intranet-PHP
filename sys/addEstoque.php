<?php
include_once('protectedAdmin.php');


if (isset($_POST['submit'])) {
    
    if (!empty($_POST['produto']) && !empty($_POST['quantidade']) && !empty($_POST['condicao'])) {
        include_once('../sys/conexao.php');
        
        $produto = mysqli_real_escape_string($conexao, $_POST['produto']);
        $quantidade = mysqli_real_escape_string($conexao, $_POST['quantidade']);
        $condicao = mysqli_real_escape_string($conexao, $_POST['condicao']);

        $result = mysqli_query($conexao, "INSERT INTO estoque(produto, quantidade, condicao) values ('$produto','$quantidade','$condicao')");
        
        if ($result) {
            $_SESSION['msg'] = 'Produto adicionado com sucesso!';
            $_SESSION['msg_color'] = 'green';
        } else {
            $_SESSION['msg'] = 'Erro ao cadastrar o produto!';
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
            <form action="addEstoque.php" method="POST"> 
            <div class="header">
            <div class="logo">
                <img src="../imagens/logo.png" alt="Logo">
            </div>
            <div class="btn-group">
                <button onclick="location.href='../admin/verEstoque.php'">Voltar</button>
            </div>
        </div>

            <h2>Adicionar no Estoque - HSaúde</h2>

                <div class="input-box">
                    <label for="produto">Produto:</label>
                    <input type="text" id="idProduto" name="produto" placeholder="Produto" required>
                </div>

                <div class="input-box">
                    <label for="nome">Quantidade:</label>
                    <input type="text" id="idQuantidade" name="quantidade" placeholder="Quantidade" required>
                </div>

                <div class="input-box">
                    <label for="nome">Condição:</label>
                    <input type="text" id="idCondicao" name="condicao" placeholder="Condição" required>
                </div>


                <button type="submit" name="submit" id="submit" class="btn">Enviar</button>
            </form>
        </div>
    </div>
    <?php
        require_once("../components/footer.php")
    ?>
