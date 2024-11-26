<?php
include_once("components/header.php");
?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../imagens/favicon.png" />
    <link rel="stylesheet" href="../css/error.css">
</head>

<body>
    <div class="wrapper2">
        <div class="header">
            <div class="logo">
                <img src="../imagens/danger.png" alt="Logo">
            </div>
        </div>

        <div class="wrapper">
            <h2>ERRO DE PERMISSÃO</h2>
            <div>
                <label>Você não tem permissão para acessar essa página!</label>
                <br>
                <label>Faça login como Administrador!</label>
                <br>
                
                    <p class="pagination">
                        <a href="../profile.php">Voltar</a>
                        <a href="../index.php">Login</a>
                    </p>
                
            </div>
        </div>
    </div>
    <?php
            require_once("../components/footer.php")
    ?>