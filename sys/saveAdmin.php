<?php
include_once('protectedAdmin.php');

include_once('../sys/conexao.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $ramal = $_POST['ramal'];
    $departamento = $_POST['departamento'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];

    $sqlUpdate = "UPDATE funcionarios SET nome = '$nome', email = '$email', ramal = '$ramal', departamento = '$departamento', senha = '$senha', nivel = '$nivel' WHERE id = '$id'";

    if ($conexao->query($sqlUpdate) === TRUE) {
            $_SESSION['msg'] = 'Cadastro atualizado com sucesso!';
            $_SESSION['msg_color'] = 'green';
            header('Location: ../admin/admin.php');
            exit();
        } else {
            $_SESSION['msg'] = 'Falha ao atualizar o cadastro!';
            $_SESSION['msg_color'] = 'red';
        }
    } else {
        echo "Erro ao atualizar cadastro: " . $conexao->error;
    }
?>