<?php
include_once '../../includes/connection.php';
include_once '../../includes/task_functions.php';

#Passar a task
$id = $_POST['id'];
$name = $_POST['nome'];
$description = $_POST['description'];
$status = $_POST['status'];

#Atualiza
if(updateTask($pdo, $id, $name, $description, $status)) {
    $mensagem = "Atualizada com sucesso!";
} else {
    $mensagem = "Erro ao atualizar tarefa!";
}

setcookie("mensagem", $mensagem, time() + 3600, "/");
header('Location: ../list_index.php');

?>