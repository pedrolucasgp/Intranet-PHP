<?php
include_once('protectedAdmin.php');

if(!empty($_GET['id'])){

include_once('../sys/conexao.php');

    $id = $_GET['id'];
    $sqlSelect  = "SELECT * FROM funcionarios WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        
        $sqlDelete = "DELETE FROM funcionarios WHERE id=$id";
        $resultDelete = $conexao->query($sqlDelete);
        $_SESSION['msg'] = 'Funcionário deletado com sucesso!';
        $_SESSION['msg_color'] = 'green';
    }
    }
    header('Location: ../admin/admin.php');
?>
