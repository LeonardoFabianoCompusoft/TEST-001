<?php
include_once 'includes/connection.php';
include_once 'includes/task_functions.php';

#Processa formulario
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    #Adiciona tarefa
    if (addTask($pdo, $name, $description, $status)) {
        echo "Tarefa adicionada com sucesso!";
        header('Location: index.php'); #Redireciona para a lista de tarefas
        exit;
    } else {
        echo "Erro ao adicionar a tarefa!";
    }
}

include_once 'templates/header.php';

include_once 'public/content/add_task_form.php';

include_once 'templates/footer.php'; 
?>
