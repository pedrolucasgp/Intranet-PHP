<?php
include_once('../sys/protectedAdmin.php');
include_once('../sys/conexao.php');

$count_query = "SELECT COUNT(*) as c FROM chamados";
$count_query_exec = $conexao->query($count_query) or die ($conexao->error);
$sql_chamado_count = $count_query_exec->fetch_assoc();
$chamado_count = $sql_chamado_count['c'];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 6;
$page_interval = 1;
$offset = ($page -1) * $limit;
$page_number = ceil($chamado_count / $limit);

$query = "SELECT * FROM chamados LIMIT {$limit} OFFSET {$offset}";

$result = $conexao->query($query);

include_once("../components/header.php");
?>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/chamados.css">
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">
  
</head>

<body>
<div class="conteudo">
    <h2>Histórico de Chamados</h2>
    <div class="btn-group">
        <button onclick="location.href='verChamados.php'">Voltar</button>
        <button onclick="location.href='admin.php'">Admin</button>
    </div>
    <div class="main-content">
        <div class="modulo-container">
            <h3>Lista de Chamados</h3>
            <table>
                <tr>
                    <th>Motivo</th>
                    <th>Descrição</th>
                    <th>Remetente</th>
                    <th>Status</th>
                    <th>Responsável</th>
                </tr>
                <?php while ($chamado = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $chamado['motivo']; ?></td>
                        <td><?php echo $chamado['descricao']; ?></td>
                        <td><?php echo $chamado['remetente']; ?></td>
                        <td><?php echo $chamado['andamento']; ?></td>
                        <td><?php echo $chamado['responsavel']; ?></td>
                <?php endwhile; ?>
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
</div>
        <?php
            require_once("../components/footer.php")
        ?>