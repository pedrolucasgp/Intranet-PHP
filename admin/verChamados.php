<?php
include_once('../sys/protectedAdmin.php');
include_once('../sys/conexao.php');

$count_query = "SELECT COUNT(*) as c FROM chamados WHERE andamento <> 'Finalizado'";
$count_query_exec = $conexao->query($count_query) or die ($conexao->error);
$sql_chamado_count = $count_query_exec->fetch_assoc();
$chamado_count = $sql_chamado_count['c'];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 3;
$page_interval = 1;
$offset = ($page -1) * $limit;
$page_number = ceil($chamado_count / $limit);

$query = "SELECT * FROM chamados WHERE andamento <> 'Finalizado' ORDER BY id DESC LIMIT {$limit} OFFSET {$offset}";

$result = $conexao->query($query);

$gabriel = 0;
$pedro = 0;
$thiago = 0;

$result_nivel_ava = "SELECT * FROM chamados WHERE andamento = 'Finalizado'";
$resultado_nivel_ava = mysqli_query($conexao, $result_nivel_ava);
    while($row_nivel_ava = mysqli_fetch_assoc($resultado_nivel_ava)){
        if($row_nivel_ava['responsavel'] == "Pedro"){
            $pedro++;
        }
        if($row_nivel_ava['responsavel'] == "Thiago"){
            $thiago++;
        }
        if($row_nivel_ava['responsavel'] == "Gabriel"){
            $gabriel++;
        }
    }
    include_once("../components/header.php");
?>
    <link rel="stylesheet" href="../css/chamados.css">
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">
</head>

<body>
<div class="conteudo">
    <h2>Chamados Abertos</h2>
    <div class="btn-group">
        <button onclick="location.href='admin.php'">Voltar</button>
        <button onclick="location.href='historicoChamado.php'">Histórico</button>
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
                    <th></th>
                </tr>
                <?php while ($chamado = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $chamado['motivo']; ?></td>
                        <td><?php echo $chamado['descricao']; ?></td>
                        <td><?php echo $chamado['remetente']; ?></td>
                        <td><?php echo $chamado['andamento']; ?></td>
                        <td><?php echo $chamado['responsavel']; ?></td>
                        <td> <a href="../sys/editChamado.php?id=<?php echo $chamado['id']; ?>"> <svg fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 306.637 306.637" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M12.809,238.52L0,306.637l68.118-12.809l184.277-184.277l-55.309-55.309L12.809,238.52z M60.79,279.943l-41.992,7.896 l7.896-41.992L197.086,75.455l34.096,34.096L60.79,279.943z"></path> <path d="M251.329,0l-41.507,41.507l55.308,55.308l41.507-41.507L251.329,0z M231.035,41.507l20.294-20.294l34.095,34.095 L265.13,75.602L231.035,41.507z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg></a></td>
                    </tr>
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
        <div id="piechart_3d" style="width: 500px; height: 300px;"></div>
    </div>
</div>
        <?php
            require_once("../components/footer.php")
        ?>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Pedro',     <?=$pedro?>],
                ['Thiago',     <?=$thiago?>],
                ['Gabriel',  <?=$gabriel?>]
            ]);

            var options = {
                title: 'Chamados finalizados',
                is3D: true,
                backgroundColor: 'transparent',
                titleTextStyle: {
                color: 'black',
                fontSize: 18,
                bold: true
             }
            };
                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
            
        </script>
