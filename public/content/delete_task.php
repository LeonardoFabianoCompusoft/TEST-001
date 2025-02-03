<?php
include_once '../../includes/connection.php';
include_once '../../includes/task_functions.php';

$id = $_GET['id'];

#Passar o nome da task
if (!isset($_GET['id'])) {
    echo "ID da tarefa não fornecido!";
    exit;
}

$id = $_GET['id'];

#Excluir
if(deleteTask($pdo, $id, $name, $description, $status)) {
    $mensagem = "Excluido com sucesso!";
} else {
    $mensagem = "Erro ao deletar tarefa!";
}

setcookie("mensagem", $mensagem, time() + 3600, "/");
header('Location: ../list_index.php');
