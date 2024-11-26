<?php
include_once('protectedAdmin.php');

if(!empty($_GET['id'])){

    include_once('../sys/conexao.php');

    $id = $_GET['id'];
    $sqlSelect  = "SELECT * FROM estoque WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        
        $sqlDelete = "DELETE FROM estoque WHERE id=$id";
        $resultDelete = $conexao->query($sqlDelete);
        $_SESSION['msg'] = 'Produto deletado com sucesso!';
        $_SESSION['msg_color'] = 'green';
    }
    }
    header('Location: verEstoque.php');
?>
