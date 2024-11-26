<?php
include_once('../sys/protectedAdmin.php');
include_once('../sys/conexao.php');

$query = "SELECT nome, email, departamento, ramal, id, nivel FROM funcionarios ORDER BY departamento";

$result = $conexao->query($query);
include_once("../components/header.php");
?>
    <link rel="stylesheet" href="../css/style.css">
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
                    <button onclick="location.href='../sys/addCadastro.php'">Cadastrar</button>
                    <button onclick="location.href='verChamados.php'">Chamados</button>
                    <button onclick="location.href='verEstoque.php'">Estoque</button>
                    <button onclick="location.href='../profile.php'">Meu Perfil</button>
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
                            echo "<thead><tr><th>Nome</th><th>Email</th><th>Ramal</th><th>Permissão</th><th></th><th></th></tr></thead>";
                            echo "<tbody>";
                        }

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["ramal"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["nivel"]) . "</td>";
                        echo "<td>";
                        echo "<a href='../sys/editAdmin.php?id=" . htmlspecialchars($row['id']) . "'>";
                        echo "<svg fill='#000000' height='30px' width='30px' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 306.637 306.637' xml:space='preserve'>";
                        echo "<g id='SVGRepo_bgCarrier' stroke-width='0'></g>";
                        echo "<g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'></g>";
                        echo "<g id='SVGRepo_iconCarrier'>";
                        echo "<g>";
                        echo "<g>";
                        echo "<path d='M12.809,238.52L0,306.637l68.118-12.809l184.277-184.277l-55.309-55.309L12.809,238.52z M60.79,279.943l-41.992,7.896 l7.896-41.992L197.086,75.455l34.096,34.096L60.79,279.943z'></path>";
                        echo "<path d='M251.329,0l-41.507,41.507l55.308,55.308l41.507-41.507L251.329,0z M231.035,41.507l20.294-20.294l34.095,34.095 L265.13,75.602L231.035,41.507z'></path>";
                        echo "</g>";
                        echo "</g>";
                        echo "</g>";
                        echo "</svg>";
                        echo "</a>";
                        echo "</td>";

                        echo "<td>";
                        echo "<a href='../sys/deleteAdmin.php?id=" . htmlspecialchars($row['id']) . "' data-confirm='Você realmente deseja deletar o funcionário?'>";
                        echo "<svg version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' width='30px' height='30px' viewBox='0 0 791.957 791.957' style='enable-background:new 0 0 791.957 791.957;' xml:space='preserve'>";
                        echo "<g>";
                        echo "<g id='_x35_'>";
                        echo "<g>";
                        echo "<path d='M585.82,235.876H209.179c-39.621,0-71.728,32.082-71.728,71.703l38.865,412.675c0,39.597,32.131,71.703,71.751,71.703 h304.89c39.62,0,71.751-32.106,71.751-71.703l32.888-412.675C657.547,267.958,625.441,235.876,585.82,235.876z M301.839,666.41 c0,19.786-16.053,35.814-35.864,35.814c-19.81,0-35.863-16.053-35.863-35.814V343.467c0-19.786,16.053-35.888,35.863-35.888 c19.811,0,35.864,16.102,35.864,35.888V666.41L301.839,666.41z M427.385,666.41c0,19.786-16.053,35.814-35.863,35.814 c-19.81,0-35.863-16.053-35.863-35.814V343.467c0-19.786,16.053-35.888,35.863-35.888c19.811,0,35.863,16.102,35.863,35.888 V666.41z M552.933,666.41c0,19.786-16.054,35.814-35.864,35.814s-35.863-16.053-35.863-35.814V343.467 c0-19.786,16.053-35.888,35.863-35.888s35.864,16.102,35.864,35.888V666.41z M190.027,200.013L624.27,88.299 c23.981-6.148,38.425-30.594,32.252-54.576c-6.172-23.982-30.618-38.425-54.6-32.326L468.446,35.748 c-12.369-18.347-35.205-27.983-57.845-22.177l-52.088,13.443c-22.641,5.831-37.986,25.275-39.987,47.306l-150.847,38.84 c-23.982,6.148-38.401,30.594-32.253,54.576C141.599,191.742,166.045,206.136,190.027,200.013z'></path>";
                        echo "</g>";
                        echo "</g>";
                        echo "</g>";
                        echo "</svg>";
                        echo "</a>";
                        echo "</td>";
                        echo "</tr>";
                        echo "</tr>";

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
            require_once("../components/footer.php")
        ?>
