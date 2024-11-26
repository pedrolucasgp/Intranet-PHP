<?php
include_once('sys/protected.php');
include_once('sys/conexao.php');

$query = "SELECT nome, ramal, departamento FROM funcionarios ORDER BY departamento";

if (isset($_GET['setor']) && $_GET['setor'] != 'todos') {
    $setor_filtrado = $conexao->real_escape_string($_GET['setor']);
    $query = "SELECT nome, ramal, departamento FROM funcionarios WHERE departamento = '$setor_filtrado' ORDER BY departamento";
}

$result = $conexao->query($query);
include_once("components/header.php");
?>

    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">
</head>

<style>
   
</style>

<body>
        <div>
                    <form action="" method="GET" class="filtro-setor">
                    <label for="setor">Filtrar por Setor:</label>
                    <select name="setor" id="setor">
                    <option value="todos">Todos</option>
            <nav class="modulos">
                        <?php
                        $query_setores = "SELECT DISTINCT departamento FROM funcionarios ORDER BY departamento";
                        $result_setores = $conexao->query($query_setores);

                        while ($row_setor = $result_setores->fetch_assoc()) {
                            $selected = isset($_GET['setor']) && $_GET['setor'] == $row_setor['departamento'] ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($row_setor['departamento']) . "' $selected>" . htmlspecialchars($row_setor['departamento']) . "</option>";
                        }
                        ?>
                    </select>
                    <div class="btn-group"><button type="submit">Filtrar</button></div>
                    
                </form>

                <div class="btn-group">
                    <button onclick="location.href='chamado.php'">Enviar Chamado</button>
                    <button onclick="location.href='profile.php'">Meu Perfil</button>
                </div>

                <?php
                $departamento_anterior = null;

                $filtro_sql = "";
                if (isset($_GET['setor']) && $_GET['setor'] !== 'todos') {
                    $setor_filtrar = $conexao->real_escape_string($_GET['setor']);
                    $filtro_sql = "WHERE departamento = '$setor_filtrar'";
                }

                $query = "SELECT nome, email, departamento, ramal, id, nivel FROM funcionarios $filtro_sql ORDER BY departamento, nome ASC";
                $result = $conexao->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['departamento'] !== $departamento_anterior) {
                            if ($departamento_anterior !== null) {
                                echo "</tbody></table></div>";
                            }
                            echo "<div class='modulo'>";
                            echo "<h3>" . htmlspecialchars($row['departamento']) . "</h3>";
                            echo "<table>";
                            echo "<thead><tr><th>Nome</th><th>Email</th><th>Ramal</th></tr></thead>";
                            echo "<tbody>";
                        }

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["ramal"]) . "</td>";

                        $departamento_anterior = $row['departamento'];
                    }
                    echo "</tbody></table></div>";
                    
                } else {
                    echo "<div class='modulo'>";
                    echo "<h3>Nenhum funcionário encontrado.</h3>";
                    echo "</div>";
                }
                ?>
            </nav>
        </div>
        <?php
            require_once("components/footer.php")
        ?>
