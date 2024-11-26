<?php
include_once('../sys/protectedAdmin.php');
include_once('../sys/conexao.php');

$count_query = "SELECT COUNT(*) as p FROM estoque";
$count_query_exec = $conexao->query($count_query) or die ($conexao->error);
$sql_produto_count = $count_query_exec->fetch_assoc();
$produto_count = $sql_produto_count['p'];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 6;
$page_interval = 2;
$offset = ($page -1) * $limit;
$page_number = ceil($produto_count / $limit);

$query = "SELECT * FROM estoque ORDER BY produto ASC LIMIT {$limit} OFFSET {$offset}";

if(!empty($_GET['search'])){
    $data = $_GET['search'];
    $query = "SELECT * FROM estoque WHERE produto like '%$data%' ORDER BY produto ASC";
}

$result = $conexao->query($query);
include_once("../components/header.php");
?>

    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.3.3/dist/jBox.all.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #ADD8E6;
        }
        body {
            display: flex;
            justify-content: center; 
            max-width: 93%; 
            height: 95%;
            margin: 50px auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-direction: column; 
        }
        .main-content {
           
        }
        .box-search {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px; /* Espaçamento inferior para separar da tabela */
        }

        .box-search input[type="search"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px; /* Largura desejada do campo de pesquisa */
            margin-right: 10px; /* Espaçamento à direita do campo de pesquisa */
        }

        .box-search button {
            padding: 10px 15px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .box-search button:hover {
            background-color: #0056b3;
        }

        .pagination {
        text-align: center;
        margin: 20px 0; /* Espaçamento superior e inferior */
        }

        .pagination a, .pagination span {
            display: inline-block;
            padding: 10px 15px;
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination span {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .pagination a.disabled {
            pointer-events: none;
            color: #ccc;
            border-color: #ccc;
        }
        .inverted{
            transform: scaleX(-1);
        }
    </style>
</head>
<body>
       
            <br>
            <div class="btn-group">
                <button onclick="location.href='admin.php'">Voltar</button>
                <button onclick="location.href='../sys/addEstoque.php'">Adicionar Produto</button>
            </div>
                <div class="main-content">
                    <h3>Estoque de Produtos T.I.</h3>
                    <br>
                    <div class="box-search">
                        <input type="search" placeholder="Pesquise por nome" id='idPesquisar'>
                        <button onclick="searchData()" class="btn-group">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="10px" height="10px" viewBox="0 0 632.399 632.399" style="enable-background:new 0 0 632.399 632.399;"
                        xml:space="preserve"><g>
                    <path d="M255.108,0C119.863,0,10.204,109.66,10.204,244.904c0,135.245,109.659,244.905,244.904,244.905
                    c52.006,0,100.238-16.223,139.883-43.854l185.205,185.176c1.671,1.672,4.379,1.672,5.964,0.115l34.892-34.891
                    c1.613-1.613,1.47-4.379-0.115-5.965L438.151,407.605c38.493-43.246,61.86-100.237,61.86-162.702
                    C500.012,109.66,390.353,0,255.108,0z M255.108,460.996c-119.34,0-216.092-96.752-216.092-216.092
                    c0-119.34,96.751-216.091,216.092-216.091s216.091,96.751,216.091,216.091C471.199,364.244,374.448,460.996,255.108,460.996z"/>
                    </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                        </button>
                    </div>
                    <table>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Condição</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php while ($produto = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $produto['produto']; ?></td>
                            <td><?php echo $produto['quantidade']; ?></td>
                            <td><?php echo $produto['condicao']; ?></td>

                            <td> <a href="../sys/editEstoque.php?id=<?php echo $produto['id']; ?>"> <svg fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 306.637 306.637" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M12.809,238.52L0,306.637l68.118-12.809l184.277-184.277l-55.309-55.309L12.809,238.52z M60.79,279.943l-41.992,7.896 l7.896-41.992L197.086,75.455l34.096,34.096L60.79,279.943z"></path> <path d="M251.329,0l-41.507,41.507l55.308,55.308l41.507-41.507L251.329,0z M231.035,41.507l20.294-20.294l34.095,34.095 L265.13,75.602L231.035,41.507z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> </g></svg></a></td>

                            <td> <a href="../sys/deleteEstoque.php?id=<?php echo $produto['id']; ?> " data-confirm='Você realmente deseja deletar esse produto?'> <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                         width="30px" height="30px" viewBox="0 0 791.957 791.957" style="enable-background:new 0 0 791.957 791.957;"
	                        xml:space="preserve"><g><g id="_x35_"><g><path d="M585.82,235.876H209.179c-39.621,0-71.728,32.082-71.728,71.703l38.865,412.675c0,39.597,32.131,71.703,71.751,71.703
                            h304.89c39.62,0,71.751-32.106,71.751-71.703l32.888-412.675C657.547,267.958,625.441,235.876,585.82,235.876z M301.839,666.41
                            c0,19.786-16.053,35.814-35.864,35.814c-19.81,0-35.863-16.053-35.863-35.814V343.467c0-19.786,16.053-35.888,35.863-35.888
                            c19.811,0,35.864,16.102,35.864,35.888V666.41L301.839,666.41z M427.385,666.41c0,19.786-16.053,35.814-35.863,35.814
                            c-19.81,0-35.863-16.053-35.863-35.814V343.467c0-19.786,16.053-35.888,35.863-35.888c19.811,0,35.863,16.102,35.863,35.888
                            V666.41z M552.933,666.41c0,19.786-16.054,35.814-35.864,35.814s-35.863-16.053-35.863-35.814V343.467
                            c0-19.786,16.053-35.888,35.863-35.888s35.864,16.102,35.864,35.888V666.41z M190.027,200.013L624.27,88.299
                            c23.981-6.148,38.425-30.594,32.252-54.576c-6.172-23.982-30.618-38.425-54.6-32.326L468.446,35.748
                            c-12.369-18.347-35.205-27.983-57.845-22.177l-52.088,13.443c-22.641,5.831-37.986,25.275-39.987,47.306l-150.847,38.84
                            c-23.982,6.148-38.401,30.594-32.253,54.576C141.599,191.742,166.045,206.136,190.027,200.013z"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> </td>

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
                
    <?php
        require_once("../components/footer.php")
    ?>
    <script>
        var search = document.getElementById('idPesquisar')

        search.addEventListener("keydown", function(event){
            if(event.key === "Enter"){
                searchData();
            }
        })

        function searchData(){
            window.location = 'verEstoque.php?search=' +search.value;
        }

    </script>
