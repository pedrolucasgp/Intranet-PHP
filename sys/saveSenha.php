<?php
include_once('../sys/protected.php');

include_once('../sys/conexao.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $senha = $_POST['senha'];

    $sqlUpdate = "UPDATE funcionarios SET senha = '$senha' WHERE id = '$id'";

    if ($conexao->query($sqlUpdate) === TRUE) {
            $_SESSION['msg'] = 'Senha alterada com sucesso!';
            $_SESSION['msg_color'] = 'green';
            header('Location: ../profile.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Falha ao alterar senha!';
            $_SESSION['msg_color'] = 'red';
        }
    } else {
        echo "Erro ao atualizar cadastro: " . $conexao->error;
    }
?>