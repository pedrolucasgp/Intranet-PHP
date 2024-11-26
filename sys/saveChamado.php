<?php
include_once('protectedAdmin.php');
include_once('../sys/conexao.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status = $_POST['andamento'];
    $responsavel = $_POST['responsavel'];

    $sqlUpdate = "UPDATE chamados SET andamento = '$status', responsavel = '$responsavel' WHERE id = '$id'";

    if ($conexao->query($sqlUpdate) === TRUE) {
            $_SESSION['msg'] = 'Chamado atualizado com sucesso!';
            $_SESSION['msg_color'] = 'green';
            header('Location: ../admin/verChamados.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Error.';
            $_SESSION['msg_color'] = 'green';
        }
    } else {
        echo "Erro ao atualizar registro: " . $conexao->error;
    }
?>