<?php
include_once('sys/protected.php');
include_once('sys/conexao.php');

if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    $email = $conexao->real_escape_string($_SESSION['email']);
    $user_id = $_SESSION['id'];

    $count_query = "SELECT COUNT(*) as c FROM chamados WHERE remetente = '$email'";
    $count_query_exec = $conexao->query($count_query) or die ($conexao->error);
    $sql_chamado_count = $count_query_exec->fetch_assoc();
    $chamado_count = $sql_chamado_count['c'];

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $limit = 6;
    $page_interval = 1;
    $offset = ($page -1) * $limit;
    $page_number = ceil($chamado_count / $limit);

    $query = "SELECT * FROM chamados WHERE remetente = '$email' ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}";
    $result = $conexao->query($query);

    if (!$result) {
        die("Erro na consulta: " . $conexao->error);
    }
} else {
    die("Sessão não está definida ou vazia.");
}
include_once("components/header.php");
?>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css">
    <link rel="stylesheet" href="css/profile.css">

</head>
<body>
    <div class="wrapper2">
        <div class="header">
            <div class="logo">
                <img src="imagens/logo.png" alt="Logo">
            </div>
        </div>

        <div class="wrapper">
            <h2>Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?>. <button onclick="location.href='sys/logout.php'">Sair</button></h2>
            <div class="btn-group">
                    <button onclick="location.href='chamado.php'">Enviar Chamado</button>
                    <button onclick="location.href='funcionarios.php'">Colaboradores</button>
                    <button onclick="location.href='trocarSenha.php?id=<?php echo $user_id; ?>'">Trocar Senha</button>
                    <button onclick="location.href='admin/admin.php'">Administrador</button>
                </div>
                <br>
            <table>
                <tr>
                    <th>Motivo</th>
                    <th>Descrição</th>
                    <th>Remetente</th>
                    <th>Status</th>
                    <th>Responsável</th>
                </tr>
                <?php
                while ($chamado = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($chamado['motivo']) . "</td>";
                    echo "<td>" . htmlspecialchars($chamado['descricao']) . "</td>";
                    echo "<td>" . htmlspecialchars($chamado['remetente']) . "</td>";
                    echo "<td>" . htmlspecialchars($chamado['andamento']) . "</td>";
                    echo "<td>" . htmlspecialchars($chamado['responsavel']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            
            <p class="pagination">
                    <a href="?page=1"><img class="inverted" width="13" height="13" src="https://img.icons8.com/plumpy/24/advance.png" alt="advance"/></a>
                    <?php
                    $first_page = max($page - $page_interval, 1);
                    $last_page = min($page_number, $page + $page_interval);

                    for ($p = $first_page; $p <= $last_page; $p++) {
                        if ($p === $page) {
                            echo "<span>{$p}</span>";
                        } else {
                            echo "<a href='?page={$p}'>{$p}</a>";
                        }
                    }
                    ?>
                    <a href="?page=<?php echo $page_number ?>"><img width="13" height="13" src="https://img.icons8.com/plumpy/24/advance.png" alt="advance"/></a>
                </p>
        </div>
    </div>
    <?php
            require_once("components/footer.php")
    ?>