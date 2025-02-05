
<?php

include_once '../includes/connection.php';
include_once '../includes/task_functions.php';

session_start();
$email = $_SESSION['email'];
if (empty($email)) {
    header("Location: ./index.php");
    exit;
}else{
    $user = getUser($pdo, $email);
    if (empty($user)) {
        header("Location: ./index.php");
        exit;
    }else {
        $nome = $user['nome'];
        $tasks = getTasks($pdo, $user['id']);
        if(empty($tasks)){
            header("Location: ./add_index.php");
            setcookie("mensagem", "Nenhuma tarefa encontrada!", time() + 3600, "/");
            exit;
        }
    }
}

include_once '../templates/header.php';

include_once '../public/views/view_task_list.php';

include_once '../templates/footer.php';
?>