<?php
include_once('protectedAdmin.php');
include_once('../sys/conexao.php');

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $condicao = $_POST['condicao'];

    $sqlUpdate = "UPDATE estoque SET produto = '$produto', quantidade = '$quantidade', condicao = '$condicao' WHERE id = '$id'";

    if ($conexao->query($sqlUpdate) === TRUE) {
        $_SESSION['msg'] = 'Produto atualizado com sucesso!';
        $_SESSION['msg_color'] = 'green';
            header('Location: ../admin/verEstoque.php');
            exit();
        } else {
            echo "Error";
        }
    } else {
        echo "Erro ao atualizar Produto: " . $conexao->error;
    }
?>