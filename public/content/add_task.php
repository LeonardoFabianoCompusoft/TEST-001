<?php
include_once '../../includes/connection.php';
include_once '../../includes/task_functions.php';

session_start();

#Processa formulario
if (isset($_POST['submit'])) {
    $name = $_POST['nome'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    #buscar user
    $email = $_SESSION['email'];
    if (empty($email)) {
        echo "Usuário não logado!";
    } else {
        $user = getUser($pdo, $email);
        if (empty($user)) {
            echo "Usuário não encontrado!";
            exit;
        }
    }

    $id_task = addTask($pdo, $name, $description, $status);
    #Adiciona tarefa
    if ($id_task) {
        #criar controle id user is task
        if (addControle($pdo, $user['id'], $id_task)) {
            echo "Controle adicionado com sucesso!";
            header('Location: ../list_index.php');
        }else{
            echo "Erro ao adicionar controle!";
        }
    } else {
        echo "Erro ao adicionar a tarefa!";
    }
}
