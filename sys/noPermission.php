<?php
include_once("components/header.php");
?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="imagens/favicon.png" />
    <link href="css/error.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper2">
        <div class="header">
            <div class="logo">
                <img src="imagens/danger.png" alt="Logo">
            </div>
        </div>

        <div class="wrapper">
            <h2>ERRO DE PERMISSÃO</h2>
            <div>
                <label>Você não tem permissão para acessar essa página!</label>
                <br>
                <label>Faça login para liberar o acesso!</label>
                <br>
                <form action="index.php">
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
        </div>
    </div>